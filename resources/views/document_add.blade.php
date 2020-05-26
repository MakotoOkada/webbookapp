@extends('layouts.form')
@section('title', '資料追加画面')

@section('content')
<form class="document_add_form" action="/document_add_confirming" method="post">
  @csrf
  <p><span class="form_items">ISBN</span><input type="number" name="catalog_number" value="{{old('catalog_number')}}" placeholder="半角数字(ハイフンなし)" equired></p>
  @error('catalog_number')
      <span class="errorMsg">{{$message}}</span>
  @enderror

  <p><input type="submit" class="next_button" value="確認画面へ"></p>
</form>
@endsection