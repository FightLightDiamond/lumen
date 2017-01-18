<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerDetailsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner_details', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('banner_id')->unsigned();
            $table->string('links', 256);
            $table->string('image');
            $table->tinyInteger('content');
            $table->tinyInteger('type');
            $table->tinyInteger('os');
            $table->tinyInteger('network');
            $table->tinyInteger('province');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
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
		Schema::drop('banner_details');
	}

}
