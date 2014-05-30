<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * 交易记录表
		 * transactionID,foodID,dealnumber,addressID,status
		 */
		Schema::table('transaction', function(Blueprint $table)
		{
			//
			$table->increments('transactionID');
			$table->integer('foodID');
			$table->integer('dealnumber');
			$table->integer('addressID');
			$table->string('status');
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
		Schema::table('transaction', function(Blueprint $table)
		{
			//
			Schema::drop('transaction');
		});
	}

}