<?php namespace Sms;

abstract class BaseSms {

	/**
	 * [$apikey 短信平台API]
	 * @var [string]
	 */
	protected $apikey;

	/**
	 * [$tpl_value 给模板输入的值]
	 * @var [string]
	 */
	protected $tpl_value;

	/**
	 * [$tpl_id 使用模板ID]
	 * @var [int]
	 */
	protected $tpl_id;

	/**
	 * [$signed 短信末尾签名]
	 * @var [string]
	 */
	protected $signed;

	/**
	 * [$appname 应用名字]
	 * @var [string]
	 */
	protected $appname;

	/**
	* url 为服务的url地址
	* query 为请求串
	*/
	public function sock_post($url,$query){
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
	public function tpl_send_sms($apikey, $tpl_id, $tpl_value, $mobile){
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
	public function send_sms($apikey, $text, $mobile){
		$url="http://yunpian.com/v1/sms/send.json";
		$post_string="apikey=$apikey&text=$text&mobile=$mobile";
		return sock_post($url, $post_string);
	}
}

