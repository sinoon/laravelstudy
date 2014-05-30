<?php

class Foodimg extends \Eloquent {
	protected $fillable = [];

	public function food()
	{
		return $this->belongsTo('Food','filename');
	}
}