<?php

class CustomerAddressView extends \Eloquent {
	protected $fillable = [];

	protected $table = 'customer_address';

	public static function GetCustomer($username)
	{
		$user = CustomerAddressView::where('username',$username)->get();
		return $user;
	}
}