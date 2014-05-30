<?php

use Sms\Sms;

class OrderController extends \BaseController {

	/**
	 * Constructor
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
		// $money = array(array());
		// $money = 0;
		// $money = [0,0,0];
		$user = Auth::user();
		// $fullcart = array();
		//得到不重复的餐厅名
		$restaurant = FullCart::where('userid',$user->id)->select('restaurantname')->distinct()->get();
		// $fullcart = FullCart::where('userid',$user->id)->get();

		$fullcart =  FullCart::where('userid',$user->id)->get();
		// $fullcart[$key][] = FullCart::where('userid',$user->id)->get();
		// return View::make('order.order')->with(compact('fullcart','user'));
		// return count($fullcart);
		// $restaurant = FullCart::
		// 1、先取得共订了几个餐厅的菜品
		// 2、然后再循环算出来每个在每个餐厅订了几份
		// 3、再算出来每个餐厅都预订了多少钱的东西
		// 4、在显示的时候，根据类型显示
		//得到不重复的餐厅名
		$restaurant = FullCart::where('userid',$user->id)->distinct()->get();
		$restnum = FullCart::where('userid',$user->id)->select('restaurantname')->distinct()->get();
		foreach ($restaurant as $outkey => $value) {
			$foodnum[$outkey] = FullCart::where('userid',$user->id)->where('restaurantname',$value->restaurantname)->count();
			$temp = FullCart::where('userid',$user->id)->where('restaurantname',$value->restaurantname)->get();
			$money[$outkey] = 0;
			foreach ($temp as $inkey => $value) {
				$money[$outkey] +=  $value->num * $value->price;
			}

		}
		// return $restnum;
		return View::make('order.order')->with(compact('fullcart','user','restaurant','foodnum','money','restnum'));
	}

	/**
	 * [order 显示订单页面，早期使用的函数，作为测试使用，现在已经不适用了]
	 * @param  [type] $foodid [传送进来的菜品ID]
	 * @param  [type] $num    [购买的数量]
	 * @return [type]         [description]
	 */
	public function order($foodid,$num)
	{
		$user = Auth::user();
		$food = Foodinfo::where('id','=',$foodid)->first();
		return View::make('order.order',compact('user','food','num'));
	}

	public function gStartOrder()
	{
		$user = Auth::user();
		$customer = Customer::where('username',$user->username)->first();//拿到这个顾客的数据

		if( $customer->mobile_status == 0 )
		{
			return Redirect::to('order/confirm_mobile');
		}

		$customer_address = CustomerAddressView::GetCustomer($user->username);

		$fullcart =  FullCart::where('userid',$user->id)->get();

		$restaurant = FullCart::where('userid',$user->id)->distinct()->get();
		$restnum = FullCart::where('userid',$user->id)->select('restaurantname')->distinct()->get();
		foreach ($restaurant as $outkey => $value) {
			$foodnum[$outkey] = FullCart::where('userid',$user->id)->where('restaurantname',$value->restaurantname)->count();
			$temp = FullCart::where('userid',$user->id)->where('restaurantname',$value->restaurantname)->get();
			$money[$outkey] = 0;
			foreach ($temp as $inkey => $value) {
				$money[$outkey] +=  $value->num * $value->price;
			}

		}
		// return $restnum;
		return View::make('order.startorder')->with(compact('user','fullcart','customer_address','customer','restaurant','foodnum','money','restnum'));
	}

	/**
	 * [deletefood 从购物车里面删掉菜品]
	 * @return [type] [是否完成]
	 */
	public function deletefood()
	{
		$foodid = Input::all();
		$user = Auth::user();
		$result = Cart::where('userid',$user->id)->where('foodid',Input::get('id'))->first();
		$result->delete();
		return 'done';
		// if($result->delete());
		// {
		// 	return $id;	
		// }
		
	}

