<?php

use Sms\Sms;

class RegisterController extends \BaseController {

	/**
	 * [__construct 构造函数]
	 * @param Sms $sms [发送短信类]
	 */
	public function __construct(Sms $sms) 
	{
		$this->sms = $sms;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('register.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//注册部分
		//验证输入的内容，以及唯一性
		// return Input::all();
		// return Input::all();
		// return date(Input::get('birthday'));
		$rules =  array(
			'username' => 'required|min:6|max:12|unique:users',		//已经判断过用户名是否重复
			'email'    => 'email|unique:customers',	//要在customers表里面是唯一
			'password' => 'required|min:6|max:16',				//|confirmed暂时去掉
			'mobile' => 'alpha_num|size:11|unique:customers',	//要在customers表里面是唯一
			'captcha' => array('required', 'captcha')
			);
		$validator = Validator::make(Input::all(), $rules);
		// return $validator;
		if ($validator->fails())
		{
		    return Redirect::back()->withInput()->withErrors($validator->messages());  //just for test Captcha
		}	
		
		//全都验证通过
		$user = new User; //只保存三个东西，username,passowrd,role
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->role = 1 ;
		//users表信息保存完毕
		
		//开始保存customers表里面的信息
		$customer = new Customer; 
		$customer->username = Input::get('username');
		$customer->email = Input::get('email');
		$customer->mobile = Input::get('mobile');
		//邮箱验证状态和手机号验证状态
		$customer->mobile_status = 0;	//未验证为0，验证成功为1
		$customer->email_status = 0 ;	//未验证为0，验证成功为1
		//
		$customer->status = 1;	//会员注册的账户默认是激活的
		//地区
		if(Input::get('district') == 1)
		{
			$customer->district = "下沙";
		}
		else
		{
			$customer->district = "其他";
		}
		//性别
		if(Input::get('male') == 1)
		{
			$customer->sex = "男";
		}
		else
		{
			$customer->sex = "女";
		}
		//生日
		$customer->birthday = date(Input::get('birthday'));
		
		//信息录入完毕
		//开始存入数据库

		if($customer->save() && $user->save() )  // 如果往customers和users表里面都存入成功，就给该顾客发送站内欢迎信，和欢迎email
		{
			$this->welcome($user->username);        //发送站内欢迎信

			$temp = new ConfirmEmail;		//建立一个email确认信类
			$temp->username = $user->username;
			//判断验证码的唯一性
			do {
				$temp->confirm_code = str_random(12);			//邮箱的验证码
			} while ( ConfirmEmail::where( 'confirm_code' , '=' , $temp->confirm_code)->first());	//如果在邮箱验证表中没有找到此次生成的随机验证码，那么这个验证码就可以使用，自动会跳出循环，如果找到了，说明已经存在一个邮箱验证码，必须再生成一个新的邮箱验证码，结果就会是ture，那么循环还会继续
			
			$temp->save();//终于生成了唯一的验证码，那么就保存起来
			// return $temp2;
			$this->email_confirm($temp->username,$customer->email,$temp->confirm_code);			//注册成功之后发送 欢迎邮件和验证邮件

			//注册成功也是不会发送欢迎短信的。

			Auth::login($user);						//注册成功之后，记录登录信息
			return Redirect::action('UsersController@index');    //调用UsersController的index~
		}
		return "注册失败";
		// return Redirect::back()->withInput()->withErrors('');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	/**
	 * 欢迎信息
	 * @param  [type] $username [用户名]
	 * @return [type]           [是否成功]
	 */
	public function welcome($username)
	{
		$message = new Message;
		$message->sent = '饿了吧快捷订餐运营工作组';
		$message->receive = $username;
		$message->title = '欢迎你加入到饿了吧快捷订餐的大家庭中来！';
		$message->content = '当然了，这里还仅仅是我一个试验品，作为毕业设计的展示品，还没有开始商业化运作，一个学习Laravel这个PHP框架的试验品<br>此信息自动发送，请勿回复（其实也不可以回复）';
		$message->status = 0;
		
		  $message->save();
	}

	public function email_confirm($name,$email,$confirm_code)
	{		
		// dd($email);
		$data = [ 'name' => $name , 'confirm_code' => $confirm_code ];
		Mail::send('emails.welcome',$data,function($message) use ($email)		//要想往进传email地址，必须用这种方法才可以
		{
			$message->to($email)->subject('欢迎来到我的毕业设计~');
		});
	}
	/**
	 * 收到验证邮件的  地址  请求  进行判断
	 * @param  [type] $random [请求的随机验证码]
	 * @return [type]         [description]
	 */
	public function confirmemail($random)
	{
		$temp = ConfirmEmail::where('confirm_code',$random)->first();
		if( !is_null($temp) )
		{
			$user = User::where('username','=',$temp->username)->first();
			if($user->role == 1)
			{
				$customer = Customer::where('username' , '=' ,$user->username);
				$customer->email_status = 1;//修改customer对应的email_status的值为1，修改为已注册模式
				return Redirect::to('/abcd');
			}
			else
			{
				$restaurant = Restaurant::where('username' , '=' , $user->username);
				$restaurant->email_status = 1; //修改restaurant对应的值为1，改为已验证
				return Redirect::to('/admin');
			}
			$temp->delete(); //删除confirm_email表里面对应的数据
			return Redirect::to('/abcd');
		}
		else //如果这个验证码没有找到直接进入主页
		{
			return Redirect::to('/');
		}
	}

	/**
	 * [confirm_email 验证邮箱，会根据被验证着的身份自动发送邮箱]
	 * @return [type] [description]
	 */
	public function confirm_email()
	{
		$user = Auth::user();
		if($user->role == 1)
		{
			$customer = Customer::where('username' , '=' , $user->username)->first();
			$confirm = ConfirmEmail::where('username' , '=' , $customer->username)->first();
			$code = $confirm->confirm_code;
			$data = [ 'name' => $customer->username , 'confirm_code' => $code];
			Mail::send('emails.welcome',$data,function($message) use ($customer)		//要想往进传email地址，必须用这种方法才可以
			{
				$message->to($customer->email)->subject('欢迎来到我的毕业设计~这是一封验证邮箱的邮件');
			});
			return 1;
		}
		else //$user->role ==2
		{
			$restaurant = Restaurant::where('username' , '=' , $user->username);
			$confirm = ConfirmEmail::where('username' , '=' ,$restaurant->username);
			$code = $confirm->confirm_code;
			$data = [ 'name' => $restaurant->username , 'confirm_code' => $code];
			Mail::send('emails.welcome' , $data , function($message) use ($restaurant)
			{
				$message->to($restaurant->email)->subject('欢迎来到我的毕业设计~这是一封验证邮箱的邮件');
			});
			return 1;
		}
	}

	/**
	 * 餐厅注册，从后台页面注册
	 */
	public function restaurant_register()
	{
		$info = Input::all();
		//餐厅注册判断一下输入的内容是否符合要求
		$rules =  array(
			'username' => 'required|min:6|max:12|unique:users',		//已经判断过用户名是否重复
			'email'    => 'required|email|unique:restaurants',
			'password' => 'required|min:6|max:12|confirmed',				//|confirmed暂时去掉
			'mobile' => 'alpha_num|size:11|unique:restaurants',	//手机
			'phone' => 'alpha_num|size:8|unique:restaurants',	//座机
			'aggrement' => 'accepted', //验证用户是否勾选了接受用户协议，accepted只接受值为1，yes,on，三个
			'captcha' => array('captcha')			//验证码
			);
		$validator = Validator::make(Input::all(), $rules);
		// return $validator;
		
		if ($validator->fails())
		{
		    // return Redirect::back()->withInput()->withErrors($validator->messages());  //just for test Captcha
		    return $validator->messages();  //just for test Captcha
		}	
		//验证通过
		
		////////////////////////////////////////////////
		//    先做一下 address字段的写入              //
		////////////////////////////////////////////////
		$address = new Address;
		$address->username = Input::get('username');
		$address->save();
		//
		$user = new User;
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->role = 2;//2为餐厅身份

		$restaurant = new Restaurant; //新建一个Restaurant对象
		$restaurant->username = Input::get('username');
		$restaurant->email = Input::get('email');
		$restaurant->email_status = 0;
		$restaurant->restaurantname = Input::get('restaurantname');
		$restaurant->demand = Input::get('demand');
		$restaurant->typeofdemand = Input::get('typeofdemand');
		$restaurant->demandfornum = Input::get('demandfornum');
		$restaurant->demandformoney = Input::get('demandformoney');
		$restaurant->mobile = Input::get('mobile');
		$restaurant->mobile_status = 0;
		$restaurant->phone = Input::get('phone');
		$restaurant->status = 0;//餐厅不在营业状态
		// $restaurant = [
		// 	'username' 		  => Input::get('username'),
		// 	'email' 		  => Input::get('email'),
		// 	'email_status'    => '0',
		// 	'restaurantname'  => Input::get('restaurantname'),
		// 	'demand' 		  => Input::get('demand'),				//餐厅是否有起送要求
		// 	'typeofdemand' 	  => Input::get('typeofdemand'),		//起送要求的类型
		// 	'demandfornum' 	  => Input::get('demandfornum'),		//要求是几份起送
		// 	'demandformoney'  => Input::get('demandformoney'),		//要求是多少钱起送
		// 	'mobile'		  => Input::get('mobile'),
		// 	'mobile_status'   => '0',
		// 	'phone'			  => Input::get('phone')
		// ];
		//不确定可不可以这样赋值！！注意测试

		if($restaurant->save() && $user->save() )
		{
			// $this->welcome($register->username);        //餐厅界面的站内信暂时没有定！

			//邮箱验证模式和customer一样
			$temp = new ConfirmEmail;
			$temp->username = $user->username;
			do {
				$temp->confirm_code = str_random(12);			//邮箱的验证码，这里其实还要验证一下生成的验证码是否被使用过了，不过现在还是先算了吧
			} while ( ConfirmEmail::where('confirm_code' , '=' , $temp->confirm_code)->first());
			$temp->save();

			$this->email_confirm($temp->username,$restaurant->email,$temp->confirm_code);			//注册成功之后发送 欢迎邮件和验证邮件

			Auth::login($user);						//注册成功之后，记录登录信息
			return 1;
			// return Redirect::action('RestaurantController@index');    
		}
		else
		{
			return -1;
		}
	}

	/**
	 * 从前台页面注册
	 * @return [type] [description]
	 */
	public function restaurant()
	{
		$info = Input::all();
		//餐厅注册判断一下输入的内容是否符合要求
		$rules =  array(
			'username' => 'required|min:6|max:12|unique:users',		//已经判断过用户名是否重复
			'email'    => 'required|email|unique:restaurants',
			'password' => 'required|min:6|max:12|confirmed',				//|confirmed暂时去掉
			'mobile' => 'alpha_num|size:11|unique:restaurants',	//手机
			'phone' => 'alpha_num|size:8|unique:restaurants',	//座机
			'aggrement' => 'accepted', //验证用户是否勾选了接受用户协议，accepted只接受值为1，yes,on，三个
			'captcha' => array('captcha')			//验证码
			);
		$validator = Validator::make(Input::all(), $rules);
		// return $validator;
		
		if ($validator->fails())
		{
		    return Redirect::back()->withInput()->withErrors($validator->messages());  //just for test Captcha
		    // return $validator->messages();  //just for test Captcha
		}	
		//验证通过
		

		////////////////////////////////////////////////
		//    先做一下 address字段的写入              //
		////////////////////////////////////////////////
		$address = new Address;
		$address->username = Input::get('username');
		$address->save();
		

		//
		$user = new User;
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->role = 2;//2为餐厅身份

		$restaurant = new Restaurant; //新建一个Restaurant对象
		$restaurant->username = Input::get('username');
		$restaurant->email = Input::get('email');
		$restaurant->email_status = 0;
		$restaurant->restaurantname = Input::get('restaurantname');
		$restaurant->demand = Input::get('demand');
		$restaurant->typeofdemand = Input::get('typeofdemand');
		$restaurant->demandfornum = Input::get('demandfornum');
		$restaurant->demandformoney = Input::get('demandformoney');
		$restaurant->mobile = Input::get('mobile');
		$restaurant->mobile_status = 0;
		$restaurant->phone = Input::get('phone');
		$restaurant->status = 0;//餐厅不在营业状态
		// $restaurant = [
		// 	'username' 		  => Input::get('username'),
		// 	'email' 		  => Input::get('email'),
		// 	'email_status'    => '0',
		// 	'restaurantname'  => Input::get('restaurantname'),
		// 	'demand' 		  => Input::get('demand'),				//餐厅是否有起送要求
		// 	'typeofdemand' 	  => Input::get('typeofdemand'),		//起送要求的类型
		// 	'demandfornum' 	  => Input::get('demandfornum'),		//要求是几份起送
		// 	'demandformoney'  => Input::get('demandformoney'),		//要求是多少钱起送
		// 	'mobile'		  => Input::get('mobile'),
		// 	'mobile_status'   => '0',
		// 	'phone'			  => Input::get('phone')
		// ];
		//不确定可不可以这样赋值！！注意测试

		if($restaurant->save() && $user->save() )
		{
			// $this->welcome($register->username);        //餐厅界面的站内信暂时没有定！

			//邮箱验证模式和customer一样
			$temp = new ConfirmEmail;
			$temp->username = $user->username;
			do {
				$temp->confirm_code = str_random(12);			//邮箱的验证码，这里其实还要验证一下生成的验证码是否被使用过了，不过现在还是先算了吧
			} while ( ConfirmEmail::where('confirm_code' , '=' , $temp->confirm_code)->first());
			$temp->save();

			$this->email_confirm($temp->username,$restaurant->email,$temp->confirm_code);			//注册成功之后发送 欢迎邮件和验证邮件

			Auth::login($user);						//注册成功之后，记录登录信息
			return 1;
			// return Redirect::action('RestaurantController@index');    
		}
		else
		{
			return -1;
		}
	}

	/**
	 * [confirm_mobile 发送手机确认短信]
	 * post方式
	 * @return [type] [description]
	 */
	public function confirm_mobile()
	{
		$user = Auth::user();
		//回忆一下应该怎么做哦
		//先找到这个用户
		//先需要知道他的身份
		//根据身份role去查找
		if( $user->role == 1 )
		{
			//如果是顾客
			$customer = Customer::where('username',$user->username)->first();
			$mobile = $customer->mobile;
			return $this->help_confirm_mobile($user->username,$mobile);
		}
		else
		{
			//如果是餐厅
			$restaurant = Restaurant::where('username',$user->username)->first();
			$mobile = $restaurant->mobile;
			return $this->help_confirm_mobile($user->username,$mobile);
		}
	}

	/**
	 * [help_confirm_mobile 帮助验证手机号的函数]
	 * @param  [type] $username [用户名]
	 * @param  [type] $mobile   [手机号]
	 * @return [type]           [是否成功]
	 */
	public function help_confirm_mobile($username,$mobile)
	{
		$confirm_mobile = Confirmmobile::where("username",$username)->first();
		if( is_null( $confirm_mobile ) )
		{
			$confirm_mobile = new Confirmmobile;
			$confirm_mobile->username = $username;
			$confirm_mobile->confirm_code = rand(100000,999999);
			$confirm_mobile->send_times = 1;
			$confirm_mobile->save();
			$result = $this->sms->send_confirm($confirm_mobile->confirm_code,$mobile);
			$result = json_decode($result);
			if( ($result->msg) == 'OK' )
			{
				//发送成功
				$confirm_mobile->save();
				return '短信发送成功！';
			}
			else
			{
				return '短信发送失败！';
			}
		}
		else
		{
			//既然不是第一次发送，那么先要知道是第几次发送的
			if( $confirm_mobile->send_times > 5 )
			{
				//如果发送次数太多的话，那可不行
				return '发送次数过多！';
			}
			//
			//如果是已经发送过短信的人
			//那么就需要判断发送的时间了
			//同1个手机发相同内容，30秒内最多发送1次，5分钟内最多发送3次 
			
			//既然数据库里面有数据，说明之前发送过了
			//那么就要知道是多久之前发送的了，不光要比较两个时间的大小，还要比较两个时间相差多少长时间
			$now = strtotime(date('y-m-d h:i:s'));
			$time = strtotime($comfirm_mobile->updated_at);

			$minute = ceil(($now-$time)/60); //60s 取得相差的分钟
			//如果相差的分钟小于5分钟的话，那么就不发送，返回：5分钟只能发送一次
			//如果相差的时间大于5分钟的话，那么再发送

			if( $minute > 5 )
			{
				//可以发送
				$confirm_mobile->confirm_code = rand(100000,999999);//再次生成随机验证码
				$confirm_mobile->send_times += 1; //发送次数+1
				$result = $this->sms->send_confirm($confirm_mobile->confirm_code,$mobile); //调用sms类发送
				if( $result == 'OK' )
				{
								//发送成功
					$confirm_mobile->save();
					return '短信发送成功！';
				}
				else
				{
					return '短信发送失败！';
				}
			}
		}
	}

	public function check_confirm_code()
	{
		//先说一下思路吧
		//需要2个东西，一个是用户名，一个是验证码上
		$code = Input::get('confirm_code');
		$username = Auth::user()->username;
		$result = Confirmmobile::check_confirm_code($username,$code);
		if( $result )
		{
			//如果成功
			return help_updata_mobile_status($username);
		}
		else
		{
			//如果失败
			return "抱歉，手机号验证失败。";
		}
	}

	public function help_updata_mobile_status($username)
	{
		$user = User::where('username',$username)->first();
		if( $user->role == 1 )
		{
			//顾客
			$customer = Customer::where('username',$username)->first();
			$customer->mobile_status = 1;
			$customer->save();
			return  "恭喜您，手机号验证通过！";
		}
		else
		{
			$restaurant = Restaurant::where('username',$username)->first();
			$restaurant->mobile_status = 1;
			$customer->save();
			return "恭喜您，手机号验证通过！";
		}
	}
}