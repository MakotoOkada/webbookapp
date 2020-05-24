<?php

namespace App\Http\Controllers;

use Validator;
use App\Catalog;
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
      $this->validate($request, Register::$document_add_rules, Register::$document_add_messages);
      $add_document_data = [
        'catalog_number' => $request->catalog_number,
        'catalog_name' => '',
        'catalog_code' => '',
        'catalog_author' => '',
        'catalog_publishername' => '',
        'catalog_publication' => '',
      ];
      // 入力したISBNの本が既にcatalogsテーブルにある場合はその情報を取ってくる
      // catalogsテーブルにはない場合、google books APIから情報を取ってこれるなら取ってくる
      // API使用について参考にした記事(https://miyachi-web.com/google-books-apis/)
      if (DB::table('catalogs')->where('catalog_number', $request->catalog_number)->exists()){
        $data = DB::table('catalogs')->where('catalog_number', $request->catalog_number)->first();
        $add_document_data['catalog_name'] = $data->catalog_name;
        $add_document_data['catalog_code'] = $data->catalog_code;
        $add_document_data['catalog_author'] = $data->catalog_author;
        $add_document_data['catalog_publishername'] = $data->catalog_publishername;
        $add_document_data['catalog_publication'] = $data->catalog_publication;
      } else {
        $isbn = $request->catalog_number;
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
      $this->validate($request, Catalog::$document_add_rules, Catalog::$document_add_messages);
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
    $catalog=Catalog::where('catalog_name',$request->catalog_name)->get();
    return view('document_search_result',['catalog_name'=>$catalog]);
  }

  //資料変更機能
  public function edit_document(){
    return view('document_change');
  }

  // public function (Request $change){
  //   //catalogテーブルを変更する
  //   $remark_text=$change::all();
  //   return view('document_change_confirming',compact('remark_text'));

  public function edit_document_check(){
    return view('document_change_confirming');
  }
}