<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVtSongsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vt_songs', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('file');
            $table->string('image');
            $table->text('lyric');
            $table->string('is_active');
            $table->string('is_download');
            $table->integer('listen_no');
            $table->integer('download_no');
            $table->integer('share_no');
            $table->string('singer_name');
            $table->mediumInteger('price');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vt_songs');
	}

}
