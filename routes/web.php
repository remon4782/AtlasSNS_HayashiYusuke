<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//loginの名前のURLに遷移した時に、loginコントローラーのloginメゾットの処理をするという意味。
//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');//ログインぺージを表示する
Route::post('/login', 'Auth\LoginController@login');//ログインするための機能・処理

Route::get('/registerView', 'Auth\RegisterController@registerView');//新規登録のページを表示する。合わせる
Route::post('/registerPost', 'Auth\RegisterController@registerPost');//新規登録の機能・処理
//変更する点を変える
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');
//viewように作成が必要
//それに合わせたコントロールを作成

//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@index');
Route::get('/search_result','UsersController@index');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');
