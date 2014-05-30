<?php

class eventsSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		DB::table('events')->insert([
			['title' => '零周年店庆','content' => '为了答谢广大用户的支持，本网站零周年店庆时，所有商品不要钱' , 'imgaddress' => 'http://cfi-sinergia.epfl.ch/files/content/sites/cfi-sinergia/files/WORKSHOPS/Workshop1.jpg']
			,
		['title' => '一周年店庆','content' => '为了答谢广大用户的支持，本网站零周年店庆时，所有商品不要钱' , 'imgaddress' => 'http://cfi-sinergia.epfl.ch/files/content/sites/cfi-sinergia/files/WORKSHOPS/Workshop1.jpg']
		,
['title' => '两周年店庆','content' => '为了答谢广大用户的支持，本网站零周年店庆时，所有商品不要钱' , 'imgaddress' => 'http://cfi-sinergia.epfl.ch/files/content/sites/cfi-sinergia/files/WORKSHOPS/Workshop1.jpg']
]);
	}

}