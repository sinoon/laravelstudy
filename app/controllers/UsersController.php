<?php

class UsersController extends \BaseController {


	public function login()
	{
		//1、先验证验证码
		$rules =  array(
			'captcha' => array('required', 'captcha')
			);
		$validator = Validator::make(Input::all(), $rules);
		// return $validator;
		if ($validator->fails())
		{
		    return Redirect::back()->withInput()->withErrors($validator->messages());  //just for test Captcha
		}	
		//2、再验证账号密码是否正确
		
		$attempt = Input::only('username','password');
		$remeber = Input::get('remeber');
		$attempt = Auth::attempt($attempt,$remeber);
		if($attempt)
		{
			//用户名和密码正确，判断role
			$info = Auth::user();
			if($info->role == 1) //说明是顾客
			{
				return Redirect::to('/');
			}
			else
			{
				return Redirect::to('restaurant/index'); //如果是餐厅管理就进入自己的管理页面
			}
		}
		else
		{
			return Redirect::intended('/')->with('error','用户名或密码错误');
		}

	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		//计算菜品，要计算菜品销量，我需要一个 订单表 才可以进行计算
//		

		$info = Auth::user();

		if(Auth::check())
		{
			if($info->role == 1)
			{
				return View::make('users.index',compact('info'));
			}
			else if( $info->role == 2 )
			{
				$restaurant = Restaurant::where('username' , '=' , $info->username)->first();
				return View::make('restaurant.index' , compact('restaurant'));		//去
			} 
			else
			{
				return View::make('users.index',compact('info'));
			}
		}
		else
		{
			return View::make('users.index',compact('info'));
		}
	}

	/**
	 * 显示登录页面
	 *
	 * @return view
	 */
	public function create()
	{
		return View::make('user.login');
	}

	/**
	 * 接受简单登录页面提交的页面
	 * 接受类型 post
	 * @return json 
	 */
	public function simplylogin()
	{
		$attempt = Input::only('username','password');
		// return $attempt;
		$attempt = Auth::attempt($attempt);
		if($attempt)
		{
			return Response::json('1');
		}
		else
		{
			return Response::json('-1');
		}
	} 

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//login
		// test the Captcha
		$rules =  array(
			'username' => 'required|min:6|max:12',
			'password' => 'required|min:6|max:12',
			'captcha' => array('required', 'captcha')
			);
		$validator = Validator::make(Input::all(), $rules);
		// return $validator;
		if ($validator->fails())
		{
		    return Redirect::back()->withInput()->withErrors($validator->messages());  //just for test Captcha
		}	
		//if that is ok,go next check username and password
		$attempt = Input::only('username','password');
		$remeber = Input::get('remeber');
		$attempt = Auth::attempt($attempt,$remeber);
		if($attempt)
		{
			//用户名和密码正确，判断role
			$info = Auth::user();
			if($info->role == 1) //说明是顾客
			{
				return Redirect::to('/');
			}
			else
			{
				return Redirect::to('admin'); //如果是餐厅管理就进入自己的管理页面
			}
		}
		else
		{
			return Redirect::intended('/')->with('error','用户名或密码错误');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		//
		Auth::logout();
		$temp = null;
		return Redirect::to('/')->with('info',$temp);
	}

