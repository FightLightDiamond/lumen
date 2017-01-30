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
    echo base_path();
    echo phpinfo();
    return $app->version();
});

$app->post('/auth/login', 'AuthController@postLogin');

$app->group(['middleware' => 'auth:api'], function ($app) {
    $app->get('/test', function () {
        return response()->json([
            'message' => 'Hello World!',
        ]);
    });
    $app->get('/logout', function () {
        \Tymon\JWTAuth\Facades\JWTAuth::invalidate(\Tymon\JWTAuth\Facades\JWTAuth::getToken());
    });
});

$app->get('/token', function () {
    $user = \App\User::first();
    return $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);
});

$app->get('/get-token', function () {
    return \Tymon\JWTAuth\Facades\JWTAuth::getToken();
});

$app->get('/user', function () {
    return $user = \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();
});

$app->group(['prefix' => 'app/v1', 'middleware' => 'cors'], function ($app) {

    $app->group(['prefix' => 'albums'], function ($app) {
        $app->get('/search-with-singer', 'AlbumController@searchWithSinger');
    });
    $app->group(['prefix' => 'charts'], function ($app) {
        $app->get('/list-week', 'ChartController@getListWeek');
        $app->get('/items-by-week-and-type/{week}/{type}', 'ChartController@getItemByWeekAndType');
        $app->get('/data', 'ChartController@getData');
        $app->get('', 'ChartController@create');
        $app->put('/{id}', 'ChartController@update');
        $app->get('actually', 'ChartController@getActually');
        $app->post('active', 'ChartController@setActive');
    });
    $app->group(['prefix' => 'singers'], function ($app) {
        $app->get('', 'SingerController@index');
        $app->post('', 'SingerController@store');
        $app->get('/:id', 'SingerController@index');
        $app->post('/:id', 'SingerController@index');
        $app->delete('/:id', 'SingerController@index');
    });
    $app->group(['prefix' => 'songs'], function ($app) {
        $app->get('/search-with-singer', 'SongController@searchWithSinger');
        $app->get('', 'SongController@index');
        $app->post('', 'SongController@store');
    });
    $app->group(['prefix' => 'videos'], function ($app) {
        $app->get('/search-with-singer', 'VideoController@searchWithSinger');
    });
    $app->group(['prefix' => 'offer-setup'], function ($app) {
        $app->post('/set-information', 'Tools\OfferSetupsController@setInformation');
    });
    $app->post('post-api', function (\Illuminate\Http\Request $request) {
        return response()->json($request->all()['key']);
    });
});

$app->get('memcached', function () {
    \Illuminate\Support\Facades\Cache::put("xx", "trte", 30);
    var_dump(\Illuminate\Support\Facades\Cache::get("xx"));
});

