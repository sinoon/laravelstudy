<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * 
 *|/
 *|A example of Route~
 *|I could work as the same way~
 *|/books
 *|    /fiction
 *|    /science
 *|    /romance
 *|/magazines
 *|    /celebrity
 *|    /technology
 */

/**
 * 用户
 */
// Route::resource('/','UsersController');
Route::get('/', 'ShowController@index' );


/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////// //
//                                                         //
//                   会员登录                              //
//                                                         //
/////////////////////////////////////////////////////////////

//顾客登录
Route::get('customer_login', 'UsersController@index' );

/**
 * 好看的登录界面，在FF上似乎有问题
 */
Route::get('login', function()
{
	if( Auth::check() )
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
	return View::make('users.login');
});

//接受post过来的登录数据
Route::post('customer_login', 'UsersController@login');

/**
 * 简单登录页面
 */
Route::post('simplylogin', 'UsersController@simplylogin');

/**
 * 登出
 */
Route::get('logout', 'UsersController@destroy');

/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////// //
//                                                         //
//                   注册部分                              //
//                                                         //
/////////////////////////////////////////////////////////////

/**
 * 注册
 */
Route::resource('register', 'RegisterController');

/**
 * 会员注册
 */
Route::get('register', function()
{
    return View::make('register.test');
});



/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////// //
//                                                         //
//                   顾客模块                              //
//                                                         //
/////////////////////////////////////////////////////////////


Route::group(array('before' => 'customer'),function(){
	/**
	 * 查询用户信息
	 */
	Route::get('profile/{username}',array('before' => 'auth','uses' =>  'UsersController@profile'));

	Route::post('profile/changeinfo', array( 'before' => 'auth' , 'uses' => 'UsersController@changeinfo' ));

	Route::post('profile/changepassword', array('before' => 'auth' , 'uses' => 'UsersController@changepassword'));

	/**
	 * 会员删除信息
	 */
	Route::post('profile/usersDeleteMsg',array( 'as' => 'usersDeleteMsg','uses' => 'UsersController@deleteMsg' ));

	/**
	 * placeconfirmemail
	 */
	Route::post('/profile/placeconfirmemail', 'RegisterController@confirm_email');

	Route::post('/profile/confirm_mobile', 'RegisterController@confirm_mobile');

	Route::post('/profile/check_confirm_code', 'RegisterController@check_confirm_code');

	//post 收到外卖
	Route::post('/profile/getmeal','OrderController@GetMeal');
});



/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////// //
//                                                         //
//                   其他东西                              //
//                                                         //
/////////////////////////////////////////////////////////////

/**
 * 验证码
 */
Route::get('/captcha', function()
{
    return Captcha::create();
});








/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////// //
//                                                         //
//                   接受队列                              //
//                                                         //
/////////////////////////////////////////////////////////////
Route::post('queue/receive', function()
{
	Log::info('marshal!');
    return Queue::marshal();
});


/**
 * test for queue
 */
Route::get('testforqueue', function()
{
	Queue::push(function($job){
		File::append(app_path().'/test.md' , 'testcontent'.PHP_EOL);
		$job->delete();
	});
	return 'done';
});



/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////// //
//                                                         //
//                   验证邮箱                              //
//                                                         //
/////////////////////////////////////////////////////////////
Route::get('/email/confirm/{random}', 'RegisterController@confirmemail');

Route::get('/abcd', function()
{
	return  View::make('verify.verify-test');
});




//测试界面
Route::get('/111', function()
{
	$food = Food::where('belongto','=','linoon')->first();
	$foodimg = Foodimg::where('filename' , '=' , $food->foodimg)->first();
	
	foreach ($foodimg as  $value) {
		echo '211:'.$value;
	}
	// return $foodimg;
});



/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////// //
//                                                         //
//                   餐厅注册                              //
//                                                         //
/////////////////////////////////////////////////////////////
Route::get('register-for-restaurant', function()
{
	return View::make('register.restaurant');
});

Route::post('register-for-restaurant', 'RegisterController@restaurant');





/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////// //
//                                                         //
//                   餐厅模块                              //
//                                                         //
/////////////////////////////////////////////////////////////
Route::group(array('prefix' => 'restaurant') , function()
{
	Route::get('/',function(){
		//访问根目录
		//如果登录了，身份是餐厅，就跳转去餐厅，身份是顾客，就跳转到主页，身份是管理员就跳转到管理员页面
		//没有登录就显示登录页面
		if( Auth::check() )
		{
			//登录了
			$role = Auth::user()->role;
			if( $role == 3 )
			{
				//管理员
				return Redirect::to('admin/index');
			}
			else if( $role == 2 )
			{
				//餐厅
				return Redirect::to('restaurant/index');
			}
			else
			{
				return Redirect::to('/');
			}
		}
		else
		{
			//如果没有登录
			//就让他登录
			return Redirect::to('restaurant/login');
		}
	});

	Route::get('login', function()
	{
		return View::make('restaurant.login');
	});

	//餐厅的登录， 在后台管理界面
	Route::post('login', 'RestaurantController@restaurant_login');

	//餐厅的注册 ， 在后台管理界面
	Route::post('register', 'RegisterController@restaurant_register');

	//餐厅登录密码的重置路由，这里是放在了 RestaurantController 中，没有放在 RegisterController 中！
	Route::post('reset', 'RestaurantController@restaurant_reset');

	Route::group(array('before' => 'restaurant'),function()
	{
		Route::get('index', 'RestaurantController@gIndex');

		//后台 food 总揽页面
		Route::get('food', 'RestaurantController@gFood');

		//餐厅设置，的显示
		Route::get('profile', 'RestaurantController@gProfile');

		//修改餐厅设置
		Route::post('profile-change-left', 'RestaurantController@profile_change_left');
		Route::post('profile-change-right', 'RestaurantController@profile_change_right');

		//菜品管理
		Route::get('foodmanage', 'RestaurantController@gFoodmanage');

		//
		Route::get('img-upload', 'RestaurantController@gImg_upload');


		//获取所有菜品，jqGrid 获取~特别用
		Route::get('get-foods', 'RestaurantController@get_foods' );

		//增加或者删除菜品
		//food编辑
		Route::post('edit-record', 'RestaurantController@edit_food' );

		//jqGrid后台传送 图片数据 处理路由
		Route::post('img-upload', 'RestaurantController@img_upload');

		//餐厅上线，后台信息提交
		Route::post('changestatus', 'RestaurantController@changestatus');

		//餐厅评论查看
		Route::get('comment', 'RestaurantController@gComment' );

		//订单页面，全部订单
		Route::get('all-order', 'RestaurantController@gAllOrder' );

		//post 开始配送
		Route::post('delivery','OrderController@StartDelivery');
	});
});



