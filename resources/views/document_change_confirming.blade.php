@extends('layouts.form')

@section('title','資料変更確認画面')

@section('content')


{{--変更された資料テーブル--}}
{{--資料検索結果--}}
<table border="1"  class="document_result">
  <tr>
    <th nowrap>資料ID</th>
    <th nowrap>資料名</th>
    <th nowrap>廃棄年月日</th>
    <th nowrap>備考</th>
  </tr>

  <tr>
    <td nowrap>{{$register_data->catalog_id}}</td>
    <td nowrap>{{$register_data->catalog_name}}</td>
    <td nowrap>{{$register_data->disposal_date}}</td>
    <td nowrap>{{$register_data->catalog_remark}}</td>
  </tr>
</table>

<div class="button_wrap">

{{--検索画面へ戻るボタン--}}
<button type="button" name="search_button" class="back_button" onclick="history.back()">戻る</button>

{{--確認完了画面へボタン--}}
<form class="" action="document_change_complete" method="post">
  @csrf
  <input type="hidden" name="catalog_id" value="{{$register_data->catalog_id}}">
  <input type="hidden" name="catalog_number" value="{{$register_data->catalog_number}}">
  <input type="hidden" name="catalog_name" value="{{$register_data->catalog_name}}">
  <input type="hidden" name="disposal_date" value="{{$register_data->disposal_date}}">
  <input type="hidden" name="catalog_remark" value="{{$register_data->catalog_remark}}">
  <input type="submit" class="next_button" value="確認">
</form>
</div>
  <!-- <button type="button" name="complete_button" onclick="location.href='./document_change_complete'">確認完了</button> -->
@endsection