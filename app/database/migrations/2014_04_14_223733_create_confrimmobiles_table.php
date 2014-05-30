<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfrimmobilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('confirm_mobiles', function(Blueprint $table)
		{
			//
			$table->increments('id');	//
			$table->string('username');				//用户名
			$table->string('confrim_code');			//给个6位的数字密码好了
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
		Schema::table('confirmmobiles', function(Blueprint $table)
		{
			//
			Schema::drop('confirm_mobiles');
		});
	}

}
