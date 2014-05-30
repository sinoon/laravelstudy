<?php

class AdminController extends \BaseController {

	/**
	 * [AllCustomer 显示所有顾客信息页面]
	 * get方式
	 */
	public function AllCustomer()
	{
		$active = 'all-customer';//给js一个目标
		$customers = Customer::paginate(15);//按照分页取出所有的顾客数据
		//显示
		return View::make('admin.all-customer',compact('customers','active'));
	}

	/**
	 * [ControlCustomer 修改顾客信息页面]
	 * @param [type] $customerid [顾客ID]
	 */
	public function ControlCustomer($username)
	{
		//先个active
		$active = 'control-customer';
		//找到这个顾客的信息
		$customer = Customer::where('username',$username)->first();

		//显示出来
		return View::make('admin.control-customer',compact('customer','active'));
	}

	/**
	 * [changeinfo 处理前台post过来修改信息]
	 * @return [type] [description]
	 */
	public function changeinfo()
	{
		//取出所有post过来的信息
		$data = Input::all();
		//对信息进行处理，先不验证
		//验证准备放在model里面进行，在验证回来的信息信息中显示错误信息
		$message = Customer::UpdateInfo($data['username'],$data);

		return 1;
	}

	/**
	 * [AllRestaurant 显示所有餐厅页面]
	 */
	public function AllRestaurant()
	{
		//设置active
		$active = 'all-restaurant';


		//获取restaurant
		//每页显示15条记录
		$restaurants = Restaurant::paginate(15);

		return View::make('admin.all-restaurant',compact('restaurants','active'));
	}

	public function ControlRestaurant($username)
	{
		//设置active
		$active = 'control-restaurant';

		$restaurant = Restaurant::where('username',$username)->first();

		$rest_id = $restaurant->id;

		return View::make('admin.control-restaurant',compact('restaurant','active','rest_id'));
	}

	/**
	 * [ChangeRestaurantInfo js控件post过来修改的数据]
	 */
	public function ChangeRestaurantInfo()
	{
		//pk,餐厅的ID
		$data = Input::all();
		return Restaurant::ChangeInfo($data['pk'],$data['name'],$data['value']);
	}

	public function GetEvent()
	{
		$active = 'event';

		//取出十五条数据
		$events = Eve::paginate(15);

		return View::make('admin.event',compact('active','events'));
	}

	public function GetPutEvent()
	{
		$active = 'put-event';
		return View::make('admin.putevent',compact('active'));
	}

	public function PutEvent()
	{
		$data = Input::all();
		$event = new Eve;
		$event->title = $data['title'];
		$event->content = $data['content'];
		if($event->save())
		{
			Session::flash('success','添加网站活动成功');
			return 1;
		}
		else
		{
			return -1;
		}
	}

	public function GetMessage()
	{
		$active = 'message';
		return View::make('admin.message',compact('active'));
	}

	public function SendMessage()
	{
		$data = Input::all();
		return Message::send($data['username'],$data['title'],$data['content']);
	}

	public function ChangeEvent($event_id)
	{
		$active = 'change-event';

		$event = Eve::where('id',$event_id)->first();


		return View::make('admin.change-event',compact('active','event','event_id'));
	}

	public function GetLogin()
	{
		if( Auth::check() )
		{
			//如果本来就登录过了，那么只需要验证一下身份
			$user = Auth::user();
			$role = $user->role;
			if( $role == 3 )
			{
				return Redirect::to('admin/index');
			}
			if( $role == 2 )
			{
				return Redirect::to('restaurant/index');
			}
			if( $role == 1 )
			{
				return Redirect::to('profile/'.$user->username);
			}
		}
		return View::make('admin.login');
	}

	public function login()
	{
		// return Input::all();
		$data = Input::except('_taken','remember');
		if( Input::get('remember') == 'on' )
		{
			$remember = true;
		}
		else
		{
			$remember = false;
		}
		$attempt = Auth::attempt(array('username' => $data['username'],'password' => $data['password']), $remember);
		if( $attempt )
		{

			// $result  = DB::select('select foodid,name,sum(num) as total,price,foodstatus from fullorderview group by foodid');

			// //时间 date('Y-m-d H:i:s',strtotime('-3 day'))
			// $time = date('Y-m-d H:i:s',strtotime('-3 day'));

			// $foods = Food::where('updated_at','>',$time)->where('status','Yes')->take(10)->get();

			// $comments = Comment::where('needcomment','!=','NULL')->take(5)->get();

			// //登录成功
			// $active = 'dashboard';
			// return View::make('admin.index',compact('user','result','foods','comments','active'));
			return Redirect::to('admin/index');
		}
		return Redirect::back()->withInput()->with('flash_error','用户名或密码错误');
	}

	public function GetFood()
	{
		$active = 'food';
		$foods = Foodinfo::paginate(15);
		return View::make('admin.food',compact('active','foods'));
	}

	public function GetFoodById($id)
	{
		$active = 'control-food';
		$food = Food::where('id',$id)->first();

		return View::make('admin.foodinfo',compact('foodinfo','food','active'));
	}

	public function ControlFood()
	{
		$data = Input::all();
		return Foodinfo::ChangeInfo($data['pk'],$data['name'],$data['value']);
	}

