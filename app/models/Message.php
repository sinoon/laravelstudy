<?php

class Message extends \Eloquent {
	protected $fillable = [];

	public static function send($username,$title,$content)
	{
		$message = new Message;
		$message->sent = '快捷订餐运营工作组';
		$message->receive = $username;
		$message->title = $title;
		$message->content = $content;
		if($message->save())
		{
			return 1;
		}
		return -1;
	}

}