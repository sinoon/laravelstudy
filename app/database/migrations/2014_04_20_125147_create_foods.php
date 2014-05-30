<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFoods extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('foods', function(Blueprint $table) {
			$table->increments('id');
			$table->string('belongto'); //username
			$table->string('name');
			$table->string('price');
			$table->string('stock');
			$table->string('note');//菜品介绍
			$table->string('foodimg')->nullable();
			$table->string('status');
			$table->string('savename')->nullable();
			$table->string('type');
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
		Schema::drop('foods');
	}

}
