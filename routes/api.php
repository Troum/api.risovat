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

Route::group([
    'prefix' => 'user/v1',
    'middleware' => ['api', 'assign.guard:users']
], function ($router) {
    Route::post('register', 'UserAuthController@register');
    Route::post('login', 'UserAuthController@login');
    Route::group(['prefix' => 'auth'], function () {
        Route::get('email/verify/{id}', 'UserAuthController@verifyEmail')->name('verificationapi.verify');
        Route::post('logout', 'UserAuthController@logout');
        Route::post('refresh', 'UserAuthController@refresh');
    });
    Route::get('statuses', 'UserStatusController@isOnline');
});

Route::resource('sketching', 'SketchingController');
Route::resource('animation', 'AnimationController');
Route::resource('modeling', 'ModelingController');
