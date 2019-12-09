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
//first tut
// Route::prefix('auth')->group(function () {
//     Route::post('register', 'AuthController@register');
//     Route::post('login', 'AuthController@login');
//     Route::get('refresh', 'AuthController@refresh');
//     Route::group(['middleware' => 'auth:api'], function(){
//         Route::get('user', 'AuthController@user');
//         Route::post('logout', 'AuthController@logout');
//     });
// });

// Route::group(['middleware' => 'auth:api'], function(){
//     // Users
//     Route::get('users', 'UserController@index')->middleware('isAdmin');
//     Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
// });

//original
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//second tut

Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');




Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');


    Route::apiResource('apartments', 'ApartmentController');
   // Route::apiResource('reviews', 'ReviewController');

    Route::apiResource('apartments.reviews', 'ReviewController');

    Route::apiResource('users', 'UserController');
    Route::apiResource('users.reservations', 'ReservationController');

});




//non jwt routes


// Route::apiResource('apartments', 'ApartmentController');
// Route::apiResource('reviews', 'ReviewController');

// Route::apiResource('apartments.reviews', 'ReviewController');

// //Route::apiResource('users', 'UserController');
// Route::apiResource('users.reservations', 'ReservationController');

Route::fallback(function(){
    return response()->json([
        'message' => 'not found'], 404);
});