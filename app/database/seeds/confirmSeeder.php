<?php

class confirmSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('confirm_emails')->insert([
			[ 'username' => '111111' , 'confirm_code' => str_random(12) ],
			[ 'username' => '222222' , 'confirm_code' => str_random(12) ],
			[ 'username' => '333333' , 'confirm_code' => str_random(12) ],
			[ 'username' => '444444' , 'confirm_code' => str_random(12) ],
			[ 'username' => '555555' , 'confirm_code' => str_random(12) ],
			[ 'username' => '666666' , 'confirm_code' => str_random(12) ],
			[ 'username' => '777777' , 'confirm_code' => str_random(12) ],
			[ 'username' => '888888' , 'confirm_code' => str_random(12) ],
			[ 'username' => '999999' , 'confirm_code' => str_random(12) ]
			]);
	}

}