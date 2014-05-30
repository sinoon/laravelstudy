<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFullorder extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fullorder', function(Blueprint $table) {
			$table->increments('id');
			$table->string('orderid');//order中的id
			$table->string('foodid');//菜品ID
			$table->string('num');//菜品数量
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
		Schema::drop('fullorder');
	}

}
