@extends('layouts.form')

@section('title','資料変更画面')

@section('content')

{{--変更する資料テーブル--}}
<form action="document_change_confirming" method="post">
@csrf
<input type="hidden" name="catalog_number" value="{{$register_data->catalog_number}}">
<table calss="confirm_table">
  <tr>
    <th>資料ID</th>
    <td>{{$register_data->catalog_id}}</td>
    <input type="hidden" name="catalog_id" value="{{$register_data->catalog_id}}">
  </tr>
  <tr>
    <th>資料名</th>
    <td><input type="text" name="catalog_name" value="{{$register_data->catalog_name}}"><br>
    @error('catalog_name')
      <span class="errorMsg">{{$message}}</span>  
    @enderror
    </td>
  </tr>
  <tr>
    <th>廃棄年月日</th>
    <td><input type="text" name="disposal_date" value="{{$register_data->disposal_date}}"><br>
    @error('disposal_date')
      <span class="errorMsg">{{$message}}</span>
    @enderror
    </td>
  </tr>
  <tr>
    <th>備考</th>
    <td><input type="text" name="catalog_remark" value="{{$register_data->catalog_remark}}"><br>
    @error('catalog_remark')
    <span class="errorMsg">{{$message}}</span>
    @enderror
    </td>
  </tr>
</table>
<div class="button_wrap">
<p><button type="button" name="search_button" class="back_button" onclick="history.back()">戻る</button></p>
<p><input type="submit" value="変更"  class="next_button"></p>
</div>
</form>




@endsection