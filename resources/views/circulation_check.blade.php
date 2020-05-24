@extends('layouts.webbookapp')

@section('title', '貸出画面')

@section('content')
<form action="circulation_check" method="post">
    @csrf
    <table border="1">
        <tr><th>会員ID</th><td><input type="number" name="user_id" value="{{$data['user_id']}}"><br>
        @error('user_id')
            {{$message}}
        @enderror
        </td><td><button onclick="location.href='./circulation_check'" class="button next_button" name="action" value="next">次へ</button></td></tr>
    </table>
</form>


@if(!(empty($total)) && $total <= 5 && $total > 0)
<p>あと{{$total}}冊借りられます</p>
<form action="circulation_check" method="post">
    @csrf
    <table border="1">
        <tr><th>資料ID</th><td><input type="number" name="catalog_id" value="{{old('catalog_id')}}"><br>
        @error('catalog_id')
            <span class="errorMsg">{{$message}}</span>
        @enderror
        @error('no_return')
            <span class="errorMsg">{{$message}}</span>
        @enderror
        </td>
        <input type="hidden" name="user_id" value="{{$user_id}}">
        <input type="hidden" name="rental_loandate" value="{{date('Y-m-d')}}">
        <td><button onclick="location.href='./circulation_check'" class="button next_button" name="action" value="next_last">貸出</button></td></tr>
    </table>
</form>
@elseif($total <= 0)
<p>これ以上借りることはできません</p>
@endif

@endsection