	/**
	 * [submitorder description]
	 * @return [type] [description]
	 */
	public function submitorder()
	{
		//第一步，验证手机号
		//第二步，确定送餐地址
		//第三步，生成这个订单
		//第四步，通知顾客和餐厅
		//在这里没有检查能不能送。。。
		$user = Auth::user();
		$customer = customer::where('username',$username)->fisst();
		if( $customer->mobile_status == 0 )
		{
			//说明还没有验证手机号
			//那么就要顾客验证手机号
			//返回一个页面，这个页面会提示用户验证手机号
			return View::make('order.confirm_mobile');
		}
		$data = Input::except('_token');
		$userid = Auth::user()->id;
		$order = new Order;
		$order->userid = $userid;
		$order->status = 1;
		$order->save();
		foreach ($data as $key => $num) 
		{
			preg_match('/\d+/', $key, $foodid);//正则，拿到名字里面的foodid
			$fullorder = new FullOrder;
			$fullorder->orderid = $order->id;
			$fullorder->foodid = $foodid;
			$fullorder->num = $num;
			$fullorder->save();
		}
		//如果手机号都已经验证通过了，那么顾客只需要填写他的送餐地址就可以了
		//填写送餐地址页面以及确认订单
		return View::make('Order.address');
	}

	/**
	 * [send_confirm 发送手机号验证信息]
	 * @return [type] [云片网的返回值]
	 */
	public function send_confirm()
	{
		//获取提交进来手机号
		// $mobile = Input::get('mobile');
		$user = Auth::user();
		$customer = Customer::where('username',$user->username)->first();
		$mobile = $customer->mobile;

		//1、生成对应的验证码
		$confirm_code = rand(100000,999999);
		$confirm = new Confirmmobile;
		$confirm->confirm_code = $confirm_code;
		$confirm->username = $user->username;
		//保存验证码
		$confirm->save();
		//在这里并没有检查之前这个人是否申请过验证码,以后有机会不上
		return $this->sms->send_confirm($confirm_code,$mobile);
		//2、存入验证码数据库表里面
		//3、发送验证码
		
	}

	/**
	 * [confirm_mobile 验证手机号验证码，post，尚未写完]
	 * @return [type] [description]
	 */
	public function confirm_mobile()
	{
		$code = Input::get('code');
		$user = Auth::user();
		$customer = Customer::where('username',$user->username)->first();
		$confirm = Confirmmobile::where('username',$user->username)->first();
		if(is_null($confirm))
		{
			return -1;
		}
		if( $code == $confirm->confirm_code )
		{
			//验证成功
			//修改手机验证状态
			$customer->mobile_status = 1;
			$customer->save();
			$confirm->delete();
			Session::flash('success', '手机验证成功');
			return 1;
			// return Redirect::to('order/startorder');
		}
		else
		{
			//验证失败
			return -2;
		}
	}

