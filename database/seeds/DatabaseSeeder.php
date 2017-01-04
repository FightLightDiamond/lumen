<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SongTableSeeder::class);
        $this->call(VideoTableSeeder::class);
        $this->call(AlbumTableSeeder::class);
        $this->call(ChartsTableSeeder::class);
        //$this->call('UsersTableSeeder');
    }
}
