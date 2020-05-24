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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/after_login_top', function () {
//     return view('after_login_top');
// });


Route::get('after_login_top', 'LoginController@top')->middleware('auth');


Route::get('/member_register','MemberController@add_member')->middleware('auth');
Route::post('/member_register','MemberController@add_member_check')->middleware('auth');
Route::post('/member_register_complete','MemberController@create_member')->middleware('auth');

Route::get('/circulation', 'RentalReturnController@circulation')->middleware('auth');
Route::post('/circulation', 'RentalReturnController@validate_check')->middleware('auth');
Route::get('/circulation_check', 'RentalReturnController@rental')->middleware('auth');
Route::post('/circulation_check', 'RentalReturnController@validate_check')->middleware('auth');
Route::post('/circulation_complete', 'RentalReturnController@rental')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//岩下さん
Route::get('/member_withdrawal', 'MemberController@remove_member')->middleware('auth');
Route::post('/member_withdrawal', 'MemberController@remove_member')->middleware('auth');
Route::post('/member_withdrawal_complete', 'MemberController@delete_member')->middleware('auth');
Route::get('/member_withdrawal_complete', function(){
  return view('member_withdrawal_complete');})->middleware('auth');

Route::get('/document_delete', 'RegisterCatalogController@remove_document')->middleware('auth');
Route::post('/document_delete_complete', 'RegisterCatalogController@delete_document')->middleware('auth');
Route::get('/document_delete_complete', function(){
  return view('document_delete_complete');})->middleware('auth');

// 本間くん
// 資料検索画面
Route::get('/document_search', function () {
    return view('document_search');
})->middleware('auth');
Route::post('/document_search_result','RegisterCatalogController@find_document')->middleware('auth');

//資料検索結果画面
Route::get('/document_search_result', function () {
    return view('document_search_result');
})->middleware('auth');

//吉川さん
Route::get('/member_search', 'MemberController@search_member')->middleware('auth');
Route::get('/member_search_result', function (){
  return view('member_search_result');
})->middleware('auth');
Route::post('/member_search_result', 'MemberController@find_member')->middleware('auth');
Route::get('/returns', 'RentalReturnController@index')->middleware('auth');
Route::post('/return_complete', 'RentalReturnController@post')->middleware('auth');

//杉澤さん
Route::get('/member_edit', 'MemberController@edit_member')->middleware('auth');
Route::post('/member_edit_confirming', 'MemberController@edit_member_check')->middleware('auth');
Route::post('/member_edit_complete', 'MemberController@update_member')->middleware('auth');
Route::get('/document_add', 'RegisterCatalogController@add_document')->middleware('auth');
Route::get('/document_add_confirming', 'RegisterCatalogController@add_document')->middleware('auth'); //TODO 変える
Route::post('/document_add_confirming', 'RegisterCatalogController@add_document_check')->middleware('auth');
Route::get('/document_add_last_confirming', 'RegisterCatalogController@add_document_check')->middleware('auth');
Route::post('/document_add_last_confirming', 'RegisterCatalogController@add_document_last_check')->middleware('auth');
Route::post('/document_add_complete', 'RegisterCatalogController@create_document')->middleware('auth');
