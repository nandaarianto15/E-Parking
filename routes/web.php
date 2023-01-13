<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('testlogin');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/pegawai', 'App\Http\Controllers\PegawaiController@index');


Route::get('/price', 'App\Http\Controllers\PriceController@index');
Route::post('/price', 'App\Http\Controllers\PriceController@input');
Route::delete('/price/{id}', [App\Http\Controllers\PriceController::class, 'delete']);
Route::get('/price/edit/{id}','App\Http\Controllers\PriceController@edit');
Route::post('/price/update','App\Http\Controllers\PriceController@update');


Route::get('/profil', 'App\Http\Controllers\ProfilController@index');
Route::post('/profil', 'App\Http\Controllers\ProfilController@update');


Route::get('/masuk', 'App\Http\Controllers\MasukController@index');
Route::get('/in', 'App\Http\Controllers\MasukController@data');


Route::post('/karcis', 'App\Http\Controllers\MasukController@karcis');
Route::get('/karcis{id}', 'App\Http\Controllers\MasukController@print');


Route::get('/keluar', 'App\Http\Controllers\KeluarController@index');
Route::post('/keluar', 'App\Http\Controllers\KeluarController@inp');
Route::get('/keluar/{id}', 'App\Http\Controllers\KeluarController@inp');
