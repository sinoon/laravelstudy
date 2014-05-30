<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTempOrderFood extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temp_order_food', function(Blueprint $table) {
			$table->increments('id');

			//还是准备一下订单的ID好了
			$table->string('orderid');
			$table->string('food');//存放的是菜品的名字
			$table->string('price');
			$table->string('num');

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
		Schema::drop('temp_order_food');
	}

}
