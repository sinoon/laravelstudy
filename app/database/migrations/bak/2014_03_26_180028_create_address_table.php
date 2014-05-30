<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * 创建地址表
		 * addressID,userID,content
		 */
		Schema::table('address', function(Blueprint $table)
		{
			//
			$table->increments('addressID');
			$table->integer('userID');
			$table->string('content');
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
		Schema::table('address', function(Blueprint $table)
		{
			//
			Schema::drop('address');
		});
	}

}