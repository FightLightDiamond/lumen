<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$app->get('/', function () use ($app) {
    echo phpinfo();
    return $app->version();
});

$app->post('/auth/login', 'AuthController@postLogin');

$app->group(['middleware' => 'auth:api'], function($app)
{
    $app->get('/test', function() {
        return response()->json([
            'message' => 'Hello World!',
        ]);
    });
});

$app->group(['prefix'=> 'app/v1'], function ($app){
    $app->get('/index', 'QuoteController@index');
} );

$app->get('memcached', function (){
    /*$memcache = new \Memcached;
    $memcache->connect('127.0.0.1', 11211);*/
    \Illuminate\Support\Facades\Cache::put("xx", "trte", 30);
    var_dump(\Illuminate\Support\Facades\Cache::get("xx"));
});