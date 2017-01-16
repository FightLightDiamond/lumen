<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferSetupDetailsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offer_setup_details', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('offer_setup_id')->unsigned();
            $table->tinyInteger('type');
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
		Schema::drop('offer_setup_details');
	}

}
