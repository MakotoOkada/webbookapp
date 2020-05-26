@extends('layouts.form')

@section('title', '会員登録確認画面')

@section('content')

<table border="1" class="confirm_table">
        <tr><th>名前：</th><td>{{$data['user_name']}}</td></tr>
        <tr><th>住所：</th><td>{{$data['user_address']}}</td></tr>
        <tr><th>電話番号：</th><td>{{$data['user_tel']}}</td></tr>
        <tr><th>メールアドレス：</th><td>{{$data['user_email']}}</td></tr>
        <tr><th>生年月日：</th><td>{{$data['user_birthday']}}</td></tr>
</table>
        
<form action="/member_register_complete" method="post">
    @csrf
        <input type="hidden" name="user_name" value="{{$data['user_name']}}">
        <input type="hidden" name="user_address" value="{{$data['user_address']}}">
        <input type="hidden" name="user_tel" value="{{$data['user_tel']}}">
        <input type="hidden" name="user_email" value="{{$data['user_email']}}">
        <input type="hidden" name="user_birthday" value="{{$data['user_birthday']}}">
        <input type="hidden" name="user_joindate" value="{{date('Y/m/d')}}">
        <p style="text-align: center;"><button onclick="history.back()" class="button back_button" name="action" value="back">戻る</button>
        <button onclick="location.href='./member_register_complete'" class="button next_button" name="action" value="next">登録</button></p>
</form>



@endsection