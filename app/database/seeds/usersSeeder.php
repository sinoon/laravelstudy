<?php

class usersSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
			[ 'username' => '111111' , 'password' => Hash::make('111111') ],
			[ 'username' => '222222' , 'password' => Hash::make('111111') ],
			[ 'username' => '333333' , 'password' => Hash::make('111111') ],
			[ 'username' => '444444' , 'password' => Hash::make('111111') ],
			[ 'username' => '555555' , 'password' => Hash::make('111111') ],
			[ 'username' => '666666' , 'password' => Hash::make('111111') ],
			[ 'username' => '777777' , 'password' => Hash::make('111111') ],
			[ 'username' => '888888' , 'password' => Hash::make('111111') ],
			[ 'username' => '999999' , 'password' => Hash::make('111111') ]
			]);
	}

}