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
    return view('layouts.app');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/news/create', 'NewsController@create');
    Route::post('/news', 'NewsController@store');
});

Route::get('/news', 'NewsController@index');
Route::get('/news/{id}', 'NewsController@show');

Route::get('/rss', function () {
    return redirect('/Rss.xml');
});