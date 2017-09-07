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

Route::get('buchtitel/createFromISBN/{isbn}', 'BooktitleController@createFromISBN');
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





Route::get('/redirect', function () {

    $query = http_build_query([
        'client_id' => '54_7tavq619x98g4oks4k4w0w80g8kssc0os4kw4oowcwwgcwc00',
        'redirect_uri' => 'http://localhost/schulbuchleihe/callback',
        'response_type' => 'code',
        'scope' => ''
    ]);

    return redirect('https://urs-os.de/iserv/oauth/v2/auth?'.$query);
});


Route::get('/callback', function (Illuminate\Http\Request $request) {
    $http = new \GuzzleHttp\Client;

    $response = $http->post('https://urs-os.de/iserv/oauth/v2/token', [
        'form_params' => [
            'client_id' => '54_7tavq619x98g4oks4k4w0w80g8kssc0os4kw4oowcwwgcwc00',
            'client_secret' => '55c64yrtnlogooss0ogcocgg4w8g4wgs48oo8wk4c0wog4k0gs',
            'grant_type' => 'authorization_code',
            'redirect_uri' => 'http://localhost/schulbuchleihe/callback',
            'code' => $request->code,
        ],
    ]);
    return json_decode((string) $response->getBody(), true);
});