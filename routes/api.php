<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
Route::get('/driverlicenses', 'DiagramController@driverLicenses');
Route::get('/vehicles', 'DiagramController@vehicles');
Route::get('/accident-ratio', 'DiagramController@accidentRatio');
Route::get('/accident-a1', 'DiagramController@a1Ratio');

Route::resource('posts', 'PostController');
Route::resource('imagetag', 'ImageTagController');
Route::resource('traffic', 'TrafficController');
