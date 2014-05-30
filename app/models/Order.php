<?php

class Order extends \Eloquent {
	protected $fillable = [];

	/**
	 * [StartDelivery 开始配送，修改订单状态]
	 * @param [type] $orderid [订单ID]
	 * [return] [返回值是影响的行数]
	 */
	public static function StartDelivery($orderid)
	{
		return Order::where('id',$orderid)->update(array('status' => 2));
	}

	/**
	 * [GetCustomerMobile 获取指定订单ID 中 顾客的手机号]
	 * @param [type] $orderid [订单ID]
	 */
	public static function GetCustomerMobile($orderid)
	{
		$addressid = Order::where('id',$orderid)->first()->addressid;
		$username = Address::where('id',$addressid)->first()->username;
		return Customer::where('username',$username)->first()->mobile;
	}

	public static function GetMeal($orderid)
	{
		//修改了订单状态，返回影响的行数，只会有一行，因为id是唯一的。
		return Order::where('id',$orderid)->update(array('status' => 3));

	}
}