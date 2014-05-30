<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTempOrder extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temp_order', function(Blueprint $table) {
			$table->increments('id');

			$table->string('orderid');
			$table->string('address');
			$table->string('restname');
			$table->string('money');
			$table->string('num');
			$table->string('status');

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
		Schema::drop('temp_order');
	}

}
