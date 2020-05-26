@extends('layouts.form')

@section('title', '会員編集確認画面')

@section('content')
<table border="1" class="confirm_table">
  <tr><th>名前</th><td>{{$edit_member_data['user_name']}}</td></tr>
  <tr><th>住所</th><td>{{$edit_member_data['user_address']}}</td></tr>
  <tr><th>電話番号</th><td>{{$edit_member_data['user_tel']}}</td></tr>
  <tr><th>メールアドレス</th><td>{{$edit_member_data['user_email']}}</td></tr>
</table>
  <form class="" action="member_edit_complete" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{$edit_member_data['user_id']}}">
    <input type="hidden" name="user_name" value="{{$edit_member_data['user_name']}}">
    <input type="hidden" name="user_address" value="{{$edit_member_data['user_address']}}">
    <input type="hidden" name="user_tel" value="{{$edit_member_data['user_tel']}}">
    <input type="hidden" name="user_email" value="{{$edit_member_data['user_email']}}">
    <p><button type="button" name="back_member_search_result" class="back_button" onclick="history.back()">戻る</button>
    <input type="submit" name="go_edit_member_check" class="next_button" value="この内容で編集する">
  </form>
</p>

@endsection