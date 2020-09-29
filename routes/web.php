<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listaProspecto',function () {
    return view('listaProspecto
    ');

})->middleware('auth');
Route::get('/listaProspecto/{id}',function () {
    return view('detalleProspecto
    ');
});


Route::get('/evaluarProspecto/{id}',function () {
    return view('evaluarProspecto
    ');
});

Route::get('/login',function () {
    return view('login
    ');
})->name("login");

Route::get('/registroPromotor',function () {
    return view('registroPromotor
    ');
});


Route::get('/logout',function () {
    Auth::logout();
    return redirect('/login
    ');
});
