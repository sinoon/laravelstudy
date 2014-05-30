<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeOrders extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orders',function($table){
			$table->dropColumn('foodid');
			$table->dropColumn('foodname');
			$table->dropColumn('count');
			$table->dropColumn('restaurantname');

			$table->string('userid');
			$table->string('money');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('orders',function($table){
			$table->string('foodid');
			$table->string('foodname');
			$table->string('count');
			$table->string('restaurantname');

			$table->dropColumn('userid');
		});
	}

}
