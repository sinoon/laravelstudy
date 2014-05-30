@extends('layout.base')

@section('include-css')

@stop

@section('title')
	<title>快捷订餐系统 for 毕业设计 -- 菜品页面</title>
@stop

@section('css')
	<style>
	#cart {
		z-index: 100;
		position: fixed;
		right:0;
		width: 250px;
		top:350px;
	}
	</style>
@stop

@section('head-javascript')
	<script type="text/javascript">
		var foodid = {{$food->id}};
	</script>
@stop

@section('content')
	<!-- content -->
	<div class="container">
		<div class="row">
			<h1>{{$food->name}}</h1>
		</div>	
		<hr>
	
		<div class="row">

			<!-- 同类推荐 -->
			<div class="col-md-2">
				<h4>同类推荐</h4>
				<hr>
				@foreach ($foods as $recommend_food)
					@if ($recommend_food->savename)
						<a href="../restaurant/{{$restaurant->username}}/foodimg/{{$recommend_food->savename}}">
						<img class="img-responsive" src="../restaurant/{{$restaurant->username}}/foodimg/{{$recommend_food->savename}}" alt="">
					</a>
					@else
						<a href="img/暂无图片.jpg">
						<img class="img-responsive" src="../img/暂无图片.jpg" alt="">
					</a>
					@endif
					<p>
						名字：{{$recommend_food->name}}，
						价格：{{$recommend_food->price}}
					</p>
					<hr>
				@endforeach
			</div>
			<!-- /.同类推荐 -->
			
			<div class="col-md-5">
					@if ($food->savename)
						<a href="../restaurant/{{$restaurant->username}}/foodimg/{{$food->savename}}">
						<img class="img-responsive" src="../restaurant/{{$restaurant->username}}/foodimg/{{$food->savename}}" alt="">
					</a>
					@else
						<a href="img/暂无图片.jpg">
						<img class="img-responsive" src="../img/暂无图片.jpg" alt="">
					</a>
					@endif
			</div><!-- /.food img -->

			<div class="col-md-5">
				<dl class="dl-horizontal">
				  <dt>名字</dt>
				  <dd>{{$food->name}}</dd>
				</dl>				
				<dl class="dl-horizontal">
				  <dt>价格</dt>
				  <dd>{{$food->price}} 元</dd>
				</dl>				
				<dl class="dl-horizontal">
				  <dt>库存</dt>
				  <dd>{{$food->stock}} 份</dd>
				</dl>				
				<dl class="dl-horizontal">
				  <dt>描述</dt>
				  <dd>{{$food->note}}</dd>
				</dl>				
				<dl class="dl-horizontal">
				  <dt>所属餐厅</dt>
				  <dd>{{$food->restaurantname}}</dd>
				</dl>
				<dl class="dl-horizontal">
				  <dt>开业时间</dt>
				  <dd>{{$food->moring}}</dd>
				</dl>
				<dl class="dl-horizontal">
				  <dt>关门时间</dt>
				  <dd>{{$food->night}}</dd>
				</dl>
				@if ($food->typeofdemand == 1)
					<dl class="dl-horizontal">
					  <dt>几份起送</dt>
					  <dd>{{$food->demandfornum}}</dd>
					</dl>
				@elseif ( $food->typeofdemand ==2 )
					<dl class="dl-horizontal">
					  <dt>起送金额</dt>
					  <dd>{{$food->demanformoney}}</dd>
					</dl>
				@else
					<dl class="dl-horizontal">
					  <dt>起送要求</dt>
					  <dd>无要求</dd>
					</dl>
				@endif

				<dl class="dl-horizontal">
				  <dt>餐厅电话</dt>
				  <dd>{{$food->phone}}</dd>
				</dl>

				<div class="row">
					<div class="col-md-offset-4">
						<input type="text" class="input-mini spinner-input form-control" id="spinner1" maxlength="3">

					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
					@if (isset($user) && $user->role == 1)
						<a id="nowtoorder" href="###" class="btn btn-primary">现在订餐</a>
					@endif

					@if (isset($user) && $user->role == 2)
						<a href="{{ asset('login') }}" class="btn btn-primary">抱歉，您的身份是餐厅用户，无法订餐</a>
					@endif

					@if (!isset($user))
						<a href="{{ asset('login') }}" class="btn btn-primary">您尚未登录，请先登录再订餐</a>
					@endif
							<hr>
							
				
					</div>
				</div>
			</div><!-- /.info -->
			
		<hr>
			<div class="col-md-9 col-md-offset-0">
				<div class=" comment">
					<ul class="nav nav-pills nav-justified ">
						<li class="active"><a href="#">评价 <span class="badge">{{count($comments)}}</span></a></li>
					</ul>
				</div>
				<br>
				@if (isset($comments))
					@foreach ($comments as $comment)
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">
									　　购买日期：{{$comment->created_at}}　　
									评价日期：{{$comment->updated_at}}　　
									购买数量：{{$comment->num}}
								</h3>
							</div>
							<div class="panel-body">
								<dl class="dl-horizontal">
									<dt>口味</dt>
									<dd>{{$comment->taste}} 星</dd>

									<dt>送餐速度</dt>
									<dd>{{$comment->fast}} 星</dd>
								</dl>
								<p>
									{{$comment->comment}}
								</p>
							</div>
						</div>
						<br>
					@endforeach
				@endif
			</div>
		</div><!-- /.2 row -->
	</div><!-- /.container -->

	<div id="cart">
		<ul class="nav nav-pills nav-stacked affix ">
			@if (isset($cart))
				<li class="text-center" >购物车</li>
				@foreach ($cart as $cart)
					<li class="active"><a href="{{ asset('food/'.$cart->foodid) }}">{{ $cart->name }} —— {{ $cart->num }} 份</a></li>
				@endforeach
				<li class="divider"></li>
				<div class="row">
					<li class="col-md-6">
						<a href="{{ asset('cart') }}">查看购物车</a>
					</li>
					<li class="col-md-6">
						<a href="{{ asset('order/startorder') }}">结算</a>
					</li>
				</div>
			@else
				<li class="active"><a href="#">购物车</a></li>
				<li><a href="#">您尚未登录，无法使用购物车</a></li>
			@endif

		</ul>
	</div>
	<!-- /.content -->
@stop

@section('include-js')
	<script src="../js/food/public/foodshow.js"></script>
@stop