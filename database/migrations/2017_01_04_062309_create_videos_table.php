<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
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
            $table->string('latin_name');
            $table->string('file');
            $table->string('identify', 8)->unique();
            $table->string('image')->nullable();
            $table->string('singer_name')->nullable();
            $table->mediumInteger('price')->default(0);
            $table->boolean('is_active')->default(0);
            $table->integer('is_download')->default(0);
            $table->integer('listen_no')->default(0);
            $table->integer('download_no')->default(0);
            $table->integer('share_no')->default(0);
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();
            $table->index('identify');
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
