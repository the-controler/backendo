<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//auth
Route::post('register','App\Http\Controllers\AuthController@register');
Route::post('login','App\Http\Controllers\AuthController@login');
Route::post('Adlogin','App\Http\Controllers\AuthController@Adlogin');
Route::get('refresh','App\Http\Controllers\AuthController@refresh');
Route::get('logout','App\Http\Controllers\AuthController@logout');
Route::get('respondWithToken/{token}','App\Http\Controllers\AuthController@respondWithToken');
Route::get('getJWTIdentifier','App\Http\Controllers\AuthController@getJWTIdentifier');
Route::post('get_username_jwt','App\Http\Controllers\AuthController@get_username_jwt');

// users
Route::get('users', 'App\Http\Controllers\UserController@getuser');
Route::get('user/{id}', 'App\Http\Controllers\UserController@getuserById');
Route::put('updateuser/{id}', 'App\Http\Controllers\UserController@updateuser');
Route::delete('deleteuser/{id}', 'App\Http\Controllers\UserController@deleteuser');
//reservations
Route::get('reservations', 'App\Http\Controllers\ReservationController@getreservation');
Route::get('get_ID_car/{name}', 'App\Http\Controllers\ReservationController@get_ID_car');
Route::put('Reservation_car/{name}', 'App\Http\Controllers\ReservationController@Reservation_car');
Route::get('getreservationById/{id}', 'App\Http\Controllers\ReservationController@getreservationById');
Route::post('addreservation}', 'App\Http\Controllers\ReservationController@addreservation');
Route::put('updatereservation/{id}', 'App\Http\Controllers\ReservationController@updatereservation');
Route::delete('deletereservation/{id}', 'App\Http\Controllers\ReservationController@deletereservation');

//cars
Route::get('get_Available_car', 'App\Http\Controllers\CarController@get_Available_car');
Route::get('get_all_car', 'App\Http\Controllers\CarController@get_all_car');
Route::get('getcarById/{id}', 'App\Http\Controllers\CarController@getcarById');
Route::post('addcar', 'App\Http\Controllers\CarController@addcar');
Route::put('updatecar/{id}', 'App\Http\Controllers\CarController@updatecar');
Route::delete('deletecar/{id}', 'App\Http\Controllers\CarController@deletecar');

