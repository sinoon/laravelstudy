<?php

class ShortCart extends \Eloquent {
	protected $fillable = [];

	protected $table='shortcart';//使用的数据库表名 

	// static public  function GetUserShortCart($user)
	// {
	// 	return $this->where('userid',$user->id)->get();
	// }
}