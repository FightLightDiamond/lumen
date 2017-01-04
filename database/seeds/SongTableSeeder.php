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
        factory(\App\Entities\VtSong::class, 20)->create();
    }
}