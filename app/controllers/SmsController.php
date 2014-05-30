<?php

class SmsController extends \BaseController {

	function index()
	{
		return $this->send_confirm(121819,13666692179);
	}

	function send_confirm($value,$mobile)
	{
		$apikey = 'b641b950c5a6e12c4844e1c9ce341846';//应该放在开发设置里面，但是现在没有时间研究这个	
		$tpl_value = '#code#='.$value.'&#company#='.'信息学院-商楠-毕业设计';
		$this->tpl_send_sms($apikey,2,$tpl_value,$mobile);
		 // $data;
	}


	/**
	* url 为服务的url地址
	* query 为请求串
	*/
	function sock_post($url,$query){
		$info=parse_url($url);
		$fp=fsockopen($info["host"],80,$errno,$errstr,30);
		$head="POST ".$info['path']." HTTP/1.0\r\n";
		$head.="Host: ".$info['host']."\r\n";
		$head.="Referer: http://".$info['host'].$info['path']."\r\n";
		$head.="Content-type: application/x-www-form-urlencoded\r\n";
		$head.="Content-Length: ".strlen(trim($query))."\r\n";
		$head.="\r\n";
		$head.=trim($query);
		$write=fputs($fp,$head);
		$header = "";
		while ($str = trim(fgets($fp,4096))) {
			$header.=$str;
		}
		$data = "";
		while (!feof($fp)) {
			$data .= fgets($fp,4096);
		}
		return $data;
	}

	/**
	* 模板接口发短信
	* apikey 为云片分配的apikey
	* tpl_id 为模板id
	* tpl_value 为模板值
	* mobile 为接受短信的手机号
	*/
	function tpl_send_sms($apikey, $tpl_id, $tpl_value, $mobile){
		$url="http://yunpian.com/v1/sms/tpl_send.json";
		$encoded_tpl_value = urlencode("$tpl_value");
		$post_string="apikey=$apikey&tpl_id=$tpl_id&tpl_value=$encoded_tpl_value&mobile=$mobile";
		return $this->sock_post($url, $post_string);
	}

	/**
	* 普通接口发短信
	* apikey 为云片分配的apikey
	* text 为短信内容
	* mobile 为接受短信的手机号
	*/
	function send_sms($apikey, $text, $mobile){
		$url="http://yunpian.com/v1/sms/send.json";
		$post_string="apikey=$apikey&text=$text&mobile=$mobile";
		return sock_post($url, $post_string);
	}
	                            

}