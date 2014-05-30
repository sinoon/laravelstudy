<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerComment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_comment', function(Blueprint $table) {
			$table->increments('id');
			$table->string('user_id');
			$table->string('for_restaurant');
			$table->string('for_food');
			$table->string('food_id');
			$table->string('restaurant_id');
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
		Schema::drop('customer_comment');
	}

}
