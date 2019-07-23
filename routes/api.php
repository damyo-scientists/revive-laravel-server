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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * @deprecated
 */
Route::post('/sign-in', 'LoginController@signIn');
Route::post('/sign-up', 'LoginController@signUp');

Route::prefix('login')->group(function () {
    Route::post('/sign-in', 'LoginController@signIn');
    Route::post('/sign-up', 'LoginController@signUp');
});

Route::prefix('slots')->group(function () {
    Route::get('/', 'SlotController@get');
    Route::post('/', 'SlotController@create');
    Route::put('/', 'SlotController@update');
    Route::put('/', 'SlotController@delete');
});

Route::prefix('plays')->group(function () {
    Route::get('/', 'PlayController@get');
    Route::post('/', 'PlayController@create');
});