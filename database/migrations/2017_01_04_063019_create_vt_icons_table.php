<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVtIconsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vt_icons', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->string('background_image');
            $table->string('is_active');
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
		Schema::drop('vt_icons');
	}

}