	/**
	 * [startorder 表单提交方式~！非Ajax正式提交订单，Input包含了地址和菜品信息]
	 * 隐性提交数据
	 * addressid
	 * newaddress string
	 * 菜品id
	 * @return [type] [description]
	 */
	public function startorder()
	{
		//准备工作
		//
		//清空这两个表
		TempOrder::where('id','>','0')->delete();
		TempOrderFood::where('id','>','0')->delete();



		$user = Auth::user();
		$data = Input::except('_token','address','newaddress');

		//取出来这个模型 主要是为了那个顾客的手机号码
		$customer = Customer::where('username',$user->username)->first();

		//先确定送餐的地址
		if( Input::get('address') == 'newaddress' )
		{
			//如果选择了新的地址
			//就取得新的地址
			$address = new Address;
			$address->username = $user->username;
			$address->address = Input::get('newaddress');
			$address->save();
			$aid = $address->id;
		}
		else
		{
			//如果没有使用新的地址，就拿到地址的ID
			$address = Input::get('address');//addressid
			$aid = $address;
		}
		unset($address);
		//根据ID，取得地址，这个地址是为了后面给餐厅发短信的时候用的，订单中保存地址都是用 address_id 
		$address = Address::where('id',$aid)->select('address')->first();

		//判断订单分属几个餐厅，根据分属几个餐厅来循环
		$restnum = FullCart::where('userid',$user->id)->select('restaurantname')->distinct()->get();

		//测试函数
		// return $restnum;
		//先把money准备好
		
		$fullmoney = 0;

		

		//开始根据 有几个餐厅来循环
		foreach ($restnum as $restname) {

			//存放在每个餐厅购买的钱数的总和
			$money = 0;

			//存放在每个餐厅购买的菜品的总和
			$all_num = 0;


			//每次循环开一个新订单
			$order = new Order;
			//新订单有几个内容
			//地址 这个每个订单都一样
			$order->addressid = $aid;
			//用户ID，这个也是
			$order->userid = $user->id;
			//餐厅名字
			$order->restname = $restname->restaurantname;
			//状态，一样
			$order->status = 1;

			//先保存一下，为了后面可以使用它的ID
			$order->save();

			//临时订单表
			$temp_order = new TempOrder;
			//订单的ID
			$temp_order->orderid = $order->id;
			//存放真实的地址
			$temp = Address::where('id',$aid)->select('address')->first();
			$temp_order->address = $temp->address;
			unset($temp);
			//存放进临时订单表
			$temp_order->restname = $restname->restaurantname;
			//不一样的是菜品和fullorder
			
			foreach ($data as $innerkey => $num) 
			{
				preg_match('/\d+/', $innerkey, $foodid);//正则，拿到名字里面的foodid
				$foodid = $foodid[0];
				//事实证明，此时的$foodid是一个数组的形式
				//从键名取得foodid，$num就是数量
				//遍历输入进来的菜品 如果属于这个餐厅就放进这个餐厅的fullorder里面，不是的话，就跳过
				if( $this->BelongRestaurant($foodid,$restname->restaurantname) == 1 )
				{
					//如果是这个餐厅的，就放进去
					//本来都是存放ID，只是为了之后计算价钱方便，先把模型取出来
					$foodinfo = Foodinfo::where('id',$foodid)->first();
					//
					//检查这个菜品的各项情况
					
					$message = $this->checkfood($foodid);

					if( $message != 1 )
					{
						//检查失败
						Session::flash('message', $message);
						return Redirect::back()
						    ->withInput()
						    ->withErrors('message',$message);
					}

					//通过检查
					//放进订单详情表
					$fullorder = new FullOrder;
					$fullorder->orderid = $order->id;//order->id是属于哪个order
					$fullorder->foodid = $foodid;
					$fullorder->num = $num;
					$fullorder->save();

					//库存应该进行相应的变化
					$foodinfo->stock = $foodinfo->stock - $num;

				}
				//此次订单的价钱
				$money += $foodinfo->price * $num; 

				//计算购买菜品的总和数量
				$all_num += $num;

				$temp_order_food = new TempOrderFood;
				//订单的ID
				$temp_order_food->orderid = $order->id;
				//菜品名称
				$temp_order_food->food = $foodinfo->name;
				//价格
				$temp_order_food->price = $foodinfo->price;
				//购买份数
				$temp_order_food->num = $num;

				//保存
				$temp_order_food->save();

				$rest_mobile = $foodinfo->mobile;
				//开始循环之前先销毁变量
				unset($foodinfo,$message,$fullorder);

				//祈祷吧，别出错
			}

			//呵呵，看样子之前我计算money只是为了给顾客和餐厅发送短信的时候，可以通知他们这个订单产生多少钱的流水
			//但是，现在看来，我确实有必要保存这个money！，毕竟以后想再重新计算一下破有难度了。
			//一个餐厅的钱
			$order->money = $money;

			//把钱数放进去
			$temp_order->money = $money;
			//把数量放进去
			$temp_order->num = $all_num;

			//总的钱数，这个钱数之后还是要传送到页面里面去给顾客看的
			$fullmoney += $money;
			
			//这个订单弄完了
			$order->save();

			//临时订单表也要保存
			$temp_order->save();

			//完成一个餐厅的订单，给这个前厅发送一次
			//通知餐厅啦，有顾客在你这里订餐了，赶快接待一下
			$this->sms->informrestaurant($order->id,$money,$temp_order->address,$rest_mobile);//先不发送短信

			//计算价钱的money归零
			$money = 0;

			//开始下一次循环
			
			//给顾客发送短信，你的订单已经生效啦~
			$this->sms->informcustomer($order->id,$fullmoney,$customer->mobile);//先不发送短信

			//在开始之前先要销毁要重复使用的变量
			unset($order);
		}

		//等这个东西弄完了，就返回顾客 说 生成几个订单，共多少钱
		//生成几个订单啊，几个餐厅就有几个订单嘛\
		//
		
		//传送数据需要几个
		//对于顾客来说 他只需要几个数据
		//买了什么
		//
		//花了多少钱
		//买了几份
		//送到哪里
		//需要给它几个东西
		//temp_order 显示几个
		$temp_order = TempOrder::all();
		//temp_order_food 显示几个
		$temp_order_food = TempOrderFood::all();
		//$fullmoney显示一下
		return View::make('order.startorderdone',compact('user','temp_order','temp_order_food','fullmoney'));
	}

