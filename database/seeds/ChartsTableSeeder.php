<?php

/**
 * Created by PhpStorm.
 * User: cuong
 * Date: 1/4/17
 * Time: 9:06 PM
 */
class ChartsTableSeeder extends \Illuminate\Database\Seeder
{
    public function run(){
        factory(\App\Entities\Chart::class, 100)->create();
    }
}