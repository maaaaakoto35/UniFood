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
Route::post('/', 'StoresController@isStore')->name('is_store');
Route::post('/search', 'StoresController@search');
Route::get('/search', 'StoresController@search')->name('search');
Route::get('/detail', 'StoresController@detail');
Route::get('/add_store', 'StoresController@add_store');
