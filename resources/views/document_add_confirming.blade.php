@extends('layouts.form')
@section('title', '資料追加確認画面')

@section('content')

<form class="document_add_confirming_form" action="/document_add_last_confirming" method="post">
  @csrf
  <table>
  <tr><th>ISBN</th><td>{{$add_document_data['catalog_number']}}</td></tr>
  <tr><th class="form_items">入荷年月日</th><td><input type="text" name="arrival_date" value="<?=date("Y/m/d")?>" required><br>
  @error('arrival_date')
  <span class="errorMsg">{{$message}}</span>
  @enderror</td></tr>
  <input type="hidden" name="catalog_number" value="{{$add_document_data['catalog_number']}}" required>
  <tr><th class="form_items">資料名</th><td><input type="text" name="catalog_name" value="{{$add_document_data['catalog_name']}}" required><br>
  @error('catalog_name')
      <span class="errorMsg">{{$message}}</span>
  @enderror</td></tr>
  <tr><th class="form_items">分類コード</th><td><input type="number" name="catalog_code" value="{{$add_document_data['catalog_code']}}" required><br>
  @error('catalog_code')
      <span class="errorMsg">{{$message}}</span>
  @enderror</td></tr>
  <tr><th class="form_items">著者</th><td><input type="text" name="catalog_author" value="{{$add_document_data['catalog_author']}}" required><br>
  @error('catalog_author')
      <span class="errorMsg">{{$message}}</span>
  @enderror</td></tr>
  <tr><th class="form_items">出版社</th><td><input type="text" name="catalog_publishername" value="{{$add_document_data['catalog_publishername']}}" required><br>
  @error('catalog_publishername')
      <span class="errorMsg">{{$message}}</span>
  @enderror</td></tr>
  <tr><th class="form_items">出版日</th><td><input type="text" name="catalog_publication" value="{{$add_document_data['catalog_publication']}}" required><br>
  @error('catalog_publication')
      <span class="errorMsg">{{$message}}</span>
  @enderror</td></tr>
</table>
<p><button type="button" name="back_document_add" class="back_button" onclick="history.back()">戻る</button>
    <input type="submit" class="next_button" value="最終確認画面へ"></p>
</form>
@endsection