@extends('layouts.form')
@section('content')

<p>{{$msg}}</p>
  <form method="post" action="/member_search_result">
   @csrf
   <input type="text" name="user_email" required>
    <input type="submit" value="検索">
  </form>
  @error('user_email')
  <span class="errorMsg">{{$message}}</span>
  @enderror
  @error('no_user_email')
  <span class="errorMsg">{{$message}}</span>
  @enderror
@endsection