<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::resource('qa', 'QAController');
Route::get('/', 'IndexController@random')->name('home');
Route::get('/diagrams', 'DiagramController@index');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');
Route::get('/{string}', 'IndexController@show');
