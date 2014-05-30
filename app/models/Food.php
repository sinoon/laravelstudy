<?php

class Food extends \Eloquent {
	protected $fillable = [];

	public function foodimg()
	{
		return $this->hasOne('Foodimg','foodimg');
	}

	public static function recommend($id)
	{
		//同类id
		$type = Food::where('id',$id)->first()->type;
		return Food::where('type',$type)->take(3)->get();
	}
}