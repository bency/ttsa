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
Route::get('/', 'IndexController@home')->name('home');
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
    $ret = dispatch((new FetchPosts($fb_id, ['type' => 'FETCH_NEW_POST'])));
    return response($ret);
});
Route::get('/traffic/predict', 'TrafficController@predict')->name('traffic-predict');
Route::get('/facebook/hook', function(Request $request)
{
    $hub_mode = $request->input('hub_mode');
    if ('subscribe' !== $hub_mode) {
        return abort(404);
    }
    if ('hook' !== $request->input('hub_verify_token')) {
        return abort(404);
    }
    return response($request->input('hub_challenge'));
});
Route::get('/{string}', 'IndexController@show');