///////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////// //
//                       food的展示									////
//////////////////////////////////////////////////////////////////// //
///////////////////////////////////////////////////////////////////////
// Route::get('food/{id}',  'FoodController@index' );
Route::get('food/{id}',  'ShowController@food' );

//food订餐////////////
Route::get('order/{foodid}/{num}', 'OrderController@order');




/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////// //
//                                                         //
//                   订单部分                              //
//                                                         //
/////////////////////////////////////////////////////////////

Route::group(array('before' => 'customer'),function(){
	//购物车的路由配置
	Route::post('food/addincart', 'CartController@addincart' );

	Route::get('cart', 'CartController@index'  );


	Route::post('order/deletefood', 'OrderController@deletefood');

	Route::post('order', 'OrderController@submitorder');

	Route::post('order/send_confirm', 'OrderController@send_confirm');

	Route::post('order/confirm_mobile', 'OrderController@confirm_mobile');

	Route::get('order/confirm_mobile', 'OrderController@gconfirm_mobile');

	Route::get('order/startorder', 'OrderController@gStartOrder');

	Route::post('order/startorder', 'OrderController@startorder');

	Route::get('order/startorderdone', function()
	{	
		$user = Auth::user();
		return View::make('order.startorderdone')->with(compact('user'));
	});
});


/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////// //
//                                                         //
//                   添加评论                              //
//                                                         //
/////////////////////////////////////////////////////////////

Route::get('food/comment/{fullorderid}','OrderController@OrderComment');

Route::post('food/comment/{fullorderid}','OrderController@PutComment');




/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////// //
//                                                         //
//                   管理员模块                            //
//                                                         //
/////////////////////////////////////////////////////////////


Route::group(array('prefix' => 'admin'),function(){

	Route::get('check-ad','AdminController@CheckAd');

	Route::get('control-ad','AdminController@AdControl');

	Route::post('control-ad','AdminController@pAdControl');

	//第一个主页
	Route::get('/','AdminController@GetRoot');

	//显示登录页面
	Route::get('login','AdminController@GetLogin');

	//post接受处理登录信息
	Route::post('login','AdminController@login');

	Route::group(array('before' => 'admin'),function(){
		//显示所有顾客信息
		Route::get('all-customer','AdminController@AllCustomer');

		//显示单个顾客信息以及修改他们
		Route::get('control-customer/{username}','AdminController@ControlCustomer');

		//post 接受修改请求
		Route::post('control-customer/changeinfo','AdminController@changeinfo');

		//显示所有餐厅信息
		Route::get('all-restaurant','AdminController@AllRestaurant');

		//获取一个餐厅的详细信息
		Route::get('control-restaurant/{username}','AdminController@ControlRestaurant');

		Route::post('control-restaurant','AdminController@ChangeRestaurantInfo');

		//获取到所有的网站活动
		Route::get('event','AdminController@GetEvent');

		//显示增加网站活动页面
		Route::get('put-event','AdminController@GetPutEvent');

		//接受发布网站活动
		Route::post('put-event','AdminController@PutEvent');

		//显示发送信息页面
		Route::get('message','AdminController@GetMessage');

		//接受admin发送信息
		Route::post('send-message','AdminController@SendMessage');

		//显示修改网页活动页面
		Route::get('change-event/{event_id}','AdminController@ChangeEvent');

		//删除活动
		Route::post('delete-event','AdminController@DeleteEvent');

		//post接收修改网站活动信息
		Route::post('change-event','AdminController@postChangeEvent');

		//管理员主页
		Route::get('index','AdminController@GetIndex');

		//获取所有菜品
		Route::get('food','AdminController@GetFood');

		//控制菜品页面
		Route::get('food/{id}','AdminController@GetFoodById');

		//接受菜品控制信息  X-editable js 提交
		Route::post('control-food','AdminController@ControlFood');

		//显示 评论 页面
		Route::get('comment','AdminController@GetComment');
	});
});










//搜索
Route::get('search/{content}','ShowController@search');











Route::get('test', function()
{

	// $result = DB::select('select foodid,sum(num) from fullorder where orderid = ? group by foodid' , [99]);
	// $result = DB::select('select foodid from fullorder' );


	$user = new User;
	$user->username = 'admin';
	$user->password = Hash::make('admin');
	$user->role = 3;
	$user->save();

});

Route::post('test', function(){
	return Input::all();
});