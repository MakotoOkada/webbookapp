  
@extends('layouts.webbookapp')

@section('title', 'トップメニュー画面')

@section('content')
<div class="menu_wrap" style="text-align:center;">
  <button type="button" class="member" name="member_register" onclick="location.href='./member_register'">会員登録</button>
  <button type="button" class="member" name="member_search" onclick="location.href='./member_search'">会員検索</button>
  <button type="button" class="document" name="document_search" onclick="location.href='./document_search'">資料検索</button>
  <button type="button" class="document" name="document_add" onclick="location.href='./document_add'">資料追加</button>
  <button type="button" class="circulation" name="circulation" onclick="location.href='./circulation'">貸出</button>
  <button type="button" class="returns" name="returns" onclick="location.href='./returns'">返却</button>
</div>
@endsection