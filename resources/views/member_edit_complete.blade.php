@extends('layouts.form')

@section('title', '会員編集完了画面')

@section('content')
<h2>会員情報の編集が完了しました</h2>
  <table border="1" class="confirm_table">
    <tr><th>名前</th><td>{{$user_data->user_name}}</td></tr>
    <tr><th>住所</th><td>{{$user_data->user_address}}</td></tr>
    <tr><th>電話番号</th><td>{{$user_data->user_tel}}</td></tr>
    <tr><th>メールアドレス</th><td>{{$user_data->user_email}}</td></tr>
  </table>
@endsection