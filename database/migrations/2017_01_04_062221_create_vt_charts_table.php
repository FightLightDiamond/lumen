<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVtChartsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vt_charts', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned()->nullable();
            $table->integer('week')->unsigned();;
            $table->tinyInteger('rank')->unsigned();;
            $table->integer('point')->unsigned();;
            $table->tinyInteger('area')->unsigned();;
            $table->tinyInteger('type')->unsigned();;
            $table->tinyInteger('is_active')->unsigned();;
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
		Schema::drop('vt_charts');
	}

}
