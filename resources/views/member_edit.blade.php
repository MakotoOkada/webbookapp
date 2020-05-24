@extends('layouts.form')

@section('title', '会員編集画面')

@section('content')

<form class="member_edit_form" action="/member_edit_confirming" method="post">
  @csrf
  <p><span class="form_items">名前</span><input type="text" name="user_name" value="{{$user_data->user_name}}" required></p>
  @error('user_name')
      <span class="errorMsg">{{$message}}</span>
  @enderror
  <p><span class="form_items">住所</span><input type="text" name="user_address" value="{{$user_data->user_address}}" required></p>
  @error('user_address')
      <span class="errorMsg">{{$message}}</span>
  @enderror
  <p><span class="form_items">電話番号</span><input type="text" name="user_tel" value="{{$user_data->user_tel}}" required></p>
  @error('user_tel')
      <span class="errorMsg">{{$message}}</span>
  @enderror
  <p><span class="form_items">メールアドレス</span><input type="text" name="user_email" value="{{$user_data->user_email}}" required></p>
  @error('user_email')
      <span class="errorMsg">{{$message}}</span>
  @enderror
  <p><button type="button" name="back_member_search_result" class="back_button" onclick="history.back()">戻る</button>
    <input type="hidden" name="user_id" value="{{$user_data->user_id}}">
    <input type="submit" name="go_edit_member_check" class="next_button" value="確認画面へ"></p>
</form>
@endsection