	/**
	 * [checkfood 判断菜品是否能够购买]
	 * @param  [type] $id [菜品ID]
	 * @return [type]     [错误信息]
	 */
	public function checkfood($id)
	{
		$message = null;
		$foodinfo = Foodinfo::where('id',$id)->first();
		$moring = $foodinfo->moring;
		$night = $foodinfo->night;
		$time = date("H:i",time());
		// return $time;
		if( $foodinfo->status != 'Yes' )
		{	
			$message = $foodinfo->name." 已经下线。";
			return $message;
		}
		else if( $foodinfo->stock <= 0 )
		{
			$message = "对不起，".$foodinfo->name." 已经卖完了。";
			return $message;
		}
		else if( !( ( $time > $moring ) && ( $time<($night) ) ) )
		{
			$message = "对不起，".$foodinfo->name." 属于的餐厅："." ".$foodinfo->restaurantname." 现在不在营业时间";
			return $message;
		}
		else if( $foodinfo->reststatus != 1 )
		{
			$message = "对不起，"." ".$foodinfo->restaurantname." 餐厅没有上线";
			return $message;
		}
		else
		{
			return 1;
		}
	}

	public function BelongRestaurant($foodid,$restaurantname)
	{
		$food = Foodinfo::where('id',$foodid)->first();
		if( $food->restaurantname != $restaurantname )
		{
			//如果不相等，就说明不是这个餐厅的菜品
			return -1;
		}
		else
		{
			return 1;
		}
	}

	/**
	 * [StartDelivery 处理餐厅 提出 开始配送 请求]
	 */
	public function StartDelivery()
	{
		$orderid = Input::get("orderid");
		$order = Order::StartDelivery($orderid);//返回值是影响的行数
		//通知顾客，你的菜已经在路上了。
		$money = Order::where('id',$orderid)->first()->money;
		$mobile = Order::GetCustomerMobile($orderid);
		$this->sms->deliver_meals('10',$orderid,$money,$mobile);
		return $order;
	}

	/**
	 * [GetMeal 顾客收到外卖，修改订单状态]
	 */
	public function GetMeal()
	{
		$orderid = Input::get('orderid');
		$order = Order::GetMeal($orderid);//返回影响的函数
		return $order;
	}

	/**
	 * [OrderComment 显示评价页面]
	 * get
	 */
	public function OrderComment($fullorderid)
	{
		//判断是不是空的
		if( FullOrder::IsNull($fullorderid) == -1 )
		{
			//如果不是空的
			return Redirect::to('/');//返回主页
		}
		//再判断这个人有没有资格评价这个菜品，也就是说他有没有订过这个菜品
		$id = Auth::user()->id;//先知道是谁

		if( FullOrder::IsHasOrder($fullorderid,$id) == -1 )
		{
			//如果没有这个事情
			return Redirect::to('/');//返回主页
		}

		$foodid = FullOrder::where('id',$fullorderid)->first()->foodid;

		$food = Foodinfo::where('id' , '=' , $foodid)->first();
		$user = Auth::user();
		$restaurant = restaurant::where('username','=',$food->username)->first();

		//order
		$order = Order_address_view::where('oid','99')->first();

		return View::make('users.comment',compact('food','user','restaurant','order','fullorderid'));
	}

	/**
	 * [PutComment 接受提交过来的评价]
	 * 前台post
	 */
	public function PutComment()
	{
		FullOrder::where('id',Input::get('fullorderid'))->update(array('comment' => Input::get('content') , 'taste' => Input::get('taste'), 'fast' => Input::get('fast'), 'needcomment' => '1'));
		//到底return去哪个页面 完全没有想法。。
		$username = Auth::user()->username;
		return Redirect::to('profile/'.$username);
	}

	public function gconfirm_mobile()
	{
		$user = Auth::user();
		$customer = Customer::where('username',$user->username)->first();
		return View::make('order.confirm_mobile',compact('customer','user'));
	}
}