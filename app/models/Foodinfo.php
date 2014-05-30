<?php

class Foodinfo extends \Eloquent {
	protected $fillable = [];
	
	public $timestamps = false;
	
	public static function ChangeInfo($food_id,$name,$value)
	{
		return Foodinfo::where('id',$food_id)->update(array($name => $value));
	}

}