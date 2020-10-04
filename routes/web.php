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

Route::get('/', 'WorkersController@index')->name('workers.index');
Route::get('workers/create',
    'WorkersController@create')->name('workers.create');
Route::post('workers/store', 'WorkersController@store')->name('workers.store');
Route::get('workers/{worker}/edit',
    'WorkersController@edit')->name('workers.edit');
Route::post('workers/{worker}/update',
    'WorkersController@update')->name('workers.update');
Route::post('workers/{worker}/destroy',
    'WorkersController@destroy')->middleware('auth')->name('workers.destroy');

Route::get('/login/{network}',
    'Auth\NetworkController@redirect')->name('login.network');
Route::get('/login/{network}/callback', 'Auth\NetworkController@callback');

Auth::routes();

