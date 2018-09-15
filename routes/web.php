<?php

/*
|-----------------------------
---------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|


| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 
 
Route::get('/', 'TasksController@index');


//ユーザ登録機能
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//ログイン認証されているかどうかチェック→認証されたらリソース（get,post,put,deleteのCRUD、詳細ページ・新規作成用のHP・更新用のHPにアクセスできるルータの７種類のこと）
Route::group(['middleware' => ['auth']], function () {
    Route::resource('tasks','TasksController');
});