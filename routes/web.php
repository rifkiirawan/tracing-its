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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'role:Administrator'], function () {
    Route::get('user', 'UserController@index')->name('user.index');
    Route::get('user/create','UserController@create')->name('user.create');
    Route::post('user/store','UserController@store')->name('user.store');
    Route::get('user/edit/{id}','UserController@edit')->name('user.edit');
    Route::post('user/update','UserController@update')->name('user.update');
    Route::get('user/delete/{id}', 'UserController@delete')->name('user.delete');
});

Route::get('/kasus', 'KasusController@index')->name('kasus.index');
Route::get('/kasus/timeline/{id}', 'KasusController@timeline')->name('kasus.timeline');

Route::get('/isoman', 'IsomanController@index')->name('isoman.index');
