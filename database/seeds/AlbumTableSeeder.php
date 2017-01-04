<?php

/**
 * Created by PhpStorm.
 * User: cuong
 * Date: 1/4/17
 * Time: 9:06 PM
 */
class AlbumTableSeeder extends \Illuminate\Database\Seeder
{
    public function run(){
        factory(\App\Entities\VtAlbum::class, 20)->create();
    }
}