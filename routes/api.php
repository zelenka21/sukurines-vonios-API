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

Route::apiResource('apartments', 'ApartmentController');
Route::apiResource('reviews', 'ReviewController');

Route::apiResource('apartments.reviews', 'ReviewController');

Route::apiResource('users', 'UserController');
Route::apiResource('users.reservations', 'ReservationController');
