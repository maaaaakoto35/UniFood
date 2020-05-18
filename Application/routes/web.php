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

Route::get('/',              'StoresController@index')->name('index');
Route::post('/',             'StoresController@isStore')->name('is_store');
Route::post('/search',       'StoresController@search');
Route::get('/search',        'StoresController@search')->name('search');
Route::get('/detail',        'DetailsController@index');
Route::post('/detail',       'DetailsController@storeShow')->name('store_show');
Route::post('/post',         'PostsController@post');
Route::get('/post_confirm',  'PostsController@postConfirm')->name('post_confirm');
Route::post('/post_confirm', 'PostsController@postConfirm');
Route::get('/post',          'PostsController@index')->name('post');
Route::get('/login',         'MembersController@indexLogIn')->name('login');
Route::post('/login',        'MembersController@logIn');
Route::get('/signup',        'MembersController@indexSignUp')->name('signup');
Route::post('/signup',       'MembersController@signUp');
Route::get('/my_page',       'MembersController@myPage')->name('my_page');

Route::view('/philosophy', 'philosophy')->name('philosophy');
Route::view('/not_found',  'not_found')->name('not_found');
Route::view('/furusato',   'furusato')->name('furusato');
Route::view('/hannnari',   'hannnari')->name('hannnari');
Route::view('/musubi',     'musubi')->name('musubi');
Route::view('/itibariki',  'itibariki')->name('itibariki');
Route::view('/cosmic',     'cosmic')->name('cosmic');
Route::view('/fujikatu',   'fujikatu')->name('fujikatu');
Route::view('/familymart', 'familymart')->name('familymart');
Route::view('/babyface',   'babyface')->name('babyface');
Route::view('/libre',      'libre')->name('libre');
Route::view('/miyako',     'miyako')->name('miyako');

Route::view('/log_in', 'log_in');


