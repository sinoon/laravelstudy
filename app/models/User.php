<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	/**
	 * 私人订制
	 */
	// protected $fillable = ['username','password'];


	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * 一个用户可以拥有多条信息
	 * @return [type] [description]
	 */
	public function message()
	{
		return $this->hasOne('Message','receive','username');    	
	}


	/**
	 * 一个用户拥有多条订单
	 * @return [type] [description]
	 * 需要配置一个user_id 
	 * ORM特定要求
	 */
	public function order()
	{
		return $this->hasMany('Order');      //
	}


	/**
	 * 一个用户拥有多个地址
	 * @return [type] [description]
	 * 需要配置一个user_id 
	 * ORM特定要求
	 */
	public function address()
	{
		return $this->hasMany('Address');
	}

	////////////////////////////////////////////////////////////////////////////
	///                                                                      ///
	///                                                                      ///
	///                                                                      ///
	///                                                                      ///
	///                                                                      ///
	///                                                                      ///
	///                                                                      ///
	///																		 ///
	////////////////////////////////////////////////////////////////////////////
	
	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	/**
	 * [is_right 验证这个密码是不是这个id的]
	 * @param  [type]  $id       [用户的ID]
	 * @param  [type]  $password [传进来的密码]
	 * @return boolean           [这个密码是不是这个ID的]
	 */
	public static function is_right($id,$password)
	{
		$user = User::find($id);
		if( !Hash::check($password, $user->password) )
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}

	/**
	 * [change_password 修改密码]
	 * @param  [type] $id       [用户的ID]
	 * @param  [type] $password [新的密码]
	 * @return [type]           [成功返回1，失败返回-1]
	 */
	public static function change_password($id,$password)
	{
		$user = User::find($id);
		// $user->password1 = Hash::make($password);
		$user->password = Hash::make($password);//无语啊。。老是忘记保存修改
		if($user->save())
		{
			//密码修改完成
			return 1;
		}
		else
		{
			//密码修改失败
			return 0;
		}
	}

}