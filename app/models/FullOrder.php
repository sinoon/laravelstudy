<?php

class FullOrder extends \Eloquent {
	protected $fillable = [];

	protected $table = 'fullorder';

	public static function IsNull($id)
	{
		$comment = FullOrder::where('id',$id)->first()->comment;
		if( is_null($comment) )
		{
			//如果是空的
			return 1;
		}
		else
		{
			return -1;
		}
	}

	public static function IsHasOrder($id,$userid)
	{
		$orderid = FullOrder::where('id',$id)->first()->orderid;
		$temp = Order::where('id',$orderid)->first()->userid;
		if( $temp == $userid )
		{
			//如果一样，那说明就是他了
			return 1;
		}
		else
		{
			return -1;
		}
	}
}