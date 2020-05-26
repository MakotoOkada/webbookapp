@extends('layouts.form')

@section('title', '貸出完了画面')

@section('content')
<table border="1" class="confirm_table">
    <h2 style="text-align:center;">貸出が完了しました。</h2>
    <h2 style="text-align:center;">返却期日は以下の通りです。</h2>
    <tr><th>返却期日</th></tr>
    <tr><td>{{$item->rental_limitdate}}まで</td></tr>
</table>
@endsection