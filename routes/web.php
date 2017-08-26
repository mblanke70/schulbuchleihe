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

/*
 | Home
 */
Route::get('/', function () {
    return redirect()->route('buchtitel.index');
});


Route::resource('buchtitel', 'BooktitleController');


/*
 | Bücherlisten
 */
Route::delete('buchlisten/detach/{booklist}/{booktitle}', 'BooklistController@detach');
Route::post('buchlisten/attach/{id}', 'BooklistController@attach');
Route::resource('buchlisten', 'BooklistController');


/*
 | Bücher
 */
Route::resource('buecher', 'BookController');