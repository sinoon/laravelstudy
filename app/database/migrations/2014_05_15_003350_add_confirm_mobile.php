<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddConfirmMobile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('confirm_mobiles', function(Blueprint $table) {
			$table->string('send_times');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('confirm_mobiles', function(Blueprint $table) {
			$table->dropColumn('send_times');
		});
	}

}
