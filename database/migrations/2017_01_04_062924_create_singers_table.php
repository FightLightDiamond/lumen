<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSingersTable extends Migration
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
            $table->string('latin_alias_name');
            $table->string('real_name')->nullable();
            $table->string('latin_real_name');
            $table->string('identify', 8)->unique();
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
