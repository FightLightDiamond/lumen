<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/29/17
 * Time: 2:59 PM
 */
class SingerTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        factory(\App\Entities\Singer::class, 50)->create();
    }
}