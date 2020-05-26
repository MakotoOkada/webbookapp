@extends('layouts.form')
@section('title', '返却画面')
@section('content')
<p>{{$msg}}</p>
  <form method="post" action="/return_complete">
   @csrf
   <tr><th>資料ID </th><td><input type="number" name="catalog_id"></td></tr>
    <input type="hidden" name="rental_returndate" value="{{date('Y/m/d')}}">
    <input type="submit" class="next_button" value="返却">
  </form>
  @error('catalog_id')
  <span class="errorMsg">{{$message}}</span>
  @enderror
  @error('no_rental')
  <span class="errorMsg">{{$message}}</span>
  @enderror
  @error('no_catalog')
  <span class="errorMsg">{{$message}}</span>
  @enderror
@endsection