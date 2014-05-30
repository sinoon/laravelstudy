<?php

class Eve extends \Eloquent {
	protected $fillable = [];

	protected $table = 'events';

	public static function ChangeEvent($event_id,$title,$content)
	{
		return Eve::where('id',$event_id)->update(array('title' => $title,'content' => $content));
	}

}