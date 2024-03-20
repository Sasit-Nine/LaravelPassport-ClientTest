<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
Route::get('/password', function () {
    return view('passwordclient');
})->name('password');

Route::get('/client', function () {
    return view('client');
})->name('client');
Route::get('/tokentest', function () {
    return view('tokentest');
})->name('tokentest');

// **Authorization Code Grant**

// Route::get('/redirect', function (Request $request) {
//     $state = Str::random(40);
//     $request->session()->put('state', $state);
//     $request->session()->put('client_id', $request->input('client_id'));
//     $request->session()->put('secret_key', $request->input('client_secret'));

//     $query = http_build_query([
//         'client_id' => $request->input('client_id'),
//         'redirect_uri' => 'http://127.0.0.1:8000/callback',
//         'response_type' => 'code',
//         'scope' => '',
//         'state' => $state,
//     ]);

//     return redirect('http://wallserver.dyndns.info:86/oauth/authorize?' . $query);
// })->name('redirect');

// Route::get('/callback', function (Request $request) {
//     $state = $request->session()->pull('state');
//     $client_id = $request->session()->pull('client_id');
//     $secret_key = $request->session()->pull('secret_key');

//     throw_unless(
//         strlen($state) > 0 && $state === $request->state,
//         InvalidArgumentException::class,
//         'Invalid state value.'
//     );

//     $response = Http::asForm()->post('http://wallserver.dyndns.info:86/oauth/token', [
//         'grant_type' => 'authorization_code',
//         'client_id' => $client_id,
//         'client_secret' => $secret_key,
//         'redirect_uri' => 'http://127.0.0.1:8000/callback',
//         'code' => $request->code,
//     ]);

//     return $response->json();
// });

Route::get('/passwordgrant',function(Request $request){
    $response = Http::asForm()->post('http://wallserver.dyndns.info:86/oauth/token', [
        'grant_type' => 'password',
        'client_id' => $request->input('client_id'),
        'client_secret' => $request->input('secret_key'),
        'username' => $request->input('email'),
        'password' => $request->input('password'),
        'scope' => $request->input('scope'),
    ]);
    return $response->json();
})->name('passwordgrant');

// **Authorization Code Grant with PKCE**

Route::get('/redirect', function (Request $request) {
    $request->session()->put('client_id', $request->input('client_id'));
    $request->session()->put('state', $state = Str::random(40));

    $request->session()->put(
        'code_verifier', $code_verifier = Str::random(128)
    );

    $codeChallenge = strtr(rtrim(
        base64_encode(hash('sha256', $code_verifier, true))
    , '='), '+/', '-_');

    $query = http_build_query([
        'client_id' => $request->input('client_id'),
        'redirect_uri' => 'http://127.0.0.1:8000/callback',
        'response_type' => 'code',
        'scope' => $request->input('scope'),
        'state' => $state,
        'code_challenge' => $codeChallenge,
        'code_challenge_method' => 'S256',
        'prompt' => 'login',
        // 'prompt' => '', // "none", "consent", or "login"
    ]);

    return redirect('http://wallserver.dyndns.info:86/oauth/authorize?'.$query);
})->name('redirect');

Route::get('/callback', function (Request $request) {
    $client_id = $request->session()->pull('client_id');
    $state = $request->session()->pull('state');

    $codeVerifier = $request->session()->pull('code_verifier');

    throw_unless(
        strlen($state) > 0 && $state === $request->state,
        InvalidArgumentException::class
    );

    $response = Http::asForm()->post('http://wallserver.dyndns.info:86/oauth/token', [
        'grant_type' => 'authorization_code',
        'client_id' => $client_id,
        'redirect_uri' => 'http://127.0.0.1:8000/callback',
        'code_verifier' => $codeVerifier,
        'code' => $request->code,
    ]);

    return $response->json();
});

Route::get('/clientcredentail',function(Request $request){
    $response = Http::asForm()->post('http://wallserver.dyndns.info:86/oauth/token', [
        'grant_type' => 'client_credentials',
        'client_id' => $request->input('client_id'),
        'client_secret' => $request->input('secret_key'),
        'scope' => $request->input('scope'),
    ]);
    return $response->json();
})->name('clientcredentail');

Route::get('/test',function(Request $request){
    $response = Http::withHeaders([
        'Accept' => 'application/json',
        'Authorization' => 'Bearer '.$request->input('access_token'),
    ])->get('http://wallserver.dyndns.info:86/api/products');

    return $response;
})->name('test');

Route::get('/products', [ProductController::class, 'index'])->name('products');
