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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/chatbox', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');


Route::resource('posts','PostsController');
Route::resource('image','imageController');

Route::post('posts/changeStatus', array('as' => 'changeStatus', 'uses' => 'PostsController@changeStatus'));
Route::post('posts/search', 'PostsController@search')->name('Posts.search');


Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/image','imageController@index');
Route::resource('dashboard', 'dashboardController');

Route::get('avatars/{name}', 'dashboardController@load');
Route::get('avatars/image/{name}', 'imageController@load');