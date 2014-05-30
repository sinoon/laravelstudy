<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('username');
			$table->string('sex',2);
			$table->string('mobile');
			$table->string('mobile_status');
			$table->date('birthday');
			$table->string('email');
			$table->string('email_status');
			$table->string('status');
			$table->string('district');//存放用户所在地区
			$table->string('addressid');	//用户的地址ID，方便去数据库地址表里面查找用户曾经使用过的地址
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
		Schema::drop('customers');
	}

}
