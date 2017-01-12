<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('authors', function(Blueprint $table) {
            $table->increments('id');
            $table->string('alias_name');
            $table->string('latin_alias_name');
            $table->string('real_name')->nullable();
            $table->string('latin_real_name')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->text('information')->nullable();
            $table->string('image')->nullable();
            $table->string('is_active')->default(0);
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
		Schema::drop('authors');
	}

}