	public function GetIndex()
	{
		$user = Auth::user();
		if( $user->role == 1 )
		{
			//如果是顾客，就请去首页
			return Redirect::to('/');
		}
		if( $user->role == 2 )
		{
			return Redirect::to('restaurant/index');
		}
		if( $user->role == 3 )
		{
			$result  = DB::select('select foodid,name,sum(num) as total,price,foodstatus from fullorderview group by foodid');

			//时间 date('Y-m-d H:i:s',strtotime('-3 day'))
			$time = date('Y-m-d H:i:s',strtotime('-3 day'));

			$foods = Food::where('updated_at','>',$time)->where('status','Yes')->take(10)->get();

			$active = 'dashboard';

			$comments = Comment::where('needcomment','!=','NULL')->take(5)->get();

			//先获取3天以内注册的新会员，以及一些会员信息
			//获取10个新会员。。
			$customers = Customer::where('created_at','>',$time)->take(10)->get();

			//获取3天以内加入的餐厅
			$restaurants = Restaurant::where('created_at','>',$time)->take(10)->get();

			return View::make('admin.index',
				compact('user',
					'result',
					'foods',
					'comments',
					'active',
					'customers',
					'restaurants'
					));
		}
	}

	public function postChangeEvent()
	{
		$event_id = Input::get('event_id');
		$title = Input::get('title');
		$content = Input::get('content');
		return Eve::ChangeEvent($event_id,$title,$content);
	}

	public function GetRoot()
	{
		if( Auth::check() )
		{
			//如果登录了
			//判断身份
			$role = Auth::user()->role;
			if( $role == 3 )
			{
				return Redirect::to('admin/index');
			}
			if( $role == 2 )
			{
				return Redirect::to('restaurant/index');
			}
			if( $role == 1 )
			{
				return Redirect::to('profile/'.Auth::user()->username);
			}
		}
		else
		{
			return Redirect::to('admin/login');
		}
	}

	public function CheckRole()
	{
		$user = Auth::user();
		$role = $user->role;
		if( $role == 3 )
		{
			return Redirect::to('admin/index');
		}
		if( $role == 2 )
		{
			return Redirect::to('restaurant/index');
		}
		if( $role == 1 )
		{
			return Redirect::to('profile/'.$user->username);
		}
	}

	public function AdControl()
	{
		if( Input::has('adimg') )
		{
			return Input::all();
			//如果有东西上传，那么就处理一下。
			$ad = Advertisement::where('id',1)->first();
			if( is_null($ad) )
			{
				//如果是空的，说明没有
				$ad = new Advertisement;
				$ad->link = Input::get('link');

				//图片处理
				$file = Input::file('img');

				$ext = $file->guessClientExtension();
				$filename = $file->getClientOriginalName();
				// return $filename;
				$pictrue = md5(date('YmdHis').$filename).'.'.$ext;
				$file = Image::make(Input::file('file')->getRealPath())->resize(129, 295);
				$file->save(public_path().'/advertisement/'.$pictrue);

				$ad->imgaddress = $pictrue;
				$ad->save();

				return Redirect::to('admin/check-ad');
			}
			else
			{
				$ad = Advertisement::find(1);
				$ad->link = Input::get('link');

				//图片处理
				$file = Input::get('adimg');

				$ext = $file->guessClientExtension();
				$filename = $file->getClientOriginalName();
				// return $filename;
				$pictrue = md5(date('YmdHis').$filename).'.'.$ext;
				$file = Image::make(Input::file('adimg')->getRealPath())->resize(129, 295);
				$file->save(public_path().'/advertisement/'.$pictrue);

				$ad->imgaddress = $pictrue;
				$ad->save();

				return Redirect::to('admin/check-ad');
			}
		}
		$active = 'control-ad';
		return View::make('admin.control-ad',compact('active'));
	}

	public function pAdControl()
	{
		// return Input::all();
		$ad = Advertisement::where('id',1)->first();
		if( is_null($ad) )
		{
			//如果是空的，说明没有
			$ad = new Advertisement;
			$ad->link = Input::get('link');

			//图片处理
			$file = Input::file('adimg');

			$ext = $file->guessClientExtension();
			$filename = $file->getClientOriginalName();
			// return $filename;
			$pictrue = md5(date('YmdHis').$filename).'.'.$ext;
			$file = Image::make(Input::file('adimg')->getRealPath())->resize(129, 295);
			$file->save(public_path().'/advertisement/'.$pictrue);

			$ad->imgaddress = $pictrue;
			$ad->save();

			return Redirect::to('admin/check-ad');
		}
		else
		{
			$ad = Advertisement::find(1);
			$ad->link = Input::get('link');

						//图片处理
			$file = Input::file('adimg');

			$ext = $file->guessClientExtension();
			$filename = $file->getClientOriginalName();
						// return $filename;
			$pictrue = md5(date('YmdHis').$filename).'.'.$ext;
			$file = Image::make(Input::file('file')->getRealPath())->resize(129, 295);
			$file->save(public_path().'/advertisement/'.$pictrue);

			$ad->imgaddress = $pictrue;
			$ad->save();

			return Redirect::to('admin/check-ad');
		}
	}

	public function CheckAd()
	{
		//给active
		$active = 'check-ad';
		//给img
		$ad = Advertisement::find(1);
		return View::make('admin.check-ad',compact('active','ad'));
	}

	public function DeleteEvent()
	{
		$event_id = Input::get('event_id');
		$result = Eve::find($event_id);

		if( $result->delete() )
		{
			Session::flash('success', '删除网站活动成功！');
			return 1;
		}
		else
		{
			return -1;
		}
	}

	/**
	 * [GetComment 显示 评论 页面]
	 */
	public function GetComment()
	{
		//显示10条评论
		$comments = Comment::paginate(10);

		$active = 'lookcomment';
		return View::make('admin.comment',compact('comments','active'));
	}
}