@extends('layouts.webbookapp')

@section('title', '貸出画面')

@section('content')
<form action="circulation" method="post">
    @csrf
    <table border="1">
        <tr><th>会員ID</th><td><input type="number" name="user_id" value="{{old('user_id')}}"><br>
        @error('user_id')
            <span class="errorMsg">{{$message}}</span>
        @enderror
        </td><td><input type="submit" value="次へ" name="next" class="next_button"></td></tr>
    </table>
</form>

@endsection