<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * 创建评论表
		 * commentID,foodID,content,rank,attitude,sanitary,speed,tasty
		 */
		Schema::table('comment', function(Blueprint $table)
		{
			//
			$table->increments('commentID');
			$table->integer('foodID');
			$talbe->string('content');
			$table->string('rank');
			$table->string('attitude');
			$table->string('sanitary');
			$table->string('speed');
			$talbe->string('tasty');
			$talbe->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comment', function(Blueprint $table)
		{
			//
			Schema::drop('comment');
		});
	}

}