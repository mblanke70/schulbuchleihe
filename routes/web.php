<?php

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

use App\Booktitle;

Route::get('/', function () {
    return redirect()->route('buchtitel.index');
});


Route::resource('buchtitel', 'BooktitleController');
Route::resource('buchlisten', 'BooklistController');
Route::resource('buecher', 'BookController');