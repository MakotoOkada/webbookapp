@extends('layouts.webbookapp')

@section('title', '貸出完了画面')

@section('content')
<p>貸出が完了しました。</p>
<p>返却期日は以下の通りです。</p>
<table border="1">
    <tr><th>返却期日</th></tr>
    <tr><td>{{$item->rental_limitdate}}まで</td></tr>
</table>
@endsection