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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

Route::post('/login','LoginController@Login')->name('login.web');
Route::post('/promotor','PromotorController@store')->name('promotor.store');
Route::get('/prospectos','ProspectoController@index')->name('prospectos.index');
Route::get('/prospectos/{id}','ProspectoController@show')->name('prospectos.show');
Route::put('/prospectos/{id}','ProspectoController@update')->name('prospectos.update');
Route::post('/registrar','ProspectoController@store')->name('prospectos.store');


