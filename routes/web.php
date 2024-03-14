<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirect', function (Request $request) {
    $state = Str::random(40);
    $request->session()->put('state', $state);
    $request->session()->put('client_id', $request->input('client_id'));
    $request->session()->put('secret_key', $request->input('client_secret'));

    $query = http_build_query([
        'client_id' => $request->input('client_id'),
        'redirect_uri' => 'http://127.0.0.1:8000/callback',
        'response_type' => 'code',
        'scope' => '',
        'state' => $state,
    ]);

    return redirect('http://wallserver.dyndns.info:86/oauth/authorize?' . $query);
})->name('redirect');

Route::get('/callback', function (Request $request) {
    $state = $request->session()->pull('state');
    $client_id = $request->session()->pull('client_id');
    $secret_key = $request->session()->pull('secret_key');

    throw_unless(
        strlen($state) > 0 && $state === $request->state,
        InvalidArgumentException::class,
        'Invalid state value.'
    );

    $response = Http::asForm()->post('http://wallserver.dyndns.info:86/oauth/token', [
        'grant_type' => 'authorization_code',
        'client_id' => $client_id,
        'client_secret' => $secret_key,
        'redirect_uri' => 'http://127.0.0.1:8000/callback',
        'code' => $request->code,
    ]);

    return $response->json();
});
