@extends('layouts.form')
@section('title', '資料追加確認画面')

@section('content')
<table>
  <tr><th>ISBN</th><td>{{$add_document_data['catalog_number']}}</td></tr>
</table>
<form class="document_add_confirming_form" action="/document_add_last_confirming" method="post">
  @csrf
  <p><span class="form_items">入荷年月日</span><input type="text" name="arrival_date" value="<?=date("Y/m/d")?>" required></p>
  @error('arrival_date')
  <span class="errorMsg">{{$message}}</span>
  @enderror
  <input type="hidden" name="catalog_number" value="{{$add_document_data['catalog_number']}}" required>
  <p><span class="form_items">資料名</span><input type="text" name="catalog_name" value="{{$add_document_data['catalog_name']}}" required></p>
  @error('catalog_name')
      <span class="errorMsg">{{$message}}</span>
  @enderror
  <p><span class="form_items">分類コード</span><input type="number" name="catalog_code" value="{{$add_document_data['catalog_code']}}" required></p>
  @error('catalog_code')
      <span class="errorMsg">{{$message}}</span>
  @enderror
  <p><span class="form_items">著者</span><input type="text" name="catalog_author" value="{{$add_document_data['catalog_author']}}" required></p>
  @error('catalog_code')
      <span class="errorMsg">{{catalog_author}}</span>
  @enderror
  <p><span class="form_items">出版社</span><input type="text" name="catalog_publishername" value="{{$add_document_data['catalog_publishername']}}" required></p>
  @error('catalog_code')
      <span class="errorMsg">{{catalog_publishername}}</span>
  @enderror
  <p><span class="form_items">出版日</span><input type="text" name="catalog_publication" value="{{$add_document_data['catalog_publication']}}" required></p>
  @error('catalog_code')
      <span class="errorMsg">{{catalog_publication}}</span>
  @enderror
  <p><button type="button" name="back_document_add" class="back_button" onclick="history.back()">戻る</button>
    <input type="submit" class="next_button" value="最終確認画面へ"></p>
</form>