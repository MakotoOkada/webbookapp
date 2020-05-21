@extends('layouts.webbookapp')

@section('title', '貸出画面')

@section('content')
<form action="circulation" method="post">
    @csrf
    <table border="1">
        <tr><th>会員ID</th><td><input type="number" name="user_id" value="{{old('user_id')}}"></td><td><input type="submit" value="次へ" name="next" class="next_button"></td></tr>
    </table>
</form>

@if(!(empty($total)) && $total <= 5)
<p>あと{{$total}}冊借りられます</p>
<form action="circulation_complete" method="post">
    @csrf
    <table border="1">
    @for($i = 1;$i <= $total;$i++)
        <tr><th>資料ID</th><td><input type="number" name="catalog_id" value="{{old('catalog_id')}}"></td></tr>
        <input type="hidden" name="user_id" value="{{$user_id}}">
        <input type="hidden" name="rental_loandate" value="{{date('Y-m-d')}}">
    @endfor
        <tr><th></th><td><input type="submit" value="貸出" name="next_last" class="next_button"></td></tr>
    </table>
</form>
@endif

@endsection