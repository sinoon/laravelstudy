<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * 创建餐厅表
		 * restaurantID,username,password,restaurantname,addressID,mobile,phone,mapaddress
		 */
		Schema::table('restaurant', function(Blueprint $table)
		{
			//
			$table->increments('restaurantID');
			$table->string('username',32);
			$table->string('password',60);
			$table->string('restaurantname',50);
			$table->string('addressID');
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
		Schema::table('restaurant', function(Blueprint $table)
		{
			//
			Schema::drop('restaurant');
		});
	}

}