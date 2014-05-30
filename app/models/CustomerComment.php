<?php

class CustomerComment extends \Eloquent {
	protected $fillable = [];

	protected $table = 'customer_comment';

	/**
	 * [GetAllComment 获取改用户的所有的给别人的评论]
	 * @param [type] $user_id [用户的id]
	 */
	public static function GetAllComment($user_id)
	{
		$comment = CustomerComment::where('user_id',$user_id)->where('status','=','1')->get();
		return $comment;
	}
}