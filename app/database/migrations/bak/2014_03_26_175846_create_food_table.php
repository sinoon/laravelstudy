<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * 创建视频表
		 * foodID,name,belong(restaurantID),price,img,describe,taste,species,cuisine
		 */
		Schema::table('food', function(Blueprint $table)
		{
			//
			$table->increments('foodID');
			$table->string('name');
			$table->integer('belong'); 
			$table->integer('price');
			$table->string('img');
			$table->string('describe');
			$table->string('taste');
			$table->string('species');
			$table->string('cuisine');
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
		Schema::table('food', function(Blueprint $table)
		{
			//
			Schema::drop('food');
		});
	}

}