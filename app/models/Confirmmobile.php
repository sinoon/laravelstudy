<?php

class Confirmmobile extends \Eloquent {
	protected $fillable = ['username','confirm_code'];

	protected $table='confirm_mobiles';

	public static function check_confirm_code($username,$code)
	{
		$user = Confirmmobile::where('username',$username)->first();
		if( $user->confirm_code == $code )
		{
			//验证成功
			return 1;
		}
		else
		{
			return 0;
		}
	}
}