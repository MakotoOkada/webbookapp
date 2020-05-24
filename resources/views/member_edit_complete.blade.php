@extends('layouts.form')

@section('title', '会員編集完了画面')

@section('content')
  <p>編集後の会員情報</p>
  <table>
    <tr><th>名前</th><td>{{$user_data->user_name}}</td></tr>
    <tr><th>住所</th><td>{{$user_data->user_address}}</td></tr>
    <tr><th>電話番号</th><td>{{$user_data->user_tel}}</td></tr>
    <tr><th>メールアドレス</th><td>{{$user_data->user_email}}</td></tr>
  </table>
  <p>会員情報の編集が完了しました。</p>
@endsection