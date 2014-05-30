<?php namespace Sms;

class Sms extends BaseSms {

	/**
	 * [subscribe 创建事件监听]
	 * @param  [type] $events [description]
	 * @return [type]         [description]
	 */
	public function subscribe($events)
	{
		$events->listen('user.register','Sms\Sms@send_confirm');
		$events->listen('user.reset','Sms\Sms@resetpassword');
		$events->listen('customer.informcustomer','Sms\Sms@informcustomer');
		$events->listen('restaurant.informrestaurant','Sms\Sms@informrestaurant');
		$events->listen('food.deliver','Sms\Sms@deliver_meals');
	}

	/**
	 * [$apikey 短信平台API]
	 * @var string
	 */
	protected $apikey = 'b641b950c5a6e12c4844e1c9ce341846';//应该放在开发设置里面，但是现在没有时间研究这个	

	/**
	 * [$appname 应用名字]
	 * @var string
	 */
	protected $appname = '网上订餐系统';

	/**
	 * [$signed 签名]
	 * @var string
	 */
	protected $signed = '浙江财经大学-信息学院-商楠-毕业设计';
	/**
	 * 发送手机验证短信
	 * @param  [6位验证码] $value  [验证码]
	 * @param  [11位手机号] $mobile [手机号]
	 * @return [type]         [description]
	 */
	


	public function send_confirm($value,$mobile)
	{
		$tpl_id = 2;//您的验证码是#code#。如非本人操作，请忽略本短信【#company#】
		$tpl_value = '#code#='.$value.'&#company#='.$this->signed;
		return $this->tpl_send_sms($this->apikey,$tpl_id,$tpl_value,$mobile);
		 // $data;
	}

	public function welcome($value,$mobile)
	{
		$tpl_id = 5;//使用2号模板:感谢您注册#app#，您的验证码是#code#【#company#】
		$tpl_value = '#app#='.$this->appname.'&#code#='.$value.'&#company#='.$this->signed;
		return $this->tpl_send_sms($this->apikey,$tpl_id,$tpl_value,$mobile);
		 // $data;
	}

	/**
	 * [resetpassword 重置密码短信]
	 * @param  [type] $value  [重置密码的验证码]
	 * @param  [type] $mobile [要求重置密码的人的手机号]
	 * @return [type]         [description]
	 */
	public function resetpassword($value,$mobile)
	{
		$tpl_id = 2;//使用2号模板：您的验证码是#code#。如非本人操作，请忽略本短信【#company#】
		$tpl_value = '#code#='.$value.'&#company#='.$this->signed;
		return $this->tpl_send_sms($this->apikey,$tpl_id,$tpl_value,$mobile);
	}

	/**
	 * [informcustomer 下单成功的确认短信]
	 * @param  [type] $orderid [订单ID]
	 * @param  [type] $money   [订单使用金额]
	 * @param  [type] $mobile  [顾客的手机号]
	 * @return [type]          [description]
	 */
	public function informcustomer($orderid,$money,$mobile)
	{
		$tpl_id = 349116;//使用自定义模板
		$tpl_value = '#orderid#='.$orderid.'&#money#='.$money.'&#company#='.$this->signed;
		return $this->tpl_send_sms($this->apikey,$tpl_id,$tpl_value,$mobile);
	}

	/**
	 * [informrestaurant 通知餐厅有人下单]
	 * @param  [type] $orderid [订单ID]
	 * @param  [type] $money   [订单金额]
	 * @param  [type] $address [送餐地址]
	 * @param  [type] $mobile  [点餐人的手机号]
	 * @return [type]          [description]
	 */
	public function informrestaurant($orderid,$money,$address,$mobile)
	{
		$tpl_id = 349159;//使用自定义模板
		$tpl_value = '#orderid#='.$orderid.'&#money#='.$money.'&#address#='.$address.'&#company#='.$this->signed;
		return $this->tpl_send_sms($this->apikey,$tpl_id,$tpl_value,$mobile);
	}

	/**
	 * [deliver_meals 配送通知]
	 * @param  [type] $time    [预计到达时间]
	 * @param  [type] $orderid [订单ID]
	 * @param  [type] $money   [订餐金额]
	 * @param  [type] $mobile  [顾客手机号]
	 * @return [type]          [description]
	 */
	public function deliver_meals($time,$orderid,$money,$mobile)
	{
		$tpl_id = 349205;//使用自定义模板
		$tpl_value = '#time#='.$time.'&#orderid#='.$orderid.'&#money#='.$money.'&#company#='.$this->signed;
		return $this->tpl_send_sms($this->apikey,$tpl_id,$tpl_value,$mobile);
	}
}