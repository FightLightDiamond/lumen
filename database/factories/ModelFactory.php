<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'file' => 'http://hot6.medias.keeng.vn/mp3/sata10/audio/2016/05/11/3adc387e86040d6f5e10f197e79613d87ef633f9.mp3',
        'email' => $faker->email,
    ];
});

$factory->define(\App\Entities\Song::class, function ($faker) {
    return [
        'name' => $faker->name,
        'file' => 'http://keengmp3obj.1d2173fe.viettel-cdn.vn/bucket-media-keeng/sata07/video/2017/01/06/hgPLtlVTKDcS1fejBD1E586eff02e1896.mp4',
        'identify' => str_random(8)
    ];
});

$factory->define(\App\Entities\Video::class, function ($faker) {
    return [
        'name' => $faker->name,
        'identify' => str_random(8)
    ];
});

$factory->define(\App\Entities\Album::class, function ($faker) {
    return [
        'name' => $faker->name,
        'identify' => str_random(8)
    ];
});

$factory->define(\App\Entities\Chart::class, function ($faker) {
    return [
        'item_id' => rand(1, 20),
        'type' => rand(1, 3),
        'area' => rand(1, 3),
        'week' => rand(1, 9),
        'rank' => rand(1, 10),
        'point' => rand(1, 100)
    ];
});

$factory->define(\App\Entities\OfferSetups::class, function ($faker) {
    return [
        'imei' => str_random(10),
        'phone_number' => rand(1111, 9999),
        'net_news' => rand(0,1),
        'mocha' => rand(0,1),
        'keeng' => rand(0,1),
        'code' => str_random(8),
        'status' => rand(0,1)
    ];
});