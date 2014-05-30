<?php

class RestaurantController extends \BaseController {

	/**
	 * [gProfile 显示餐厅信息页面]
	 * @return [type] [description]
	 */
	public function gProfile()
	{
		$active = 'profile';
		$user = Auth::user();
		$restaurant = Restaurantprofile::where('username' , '=' , $user->username)->first();
		return View::make('restaurant.profile',compact('restaurant','active'));
	}

	/**
	 * [gFoodmanage 显示菜品管理页面]
	 * @return [type] [description]
	 */
	public function gFoodmanage()
	{
		$active = 'foodmanage';
		$user = Auth::user();
		$restaurant = Restaurant::where('username' , '=' , $user->username)->first();
		return View::make('restaurant.foodmanage' ,compact('restaurant','foodmanage','active'));
	}

	/**
	 * [gImg_upload 显示图片上传页面]
	 * @return [type] [description]
	 */
	public function gImg_upload()
	{
		$active = 'img-upload';
		$user = Auth::user();
		$restaurant = Restaurant::where('username' , '=' , $user->username)->first();
		return View::make('restaurant.dropzone' ,compact('restaurant','img-upload','active')); //这个页面，restaurant的内容并不多，只是有点用户信息需要穿进去
	}

	public function gIndex()
	{
		$active = 'dashboard';
		$user = Auth::user();

		//增加统计功能
		//首先要知道统计谁的东西
		//
		$restaurant = Restaurant::where('username' , '=' , $user->username)->first();

		$result = DB::select('select foodid,name,sum(num) as total,price,foodstatus from fullorderview where restaurantname = ? group by foodid' ,[$restaurant->restaurantname]);

		//时间 date('Y-m-d H:i:s',strtotime('-3 day'))
		$time = date('Y-m-d H:i:s',strtotime('-3 day'));
		$foods = Food::where('belongto',$user->username)->where('updated_at','>',$time)->where('status','Yes')->get();

		$comments = Comment::where('restname',$restaurant->restaurantname)->where('needcomment','!=','NULL')->take(5)->get();

		return View::make('restaurant.index',compact('restaurant','active','result','foods','comments'));
	}

	public function gFood()
	{
		$active = 'food';
		$user = Auth::user();
		$restaurant = Restaurant::where('username' , '=' , $user->username)->first();
		$food = Food::where('belongto','=',$user->username)->get();
		return View::make('restaurant.food' ,compact('restaurant','food','active') );
	}

	public function gComment()
	{
		$active = 'lookcomment';
		$user = Auth::user();
		$restaurant = Restaurant::where('username',$user->username)->first();

		$comments = Fullorderview::where('username',$user->username)->where('needcomment','!=','NULL')->get();

		return View::make('restaurant.comment')->with(compact('user','restaurant','comments','active'));
	}

	public function gAllOrder()
	{
		$active = 'allorder';
		$user = Auth::user();
		$restaurant = Restaurant::where('username',$user->username)->first();

		$order = Order_address_view::where('restname',$restaurant->restaurantname)->get();//得到的是一个订单的集合

		foreach ($order as $key => $orders) {
			$fullorder[$key] = Fullorderview::where('orderid',$orders->oid)->get()->toArray();//得到的还是一个集合，一个订单对应的订单详情的集合

		}

		return View::make('restaurant.order', compact('user','restaurant','allorder','active','order','fullorder'));
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}


	/**
	 * [restaurant_login 餐厅的登录]
	 * @return [type] [description]
	 */
	public function restaurant_login()
	{
		$rules = array(
			'username' => 'required',
			'password' => 'required',
			'captcha' => array( 'captcha')
		); //定义验证规则

		$validator = Validator::make(Input::all(), $rules);//进行验证

		if( $validator->fails() )
		{
			return $validator->messages(); //返回错误信息
		}

		$user = Input::only('username','password');
		$attempt = Auth::attempt($user,Input::get('remember'));

		if( $attempt )
		{
			return 1;
		}
		else
		{
			return -1; //返回错误信息
		}
	}


	public function restaurant_reset()
	{
		$email = Input::get('email');
		$username = Restaurant::where('email' , '='  , $email)->get('username');
		if($username)
		{
			if( !Reset::where('username' , '=' , $username) )
			{
				$reset = new Reset;
				$reset->username = $username;
				$reset->email = $email;
				do {
					$reset->code = str_random(12);
				} while ( Reset::where('reset_code' , '=' , $reset->code)->first() );
				// this->sendTo($reset->email,'密码重置信','emails.reset',$reset);
				return 1;
			}
			else
			{
				$reset = Reset::where('username' , '=' , $username)->first();
				// this->sendTo($reset->email,'密码重置信','emails.reset',$reset);
				return 2;//这个email地址确实存在，不过这个email地址的主人已经发送过重置密码信了，在reset中找到那条记录，然后直接提取出来，再次发送邮件
			}
		}
		else
		{
			return -1;
		}
	}

	public function delete_record()
	{
		if(Input::get('id') == 1)
		{
			return -1;
		}
		else
		{
			return 1;
		}
	}	

