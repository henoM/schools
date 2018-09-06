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
Route::post('/login','Auth\LoginController@login')->name('login');

Route::get('/home', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::middleware('admin')->group(function () {
    Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {

        Route::get('/dashboard','AdminController@index')->name('admin.dashboard');

    });
});