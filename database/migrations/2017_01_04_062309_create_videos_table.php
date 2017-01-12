<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVtVideosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('videos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('file');
            $table->string('image')->nullable();
            $table->string('singer_name');
            $table->mediumInteger('price')->default(0);
            $table->boolean('is_active')->default(0);
            $table->integer('is_download')->default(0);
            $table->integer('listen_no')->default(0);
            $table->integer('download_no')->default(0);
            $table->integer('share_no')->default(0);
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
		Schema::drop('videos');
	}

}
