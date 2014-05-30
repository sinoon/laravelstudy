<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTalbe extends Migration {

	/**
	 * Run the migrations.
	 *restaurantID	餐厅ID
     *username		餐厅管理登录名
     *password		餐厅管理登陆密码
     *restaurantname	餐厅名称
     *addressID 		餐厅地址ID
     *mobile			餐厅手机
     *phone			餐厅座机
     *mapaddress		餐厅地图参数
	 * @return void
	 */
	public function up()
	{
		Schema::create('restaurants', function(Blueprint $table)
		{
			$table->increments('id');				//自增的ID
			$table->string('username');
			$table->string('email');				//餐厅的邮箱，邮箱验证，有信息好通知到餐厅
			$table->string('email_status');			//邮箱验证状态
			$table->string('restaurantname')->nullable();		//餐厅的名字
			$table->text('describe')->nullable();
			$table->string('moring')->nullable();
			$table->string('night')->nullable();

			$table->string('demand')->nullable();				//餐厅是否有起送要求
			$table->string('typeofdemand')->nullable();			//起送要求类型，0代表没有起送要求
			$table->string('demandfornum')->nullable();			//以份数为起送要求要求类型,里面的东西是 数量
			$table->string('demandformoney')->nullable();		//以消费数额为起送要求
			$table->string('addressid')->nullable();			//餐厅地址的ID，方便去数据库地址表里面查找餐厅的地址
			$table->string('mobile')->nullable();				//餐厅的移动电话
			$table->string('mobile_status');		//移动电话验证状态
			$table->string('phone')->nullable();				//餐厅的固定电话
			$table->string('status');				//餐厅是否营业
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
		Schema::drop('restaurants');
	}

}
