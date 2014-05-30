<?php

class Address extends \Eloquent {
	protected $fillable = ['username','address'];//指定可以被集体赋值的列

	protected $table = 'addresss';
}