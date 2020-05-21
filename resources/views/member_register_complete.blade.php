@extends('layouts.form')

@section('title', '会員登録完了画面')

@section('content')
<p>以下の通り、会員登録が完了しました</p>

<table border="1">
    <tr><th>名前：</th><td>{{$form->user_name}}</td></tr>
    <tr><th>住所：</th><td>{{$form->user_address}}</td></tr>
    <tr><th>電話番号：</th><td>{{$form->user_tel}}</td></tr>
    <tr><th>メールアドレス：</th><td>{{$form->user_email}}</td></tr>
    <tr><th>生年月日：</th><td>{{$form->user_birthday}}</td></tr>
    <tr><th>入会年月日：</th><td>{{$form->user_joindate}}</td></tr>
</table>


@endsection