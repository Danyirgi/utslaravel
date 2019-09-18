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
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::middleware(['jwt.verify'])->group(function() {
Route::get('book', 'MobilController@book');
Route::get('bookall', 'MobilController@bookAuth')->middleware('jwt.verify');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');
    
Route::get('mobil','MobilController@index');
Route::post('mobil','MobilController@create');
Route::get('/mobil/{id}','MobilController@detail');
Route::put('/mobil/{id}','MobilController@update');
Route::delete('/mobil/{id}','MobilController@delete');
});