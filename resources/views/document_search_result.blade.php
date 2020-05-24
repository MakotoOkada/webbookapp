@extends('layouts.form')

@section('title','資料検索結果画面')

@section('content')

{{--検索結果フォーム--}}
<p>資料検索結果</p>
<input type="search" name="search">
<!-- <input type="submit" name="submit" value="検索"> -->

{{--資料検索結果--}}
<table border="1">
  <tr>
    <th nowrap>ISBN番号</th>
    <th nowrap>資料名</th>
    <th nowrap>分類コード</th>
    <th nowrap>著者</th>
    <th nowrap>出版社</th>
    <th nowrap>出版日</th>
    <!-- <th nowrap>資料ID</th> -->
  </tr>
  @foreach($catalog_name as $item)
  <tr>
    <td nowrap>{{$item->catalog_number}}</td>
    <td nowrap>{{$item->catalog_name}}</td>
    <td nowrap>{{$item->catalog_code}}</td>
    <td nowrap>{{$item->catalog_author}}</td>
    <td nowrap>{{$item->catalog_publishername}}</td>
    <td nowrap>{{$item->catalog_publication}}</td>
    <!-- <td>{{$item->catalog_number}}</td> -->
  </tr>
  @endforeach
</table>

{{--戻るボタン--}}
  <button type="button" name="return_button" onclick="location.href='./document_search'">戻る</button>
@endsection