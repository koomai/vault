<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Load config file
$app->configure('vault');

// Routes
$app->get('/', 'App\Http\Controllers\Controller@index');

$app->post('/', 'App\Http\Controllers\Controller@store');

$app->get('/{key}', 'App\Http\Controllers\Controller@show');

$app->get('/expired', function() {
    return view('expired');
});