	/**
	 * [profile 这个函数承载了太多太多。。。。]
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function profile($username)
	{
		if($username == Auth::user()->username)   //是自己的，进去查看
		{
			$user = Auth::user();  //读取出来用户的信息
			$customer = Customer::where('username' , '=' , $user->username)->first();
			$message = Message::where('receive' , '=' , $user->username)->get();  //取得所有$user->username的信息
			$event = Eve::all();   //events是laravel本身有的，作为事件来侦听使用
			$message_sent = Message::where('sent' ,'=' , $user->username)->get();  //取得所有发送给别人的信息

			//获取订单
			$order = Order_address_view::where('userid',$user->id)->get();//得到的是一个订单的集合

			//下面获取订单详情

			foreach ($order as $key => $orders) {
				$fullorder[$key] = Fullorderview::where('orderid',$orders->oid)->get()->toArray();//得到的还是一个集合，一个订单对应的订单详情的集合
			}
			// $fullorder = Fullorderview::where('orderid',$order->oid)->get();
			// return $fullorder;
			// return count($fullorder[0]);
			// dd($fullorder);
			// return $fullorder;

			//这样的话，数据的获取就完成了，在这里已经假设了在order表里面有总金额

			//获取该用户的评论
			//刚刚修改了GetAllComment函数，现在取得的都是写过评论的数据
			$comment = CustomerComment::GetAllComment($user->id);//绝对是历史性的时刻！！！我竟然把数据处理的部分放在了它应该在的地方！！！洒家这辈子值了。。。
			
			//手机验证码的事情
			$confirm_mobile = Confirmmobile::where('username',$user->username)->first();

			return View::make('users.profile',compact('user','event','message','message_sent','customer','order','fullorder','comment','confirm_mobile'));
		}
		else   //不是自己的，返回首页
		{
			$temp = null;
			return Redirect::to('/')->with('user',$temp);
		}
	}

	/**
	 * [changeinfo 修改个人信息]
	 * post方式
	 * @return [type] [description]
	 */
	public function changeinfo()
	{
			//如果修改的是自己的内容
			$data = Input::all();//先取得所有的数据，这里只有3个数据，mobile,birthday,sex
			// return $data['sex'];
			//我要看一下sex是什么格式的数据
			//恩，是男，女
			$rules = array(
				'mobile' => 'alpha_num|size:11',//不能修改成别人的对吧，而且要是数字对吧，而且有位数限制
				'email' => 'email'//邮箱还是很好验证的啦
				 //妈呀，日期验证这么麻烦。。。估计还要调试几次。。算了吧。。
				);
			$validator = Validator::make(Input::all(), $rules);

			if ($validator->fails())
			{
			    return $validator->messages();  //直接返回错误信息就可以了
			}

			//还要单独验证一下手机号
			

			//如果验证通过了 ， 开始保存数据
			if( ($mobile = Customer::where("mobile",$data['mobile'])->where("username",'!=',Auth::user()->username)->first()) 
				|| $email = Customer::where("email",$data['email'])->where("username",'!=',Auth::user()->username)->first() )
			{
				//如果找到了
				//那么，不好意思，你不能把自己的手机号，修改成别人的
				//当然了，邮箱也不能改成别人的。
				return '不好意思，你不能把自己的手机号，修改成别人的';
			}
			$customer = Customer::where("username",Auth::user()->username)->first();//拿到这个顾客的数据模型
			if( $customer->mobile != $data['mobile'] )
			{
				$customer->mobile = $data['mobile'];
				$customer->mobile_status = 0;
			}
			
			$customer->birthday = $data['birthday'];
			if($data['sex'] == 1) 
			{
				$customer->sex = '男';
			}
			else if( $data['sex'] == 2 )
			{
				$customer->sex = '女';
			}
			else
			{
				$customer->sex = '未选择';
			}

			if( $customer->email != $data['email'] ) //如果修改了这东西，那么就重置验证情况
			{
				$customer->email = $data['email'];
				$customer->email_status = 0;
			}
			//都写好了之后，就保存
			$customer->save();
			//保存之后，再返回成功
			return 1;//告诉前台，信息修改成功
	}

	/**
	* [changepassword 修改个人密码]
	* post方式
	* @return [type] [文字返回值给页面的js代码]
	*/
	public function changepassword()
	{
		$data = Input::all();
		$id = Auth::user()->id;//准备数据
		$old_password = User::is_right($id,$data['old_password']);
		//要先验证之前的密码是不是对的，这样的话，最好写的model吧，给两个参数，一个是现在用户id，一个是提交过来的密码
		if(  $old_password == 0 )
		{
			//如果密码不匹配
			//返回错误信息
			return "旧密码不匹配";
		}
			//如果旧密码是对的话，那么就要验证新的密码是否符合标准
		$rules = [
			'password' => 'min:6|max:16'//新密码的标准，和注册的时候一样
		];
		//规则写好了，开始验证
		$validator = Validator::make(Input::all(), $rules);
		if( $validator->fails() )
		{	
			//如果验证失败的话
			return "新密码不符合标准，新密码最小6位，最多16位";
		}
		//旧密码是对的，新密码也很符合标准的情况下，那么，Let's go!
		//替换掉旧的密码
		$result = User::change_password($id,$data['password']);
		if( User::change_password($id,$data['password']) )
		{
			//如果修改密码成功，返回
			return "密码修改成功！将在下次登录时生效！";
		}
		return "密码修改失败！请重新尝试";
	}
	/**
	 * [deleteMsg 删除信息]
	 * post方式
	 * @return [type] [description]
	 */
	public function deleteMsg()
	{
		$info = Auth::user();
		$input = Input::all();
		foreach ($input['delete'] as $value) {
			if(!$temp = Message::findOrFail($value))
			{
				return Response::json('-1');
			}
			if($temp->receive == $info->username)
			{
				Message::destroy($value);
			}
			else
			{
				return Response::json('-1');
			}
		} 
		return Response::json('1');
	}


}