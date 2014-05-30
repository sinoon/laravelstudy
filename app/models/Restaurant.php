<?php

class Restaurant extends \Eloquent {
	protected $fillable = [];
	
	public static function ChangeInfo($rest_id,$name,$value)
	{
		//返回影响的行数
		return Restaurant::where('id',$rest_id)->Update(array($name => $value));
	}

}