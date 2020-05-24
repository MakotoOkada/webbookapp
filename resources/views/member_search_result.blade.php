@extends('layouts.webbookapp')

 @section('content')
 <!-- 検索ボックス -->
 <form method="post" action="/member_search_result">
  @csrf
<input type="text" name="user_email" value="{{$user_email}}" required>
   <input type="submit" value="検索">
 </form>
 検索結果

  <table>
    <tr><th>会員ID</th><td>{{$item->user_id}}</td></tr>
    <tr><th>名前</th><td>{{$item->user_name}}</td></tr>
    <tr><th>生年月日</th><td>{{$item->user_birthday}}</td></tr>
    <tr><th>住所</th><td>{{$item->user_address}}</td></tr>
    <tr><th>電話番号</th><td>{{$item->user_tel}}</td></tr>
    <tr><th>メールアドレス</th><td>{{$item->user_email}}</td></tr>
  </table>
  <form method="get" action="/member_edit">
    <input type="hidden" name="user_id" value="{{$item->user_id}}">
   <input type="submit" value="編集する">
    </form>
  <form method="get" action="/member_withdrawal">
  <input type="hidden" name="user_id" value="{{$item->user_id}}">
   <input type="submit" value="退会する">
   </form>
  @endsection