	/**
	 * [img_upload 餐厅图片上传]
	 * @return [type] [description]
	 */
	public function img_upload()
	{
		//1.check the folder whether or not exist
		//2.if that is exist,then go to the next step
		//3.if not exist,create the folder and go to the next step
		$user = Auth::user();
		if(Input::hasFile('file'))
		{
			if(is_dir("restaurant/".$user->username))
			{
				$file = Input::file('file');

				$ext = $file->guessClientExtension();
				$filename = $file->getClientOriginalName();
				// return $filename;
				$pictrue = md5(date('YmdHis').$filename).'.'.$ext;
				$file = Image::make(Input::file('file')->getRealPath())->resize(600, 600);
				$file->save(public_path().'/restaurant/'.$user->username.'/foodimg'.'/'.$pictrue);

				$food = Food::where('foodimg','=',$filename)->first();
				$food->savename = $pictrue;
				$food->save();

				return $filename;
			}
			else
			{
				mkdir("restaurant/".$user->username);
				$file = Input::file('file');
				$ext = $file->guessClientExtension();
				$filename = $file->getClientOriginalName();
				$pictrue = md5(date('YmdHis').$filename).'.'.$ext;
				$file->move(public_path().'/restaurant/'.$user->username.'/foodimg',$pictrue);

				$food = Food::where('foodimg','=',$filename)->first();
				$food->savename = $pictrue;
				$food->save();

				return $filename;
			}
			// mkdir("restaurant/testing",0700);

		}
	}


	/**
	 * 发送邮件
	 * @param  [type] $email   [description]
	 * @param  [type] $subject [description]
	 * @param  [type] $view    [description]
	 * @param  array  $data    [description]
	 * @return [type]          [description]
	 */
	public function sendTo($email, $subject, $view, $data = array())
	{
		Mail::queue($view, $data, function($message) use($email, $subject)
		{
			$message->to($email)
					->subject($subject);
		});
	}

	public function profile_change_left()
	{
		$user = Auth::user();
		$restaurant = Restaurant::where('username' , '=' , $user->username)->first();

		$restaurant->restaurantname = Input::get('restaurantname');
		$restaurant->describe = Input::get('describe');
		$restaurant->mobile = Input::get('mobile');
		$restaurant->moring = Input::get('moring');
		$restaurant->night = Input::get('night');
		$restaurant->phone = Input::get('phone');


		if($restaurant->save())
		{
			return 1;
		}
		else
		{
			return -1;
		}
	}

	public function profile_change_right()
	{
		$user = Auth::user();
		$restaurant = Restaurant::where('username','=',$user->username)->first();

		$restaurant->typeofdemand = Input::get('typeofdemand'); //起送要求的类型，0为没有要求，1为for数量
		$restaurant->demandfornum = Input::get('demandfornum');//for数量
		$restaurant->demandformoney = Input::get('demandformoney');//for 金额


		$address = Address::where('username', '=' ,$user->username )->first();
		$address->address = Input::get('address');//打入地址
		$address->save();//然后保存

		$restaurant->save();
		return 1;

	}

	public function get_foods()
	{
		// return Input::all();
		$search = Input::get('_search');
		$page = Input::get('page');
		$limit = Input::get('rows');//实际上每一页显示的限制的数量
		$sidx = Input::get('sidx');
		$sord = Input::get('sord');
		$user = Auth::user();
		$food = Food::where('belongto' , '=' ,$user->username)->get()->toJson();
		$count = Food::where('belongto' , '=' ,$user->username)->count();//属于这家餐厅的所有的food的数量
		// $food = Food::where('belongto' , '=' ,'linoon')->get();
		
		if ($count > 0) { 
		    $total_pages = ceil($count / $limit); 
		} else { 
		    $total_pages = 0; 
		} 

		$start = $limit * $page - $limit; 

		$username = Auth::user()->username;

		$result = Food::where('belongto',$username)->take($limit)->skip($start)->get()->toArray();

		$responce['page'] = $page; 
		$responce['total'] = $total_pages; 
		$responce['records'] = $count; 

		// return $result;
		foreach ($result as $key => $value) {
			$responce['gridModel'][$key] = $value; 
		}


		return $responce;
	}

	public function edit_food()
	{
		// return Input::all();

		$user = Auth::user();
		// $user = 'linoon';
		$id = Input::get('id');


		$oper = Input::get('oper');
		if( $oper == 'add' )
		{
			$food = new Food;
			$food->belongto = $user->username; //belongto username
			$food->name = Input::get('name');
			$food->note  =Input::get('note');
			$food->price = Input::get('price');
			$food->stock = Input::get('stock');
			$food->foodimg = Input::get('foodimg');
			//增加类型
			$type = Input::get('type');
			if( $type == 'GF' )
			{
				$food->type = '盖饭';
			}
			else
			{
				$food->type = '炒菜';
			}
			
			if( $food->save() )
			{
				return 1;
			}
			else
			{
				return -1;
			}
		}

		if( $oper == 'edit' )
		{

			$food = Food::where('id','=',$id)->first();
			// $food->belongto = $user->username;
			$food->name = Input::get('name');
			$food->note  =Input::get('note');
			$food->price = Input::get('price');
			$food->stock = Input::get('stock');
			$food->status = Input::get('status');
			$food->foodimg = Input::get('foodimg');
			//增加类型
			$type = Input::get('type');
			if( $type == 'GF' )
			{
				$food->type = '盖饭';
			}
			else
			{
				$food->type = '炒菜';
			}
			
			if( $food->save() )
			{
				return 1;
			}
			else
			{
				return -1;
			}
		}

		if( $oper == 'del' )
		{
			//先不进行验证
			//直接删除
			$food = Food::where('id','=',$id)->first();
			if($food->delete())
			{
				return 1;
			}
			else
			{
				return -1;
			}
		}
	}

	public function changestatus()
	{
		$user = Auth::user();
		$restaurant = Restaurant::where('username' ,'=',$user->username)->first();

		if( $restaurant->status == 0 )
		{
			$restaurant->status = 1;
			$restaurant->save();
			return 1;
		}
		else
		{
			$restaurant->status = 0;
			$restaurant->save();
			return -1;
		}
	}
}