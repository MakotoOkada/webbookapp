@extends('layouts.form')

@section('title','会員退会画面')

@section('content')
<table>
  <tr>
   <th>会員ID</th>
   <td>{{$item->user_id}}</td>
  </tr>
  <tr>
   <th>名前</th>
   <td>{{$item->user_name}}</td>
  </tr>
  <tr>
   <th>住所</th>
   <td>{{$item->user_address}}</td>
  </tr>
  <tr>
   <th>電話番号</th>
   <td>{{$item->user_tel}}</td>
  </tr>
  <tr>
   <th>メールアドレス</th>
   <td>{{$item->user_email}}</td>
  </tr>
  <tr>
   <th>生年月日</th>
   <td>{{$item->user_birthday}}</td>
  </tr>
  <tr>
  <tr>
  <th></th><td>
  @error('no_return')
    <span class="errorMsg">{{$message}}</span>
  @enderror
  </td>
  </tr>
    <th><button type="button" name="back" class="back_button" onclick="history.back()">戻る</button></th>
    <td>
      <form class="" action="member_withdrawal_complete" method="post">
      @csrf
      <input type="hidden" name="user_deleteday" value="{{date('y/m/d')}}">
      <input type="hidden" name="user_id" value="{{$item->user_id}}">
      <button type="submit" class="next_button">退会する</button>
    </form>
    </td>
  </tr>
</table>
@endsection