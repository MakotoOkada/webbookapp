@extends('layouts.webbook')

@section('title', '貸出完了画面')

@section('content')
<p>貸出が完了しました。</p>
<p>返却期日は以下の通りです。</p>
<table>
    <tr><th>貸出資料</th><th>返却期日</th></tr>
    @foreach($items as $item)
        <tr><td>{{$item->catalog_name}}</td><td>{{$item->rental_limitdate}}</td></tr>
    @endforeach
</table>
@endsection