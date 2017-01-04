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
        'email' => $faker->email,
    ];
});

$factory->define(\App\Entities\VtSong::class, function ($faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(\App\Entities\VtVideo::class, function ($faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(\App\Entities\VtAlbum::class, function ($faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(\App\Entities\VtChart::class, function ($faker) {
    return [
        'item_id' => rand(1, 20),
        'type' => rand(1, 3),
        'area' => rand(1, 3),
        'week' => rand(1, 9),
        'rank' => rand(1, 10),
        'point' => rand(1, 100)
    ];
});