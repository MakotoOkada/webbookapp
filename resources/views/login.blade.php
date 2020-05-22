@extends('layouts.login_layout')

@section('title','ログイン画面')

@section('content')
<p>{{$message}}</p>
    <form class="" action="login" method="post">
    @csrf
    <table>
        <tr>
        <th>会員ID</th><td><input type="number" name="user_id"><br>
        @error('user_id')
            <span class="errorMsg">{{$message}}</span>
        @enderror
        </td></tr>
        <tr>
        <th>Email</th><td><input type="email" name="user_mail"><br>
        @error('user_email')
            <span class="errorMsg">{{$message}}</span>
        @enderror
        </td></tr>
        <tr>
        <th></th><td><input type="submit" class="next_button" value="ログイン"></td>
        </tr>
    </table>
    </form>
@endsection