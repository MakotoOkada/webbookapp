@extends('layouts.form')

@section('title', '会員登録画面')

@section('content')
<p>会員登録情報入力</p>

@if(count($errors) > 0)
<p>入力項目に問題があります。再入力してください。</p>
@endif

<form action="/member_register" method="post">
    @csrf
    <table border="1">
        <tr><th>名前：</th><td><input type="text" name="user_name" value="{{old('user_name')}}"><br>
        @error('user_name')
            <span class="errorMsg">{{$message}}</span></td>
        @enderror</tr>
        <tr><th>住所：</th><td><input type="text" name="user_address" value="{{old('user_address')}}"><br>
        @error('user_address')
            <span class="errorMsg">{{$message}}</span></td>
        @enderror</tr>
        <tr><th>電話番号：</th><td><input type="tel" name="user_tel" value="{{old('user_tel')}}"><br>
        @error('user_tel')
            <span class="errorMsg">{{$message}}</span></td>
        @enderror</tr>
        <tr><th>メールアドレス：</th><td><input type="email" name="user_email" value="{{old('user_email')}}"><br>
        @error('user_email')
            <span class="errorMsg">{{$message}}</span></td>
        @enderror</tr>
        <tr><th>生年月日：</th><td><input type="text" name="user_birthday" value="{{old('user_birthday')}}" placeholder="例)1990/01/01"><br>
        @error('user_birthday')
            <span class="errorMsg">{{$message}}</span></td>
        @enderror</tr>
        <tr><th></th><td><input type="submit" value="確認画面へ" class="button next_button"></td></tr>
    </table>
</form>

@endsection