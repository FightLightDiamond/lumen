<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVtSingersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('singers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('alias_name');
            $table->string('real_name')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->text('information')->nullable();
            $table->boolean('is_active')->default(0);
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
		Schema::drop('singers');
	}

}
