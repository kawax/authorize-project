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

use Revolution\Authorize\Credentials;

Route::get('/', function () {

    //DefaultDriver
    if (Authorize::login()) {
        /**
         * @var \GuzzleHttp\Client $client
         */
        $client = Authorize::client();
        dump($client->get('https://github.com/'));
    }
});


Route::get('nico', function () {

    $credentials = [
        'mail'     => env('NICO_MAIL'),
        'password' => env('NICO_PASS'),
    ];

    if (Authorize::driver('niconico')->login($credentials)) {
        /**
         * @var \Goutte\Client $client
         */
        $client = Authorize::driver('niconico')->client();
        dump($client);
    } else {
        $client = Authorize::driver('niconico')->client();
        dump($client);
    }
});


Route::get('vc', function () {

    $credentials = new Credentials([
        'mail'     => env('VC_MAIL'),
        'password' => env('VC_PASS'),
    ]);

    if (Authorize::driver('value-commerce')->login($credentials)) {
        /**
         * @var \Goutte\Client $client
         */
        $client = Authorize::driver('value-commerce')->client();
        dump($client);
    } else {
        $client = Authorize::driver('value-commerce')->client();
        dump($client);
    }
});

Route::get('a8', function () {

    $credentials = new Credentials([
        'login'    => env('A8_LOGIN'),
        'password' => env('A8_PASS'),
    ]);

    if (Authorize::driver('a8net')->login($credentials)) {
        /**
         * @var \Goutte\Client $client
         */
        $client = Authorize::driver('a8net')->client();
        dump($client);
    } else {
        $client = Authorize::driver('a8net')->client();
        dump($client);
    }
});

Route::get('/custom', function () {

    //CustomDriver
    if (Authorize::driver('custom')->login()) {
        /**
         * @var \GuzzleHttp\Client $client
         */
        $client = Authorize::driver('custom')->client();
        dump($client->get('https://google.com/'));
    }
});

Route::get('/google-api', function () {

    $credentials = [
        'application_name' => '',
        'client_id'        => '',
        'client_secret'    => '',
        'redirect_uri'     => null,
        'scopes'           => [],
        'access_type'      => 'online',
        'approval_prompt'  => 'auto',
        'prompt'           => 'consent',
    ];

    if (Authorize::driver('google-api')->login($credentials)) {
        /**
         * @var \Google_Client $client
         */
        $client = Authorize::driver('google-api')->client();
        dump($client);
    }
});

