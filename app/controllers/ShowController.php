<?php

class ShowController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ad = Advertisement::find(1);

		$foodone = Food::where('type','盖饭')->take(6)->get();
		$foodtwo = Food::where('type','炒菜')->take(6)->skip(6)->get();
		//应该做成可以推荐的方式
		$foodshowone = Foodinfo::take(1)->first();
		$foodshowtwo = Foodinfo::take(1)->skip(1)->first();
		$foodshowthree = Foodinfo::skip(2)->take(1)->first();

		$gaifan_food = Food::where('type','盖饭')->take(10)->get();

		$chaocai_food = Food::where('type','炒菜')->take(10)->get();

		// foreach ($normal_food as $key => $value) {
		// 	$value->note = $this->str_cut($value->note,80);
		// }

		//各种销量统计
		//取得所有的
		Fullorderview::select('foodid')->distinct()->get();

		if(Auth::check())
		{
			//如果登录了
			$user = Auth::user();//获取用户登录信息是为了显示
			//
			$cart = ShortCart::where('userid',$user->id)->get();
			//
			return View::make('show.index',compact(
			'user',
			'ad',
			'foodone',
			'foodtwo',
			'foodshowone',
			'foodshowtwo',
			'foodshowthree',
			'cart',
			'gaifan_food',
			'chaocai_food'
			));
		}
		else
		{
			return View::make('show.index',compact(
				'ad',
			'foodone',
			'foodtwo',
			'foodshowone',
			'foodshowtwo',
			'foodshowthree',
			'gaifan_food',
			'chaocai_food'
			));
		}

		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function food($id)
	{
		$food = Foodinfo::where('id' , '=' , $id )->first();
		$user = Auth::user();
		$restaurant = restaurant::where('username','=',$food->username)->first();
		if( Auth::check() )
		{
			$cart = ShortCart::where('userid',$user->id)->get();
		}

		//获取这个菜品的评价
		$comments = Fullorder::where('foodid',$id)->where('needcomment','!=' , 'NULL')->get();

		//同类推荐
		$foods = Food::recommend($id);
		return View::make('show.food',compact('food','user','restaurant','cart','comments','foods'));
	}

	public function str_cut($string, $length, $dot = '...') 
	{ 
		$strlen = strlen($string); 
		if($strlen <= $length) return $string; 
		$string = str_replace(array(' ', '&', '“', '”', '—', '<', '>', '·', '…'), array(' ', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), $string); 
		$strcut = ''; 
		if(strtolower($string) == 'utf-8') 
		{ 
			$n = $tn = $noc = 0; 
			while($n < $strlen) 
			{ 
				$t = ord($string[$n]); 
				if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) { 
					$tn = 1; $n++; $noc++; 
				} elseif(194 <= $t && $t <= 223) { 
					$tn = 2; $n += 2; $noc += 2; 
				} elseif(224 <= $t && $t < 239) { 
					$tn = 3; $n += 3; $noc += 2; 
				} elseif(240 <= $t && $t <= 247) { 
					$tn = 4; $n += 4; $noc += 2; 
				} elseif(248 <= $t && $t <= 251) { 
					$tn = 5; $n += 5; $noc += 2; 
				} elseif($t == 252 || $t == 253) { 
					$tn = 6; $n += 6; $noc += 2; 
				} else { 
					$n++; 
				} 
				if($noc >= $length) break; 
			} 
			if($noc > $length) $n -= $tn; 
			$strcut = substr($string, 0, $n); 
		} 
		else 
		{ 
			$dotlen = strlen($dot); 
			$maxi = $length - $dotlen - 1; 
			for($i = 0; $i < $maxi; $i++) 
			{ 
				$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i]; 
			} 
		} 
		$strcut = str_replace(array('&', '<', '>'), array('&', '<', '>'), $strcut); 
		return $strcut.$dot; 
	}

	public function search($content)
	{
		$count = Food::where('name','LIKE','%'.$content.'%')->count();
		$foods = Food::where('name','LIKE','%'.$content.'%')->paginate(6);

		return View::make('show.search', compact('foods','count'));
	}
}