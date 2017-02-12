<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferSetupsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offer_setups', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('phone_number')->unsigned();
            $table->string('imei');
            $table->boolean('net_news');
            $table->boolean('mocha');
            $table->boolean('keeng');
            $table->string('code', 16);
            $table->tinyInteger('status')->default(0);
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
		Schema::drop('offer_setups');
	}

}
