<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Member;
use App\Rental;
use Illuminate\Http\Request;
use Validator;

class MemberController extends Controller
{
  //岡田
   public function add_member(Request $request)
   {
        return view('member_register');
   }

   public function add_member_check(Request $request)
   {
        $this->validate($request, Member::$rules_member_register, Member::$message_member_register);
        $data = $request->all();
        $request->session()->put($data);
        return view('member_register_confirming',['data' => $data]);
   }

   public function create_member(Request $request)
   {    
        $action = $request->get('action','back');
        $input = $request->except('action');
        if($action === 'back') {
            return redirect()->action('MemberController@add_member')->withInput($input);
        } else if($action === 'next'){
        $member = new Member;
        $member->user_name = $request->user_name;
        $member->user_address = $request->user_address;
        $member->user_tel = $request->user_tel;
        $member->user_email = $request->user_email;
        $member->user_birthday = $request->user_birthday;
        $member->user_joindate = $request->user_joindate;
        unset($member['_token']);
        $member->save();
        return view('member_register_complete',['form' => Member::find($member->user_id)]);   
        }
   }

   //岩下さん
   public function remove_member(Request $request)
   {
     $user_id = $request->user_id; //$request
     $item = DB::table('members')->where('user_id',$user_id)->first();
     return view('member_withdrawal',['item'=>$item]);
   }
   public function delete_member(Request $request)
   {
      $member_withdrawal_rules = [];
      $member_withdrawal_messages = [];
      $validator = Validator::make($request->all(), $member_withdrawal_rules, $member_withdrawal_messages);
     //返却していない資料がないか調べる
      $user_id = $request->user_id;
      $no_return_member = DB::table('rentals')->where('user_id', $user_id)->get(['rental_returndate']);
      for($i = 0;$i < count($no_return_member);$i++) {
        if($no_return_member[$i]->rental_returndate === NULL) {
          $validator->errors()->add('no_return', '返却していない資料があります。');
          return redirect('/member_withdrawal?user_id=' . $user_id)
          ->withErrors($validator)
          ->withInput();
        }
      }
     // 退会年月日を追記する
      $param = ['user_deleteday' => $request -> user_deleteday];
      $data = DB::table('members')->where('user_id', $user_id)->update($param);
      return view('member_withdrawal_complete');
   }


   //杉澤さん
   public function edit_member(Request $request){
     // 会員情報をDBから取ってくる処理など記述する箇所
     $user_id = $request->user_id; # あとで$id = $request->id;に書き換えよう
     $user_data = DB::table('members')->where('user_id', $user_id)->first();
     return view('member_edit', ['user_data' => $user_data,'user_id' => $user_id]);
   }

   public function edit_member_check(Request $request){
     $this->validate($request, Member::$edit_member_rules, Member::$edit_member_messages);
     $edit_member_data = $request->all();
     $request->session()->put($edit_member_data);
     return view('member_edit_confirming', compact("edit_member_data"));
   }

   public function update_member(Request $request){
     $edit_member_data = $request->all();
     // // 新しい会員情報に更新する処理を記述する箇所
     //
     $request->session()->put($edit_member_data);
     // 教科書p219参考
     $user_id = $request->user_id; //TODO あとで変える
     $param = [
       'user_name' => $request->user_name,
       'user_address' => $request->user_address,
       'user_tel' => $request->user_tel,
       'user_email' => $request->user_email
     ];
     // 会員情報のアップデート
     DB::table('members')->where('user_id', $user_id)->update($param);

     // アップデート後のデータを取得
     $user_data = DB::table('members')->where('user_id', $user_id)->first();
     return view('member_edit_complete', ['user_data' => $user_data]);
   }


   //吉川さん
  public function search_member(){
     return view('member_search', ['msg'=>'メールアドレスを入力して下さい。']);
   }

  public function find_member(Request $request)
  {
    //メールアドレスが入力されているかチェック
    $member_search_rules = [
      'user_email' => 'required|email|max:50',
    ];

    $member_search_messages = [
      'user_email.required' => 'メールアドレスは必ず入力して下さい。',
      'user_email.email' => '正しいメールアドレスの形で入力してください。',
      'user_email.max' => 'メールアドレスは50文字以内で入力してください。'
    ];
    $validator = Validator::make($request->all(), $member_search_rules,
    $member_search_messages);

    if ($validator->fails()) {
      return redirect('/member_search')
      ->withErrors($validator)
      ->withInput();
    }
    //会員テーブルにメールアドレスが存在するかチェック
    $user_email = $request->user_email;
    $item = DB::table('members')->where('user_email', $user_email)->first();
    if ($item === NULL||$item->user_deleteday !== NULL) {
      $validator->errors()->add('no_user_email', 'このメールアドレスは存在しません。');
      return redirect('/member_search')
      ->withErrors($validator)
      ->withInput();
    }

      return view('member_search_result', ['user_email' => $user_email, 'item' => $item]);
  }


}
