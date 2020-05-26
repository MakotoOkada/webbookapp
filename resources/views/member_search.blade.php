@extends('layouts.form')
@section('content')

<p style="text-align: center;">{{$msg}}</p>
  <form method="post" action="/member_search_result" >
   @csrf
    <p><input type="text" name="user_email" required>
    <input type="submit" class="next_button" value="検索"></p>
  @error('user_email')
    <span class="errorMsg">{{$message}}</span>
  @enderror
  @error('no_user_email')
    <span class="errorMsg">{{$message}}</span>
  @enderror
  </form>
  
@endsection