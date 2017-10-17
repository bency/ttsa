<?php

use App\Jobs\FetchPosts;
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
Route::get('/', 'IndexController@dashboard')->name('home');
Route::get('/diagrams', 'DiagramController@index');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');

// Endpoint that is redirected to after an authentication attempt
Route::get('/facebook/callback', 'FacebookController@callback');
Route::get('/facebook/login', 'FacebookController@login')->name('login');
Route::get('/facebook/fetch/{fb_id}', function($fb_id)
{
    $token = Session::get('fb_user_access_token');
    $ret = dispatch((new FetchPosts($fb_id, $token)));
    return response($ret);
});
Route::get('/{string}', 'IndexController@show');
