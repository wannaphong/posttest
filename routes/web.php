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

Route::get('/home', 'PostController@showall')->name('home');
Route::get('/home/{id}', 'PostController@showall')->name('home2');
Route::post('/save','PostController@create')->name('post');
Route::get('/del/{id}', 'PostController@del')->name('del');
// {id}
Route::get('/edit/{id}', 'PostController@get_data2update')->name('edit');
Route::get('/update/{id}','PostController@update_data')->name('update');
