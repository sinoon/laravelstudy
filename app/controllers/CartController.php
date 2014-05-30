<?php

class CartController extends \BaseController {

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
		return View::make('cart.index')->with(compact('fullcart','user','restaurant','foodnum','money','restnum'));
	}

	public function addincart()
	{
		$user = Auth::user();
		$foodid = Input::get('foodid');
		$num = Input::get('num');
		//1、先判断有没有这个
		$cart = Cart::where('userid',$user->id)->where('foodid',$foodid)->first();
		if( is_null($cart) )
		{
			//如果没有那么就添加进去
			$cart = new Cart;
			$cart->foodid = $foodid;
			$cart->num = $num;
			$cart->userid = $user->id;
			$cart->save();
		}
		else
		{
			//如果在购物车里面已经存在这个菜品的话，就把这个菜品的数量相加
			$cart->num = $cart->num + $num;
			$cart->save();
		}
		return 1;
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
		//
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

}