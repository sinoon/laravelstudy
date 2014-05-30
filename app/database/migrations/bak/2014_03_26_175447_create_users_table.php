<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * 创建顾客表
		 * table customer
		 * userID,username,password,name,age,sex,mobile,phone,birthday,e-mail,addressID,date
		 */

		Schema::create('customer',function(Blueprint $table)
		{
			$table->increments('userID');
			$table->string('username',32);
			$table->string('password',60);
			$table->string('name',20);
			$table->string('age',5)->nullable();
			$table->string('sex',2)->nullable();
			$table->string('mobile',11)->nullable();
			$table->string('phone')->nullable();
			$table->date('birthday')->nullable();
			$table->string('e-mail');
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
		Schema::table('customer', function(Blueprint $table)
		{
			//
			Schema::drop('customer');
		});
	}

}