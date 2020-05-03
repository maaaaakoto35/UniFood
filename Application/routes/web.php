<?php

use Illuminate\Http\Request;

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

Route::get('/', 'StoresController@index')->name('index');
Route::get('/{member_id}', 'StoresController@index')->name('index_member_id');
Route::post('/', 'StoresController@isStore')->name('is_store');
Route::post('/search', 'StoresController@search');
Route::get('/search', 'StoresController@search')->name('search');
Route::get('/detail', 'DetailsController@index');
Route::post('/detail', 'DetailsController@storeShow')->name('store_show');
Route::post('/post', 'PostsController@post');
Route::get('/post_confirm', 'PostsController@postConfirm')->name('post_confirm');
Route::post('/post_confirm', 'PostsController@postConfirm');
Route::post('/log_in', 'MembersController@logIn');
Route::get('/set_up', 'MembersController@indexSetup');
Route::post('/set_up', 'MembersController@Setup');

Route::view('/post', 'post')->name('post');
Route::view('/philosophy', 'philosophy')->name('philosophy');
Route::view('/not_found', 'not_found')->name('not_found');
Route::view('/log_in', 'log_in');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

