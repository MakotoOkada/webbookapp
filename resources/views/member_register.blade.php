@extends('layouts.form')

@section('title', '会員登録画面')

@section('content')

<form action="/member_register" method="post">
    @csrf
    <table class="confirm_table">
        <tr><th class="form_item">名前</th><td><input type="text" name="user_name" value="{{old('user_name')}}" required><br>
        @error('user_name')
            <span class="errorMsg">{{$message}}</span></td>
        @enderror</tr>
        <tr><th class="form_item">住所</th><td><input type="text" name="user_address" value="{{old('user_address')}}" required><br>
        @error('user_address')
            <span class="errorMsg">{{$message}}</span></td>
        @enderror</tr>
        <tr><th class="form_item">電話番号</th><td><input type="tel" name="user_tel" value="{{old('user_tel')}}" required><br>
        @error('user_tel')
            <span class="errorMsg">{{$message}}</span></td>
        @enderror</tr>
        <tr><th class="form_item">メールアドレス</th><td><input type="email" name="user_email" value="{{old('user_email')}}" required><br>
        @error('user_email')
            <span class="errorMsg">{{$message}}</span></td>
        @enderror</tr>
        <tr><th class="form_item">生年月日</th><td><input type="text" name="user_birthday" value="{{old('user_birthday')}}" placeholder="例)1990/01/01" required><br>
        @error('user_birthday')
            <span class="errorMsg">{{$message}}</span></td>
        @enderror</tr>
    </table>
    <p><input type="submit" value="確認画面へ" class="button next_button"></p>
</form>

@endsection