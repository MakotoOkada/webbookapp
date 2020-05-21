<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/after_login_top', function () {
    return view('after_login_top');
});

Route::get('/member_register', function () {
    return view('member_register');
});

Route::get('/member_register_confirming', function () {
    return view('member_register_confirming');
});


Route::get('/member_register','MemberController@add_member');
Route::post('/member_register','MemberController@add_member_check');
Route::post('/member_register_complete','MemberController@create_member');

Route::get('/circulation', 'RentalReturnController@circulation');
Route::post('/circulation', 'RentalReturnController@rental');
