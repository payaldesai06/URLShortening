<?php

use Illuminate\Support\Facades\Route;

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

// Shortened URL endpoints
Route::get('/', function () {
  return view('short-url');
});
Route::post('encode', 'App\Http\Controllers\UrlController@encode')->name('url.encode');
Route::post('decode', 'App\Http\Controllers\UrlController@decode')->name('url.decode');
