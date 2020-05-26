<?php

namespace App\Http\Controllers;

use Validator;
use App\Catalog;
use App\Document;
use App\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterCatalogController extends Controller
{
  public function remove_document(Request $request)
  {
    //岩下
    $catalog_id = 1; //$request
    $item = DB::table('registers')->join('catalogs','registers.catalog_number','=','catalogs.catalog_number')
    ->where('registers.catalog_id',$catalog_id)->first();
    return view('document_delete',['item'=>$item]);
  }

  public function delete_document(Request $request)
  {
    //$validator = validate::make($request->all(),$document_delete_rules,$document_delete_messages);
    $this->validate($request, Register::$document_delete_rules, Register::$document_delete_messages);
    //廃棄年月日と備考を追記
    $param = ['disposal_date' => $request -> disposal_date,
              'catalog_remark' => $request -> catalog_remark,];
    $data = DB::table('registers')->where('catalog_id', $request->catalog_id)->update($param);
    return view('document_delete_complete');
  }

  //杉澤さん
  public function add_document(){
    return view('document_add');
  }

  public function add_document_check(Request $request){
    if(session('catalog_number') != null && $request->catalog_number == null){
      $catalog_number = session('catalog_number');
    }else if(session('catalog_number') != null && $request->catalog_number != null){
      $add_document_validator = Validator::make($request->all(), Register::$document_add_rules, Register::$document_add_messages);
      if($add_document_validator->fails()){
        return redirect('/document_add')
          ->withErrors($add_document_validator)
          ->withInput();
      }
      $catalog_number = $request->catalog_number;
    }else{
      $add_document_validator = Validator::make($request->all(), Register::$document_add_rules, Register::$document_add_messages);
      if($add_document_validator->fails()){
        return redirect('/document_add_confirming')
          ->withErrors($add_document_validator)
          ->withInput();
      }
      $catalog_number = $request->catalog_number;
    }
    

    // $this->validate($request, Register::$document_add_rules, Register::$document_add_messages);
    $add_document_data = [
      'catalog_number' => $catalog_number,
      'catalog_name' => '',
      'catalog_code' => '',
      'catalog_author' => '',
      'catalog_publishername' => '',
      'catalog_publication' => '',
    ];
    // 入力したISBNの本が既にcatalogsテーブルにある場合はその情報を取ってくる
    // catalogsテーブルにはない場合、APIから情報を取ってこれるなら取ってくる
    // API使用について参考にした記事(https://miyachi-web.com/google-books-apis/)
    if (DB::table('catalogs')->where('catalog_number', $catalog_number)->exists()){
      $data = DB::table('catalogs')->where('catalog_number', $catalog_number)->first();
      $add_document_data['catalog_name'] = $data->catalog_name;
      $add_document_data['catalog_code'] = $data->catalog_code;
      $add_document_data['catalog_author'] = $data->catalog_author;
      $add_document_data['catalog_publishername'] = $data->catalog_publishername;
      $add_document_data['catalog_publication'] = $data->catalog_publication;
    } else {
      $isbn = $catalog_number;
      // 情報取得
      $url = 'https://api.openbd.jp/v1/get?isbn=' . $isbn;
      $json = file_get_contents($url);
      // デコード（objectに変換）
      $data = json_decode($json);
      // 入力されたISBNの本がAPIで取得できた場合
      if($data[0] != null){
        // 書籍情報を取得
        $book = $data[0];
        // 本の情報を代入
        $add_document_data['catalog_name'] = $book->onix->DescriptiveDetail->TitleDetail->TitleElement->TitleText->content;
        // 複数著者の場合はカンマ区切り
        $authors = '';
        foreach ($book->onix->DescriptiveDetail->Contributor as $value) {
          $authors .= $value->PersonName->content . ',';
        }
        // 末尾のカンマを消去して代入
        $add_document_data['catalog_author'] = substr($authors, 0, -1);
        // 出版社
        $add_document_data['catalog_publishername'] = $book->summary->publisher;
        // 出版日
        if(!empty($book->onix->PublishingDetail->PublishingDate[0]->Date)){
          $add_document_data['catalog_publication'] = date("Y/m/d",strtotime($book->onix->PublishingDetail->PublishingDate[0]->Date));
        }
      }
    }
    // $request->all();
    // $request->session()->put($add_document_data);
    return view('document_add_confirming', compact("add_document_data"));
  }

  public function add_document_last_check(Request $request){
    // $this->validate($request, Catalog::$document_add_rules, Catalog::$document_add_messages);
    $add_document_last_validator = Validator::make($request->all(), Catalog::$document_add_rules, Catalog::$document_add_messages);
    if($add_document_last_validator->fails()){
      $add_document_data['catalog_number'] = $request->catalog_number;
      return redirect()->back()->withErrors($add_document_last_validator)->withInput()->with('catalog_number', $request->catalog_number);
    }
    $add_document_data = $request->all();
    $request->session()->put($add_document_data);
    return view('document_add_last_confirming', compact("add_document_data"));
  }

  public function create_document(Request $request){
    $register_param = [
      'catalog_number' => $request->catalog_number,
      'arrival_date' => $request->arrival_date,
    ];
    // 自動増分したカタログIDを取得かつ新規資料データをinsert
    $catalog_id = DB::table('registers')->insertGetId($register_param, 'catalog_id');
    $document_param = [
      'catalog_id' => $catalog_id,
      'catalog_number' => $request->catalog_number,
    ];
    DB::table('documents')->insert($document_param);
    // 同じ本がない場合はcatalogsテーブルにもろもろinsertし、同じ本がある場合はcatalogsテーブルの更新をしない
    if (DB::table('catalogs')->where('catalog_number', $request->catalog_number)->doesntExist()){
      $catalogs_param = [
        'catalog_number' => $request->catalog_number,
        'catalog_name' => $request->catalog_name,
        'catalog_code' => $request->catalog_code,
        'catalog_author' => $request->catalog_author,
        'catalog_publishername' => $request->catalog_publishername,
        'catalog_publication' => $request->catalog_publication,
      ];
      DB::table('catalogs')->insert($catalogs_param);
    }
    $add_document_data = $request->all();
    $request->session()->put($add_document_data);
    return view('document_add_complete', compact("add_document_data"));
  }

    //本間さん
    //資料検索機能
  public function search_document(){
    return view('document_search');
  }

  public function find_document(Request $request){

  ////catalogsテーブルから検索する
  ///キーワード検索機能
  $catalog=Catalog::where("catalog_name",'LIKE',"%".$request->catalog_name."%")->get();
  $document_count = 0;
  for($i = 0;$i < count($catalog);$i++) {
    $document_count += DB::table('documents')->where('catalog_number', $catalog[$i]->catalog_number)->count();
  }
  return view('document_search_result',['catalog_name'=>$catalog,'search_count'=>$document_count]);
  }

  //資料変更機能
  public function edit_document(Request $request){
    $change=$request->all();
    $request->session()->put($change);
    return view('document_change',['document_data',$change]);
  }

  //資料変更確認機能
  public function edit_document_check(Request $request){
  // ここにバリデーションを追記
    return view('document_change_confirming',['register_data'=>$request]);
  }
 ///栗山先生追記部分
  public function document_change(Request $request){
    return view('document_change',['register_data'=>$request]);
  }

  public function document_change_complete(Request $request){
    Catalog::where('catalog_number',$request->catalog_number)->update(['catalog_name'=>$request->catalog_name]);
    Register::where('catalog_id',$request->catalog_id)->update(['catalog_id'=>$request->catalog_id,'disposal_date'=>$request->disposal_date,'catalog_remark'=>$request->catalog_remark]);
    return view('document_change_complete');
  }
}