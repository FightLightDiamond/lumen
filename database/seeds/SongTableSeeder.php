<?php

/**
 * Created by PhpStorm.
 * User: cuong
 * Date: 1/4/17
 * Time: 9:05 PM
 */
class SongTableSeeder extends \Illuminate\Database\Seeder
{
    public function run(){
        factory(\App\Entities\Song::class, 200000)->create();
    }
}