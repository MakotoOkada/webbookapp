@extends('layouts.form')
@section('title', '資料追加完了画面')

@section('content')

<table border="1" class="confirm_table">
  <h2 class="top_p">以下の内容で資料を追加しました。</h2></tr>
  <tr><th>ISBN</th><td>{{$add_document_data['catalog_number']}}</td></tr>
  <tr><th>入荷年月日</th><td>{{$add_document_data['arrival_date']}}</td></tr>
  <tr><th>資料名</th><td>{{$add_document_data['catalog_name']}}</td></tr>
  <tr><th>分類コード</th><td>{{$add_document_data['catalog_code']}}</td></tr>
  <tr><th>著者</th><td>{{$add_document_data['catalog_author']}}</td></tr>
  <tr><th>出版社</th><td>{{$add_document_data['catalog_publishername']}}</td></tr>
  <tr><th>出版日</th><td>{{$add_document_data['catalog_publication']}}</td></tr>
</table>
@endsection