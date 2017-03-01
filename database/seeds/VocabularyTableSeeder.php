<?php

/**
 * Created by PhpStorm.
 * User: e
 * Date: 3/1/17
 * Time: 5:59 PM
 */
class VocabularyTableSeeder extends \Illuminate\Database\Seeder
{
    public function run() {
        factory(\App\Entities\Vocabulary::class, 100)->create();
    }
}