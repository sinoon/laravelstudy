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
			<div class="col-md-6">
					@if ($food->savename)
						<a href="../restaurant/{{$restaurant->username}}/foodimg/{{$food->savename}}">
						<img class="img-responsive" src="../restaurant/{{$restaurant->username}}/foodimg/{{$food->savename}}" alt="">
					</a>
					@else
						<a href="img/暂无图片.jpg">
						<img class="img-responsive" src="../img/暂无图片.jpg" alt="">
					</a>
					@endif
			</div>
			<div class="col-md-6">
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
				  <dd>糖醋鸡米花</dd>
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
					@if ($user!=null)
							<a id="nowtoorder" href="###" class="btn btn-primary">现在订餐</a>
						@else
							<a id="nowtoorder" href="/login" class="btn btn-primary">您尚未登录，请先登录再订餐</a>
						@endif	
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="cart">
	<ul class="nav nav-pills nav-stacked affix ">
		<li class="text-center" >购物车</li>
		<li class="divider"></li>
		@foreach ($cart as $cart)
			<li class="active"><a href="/food/{{$cart->foodid}}">{{ $cart->name }} —— {{ $cart->num }} 份</a></li>
		@endforeach

		<li class="divider"></li>
		<a href="###" class="btn btn-primary">结算</a>
		<a href="###" class="btn btn-primary pull-right">查看购物车</a>
	</ul>
	</div>
	<!-- /.content -->
@stop

@section('include-js')
	<script src="../js/food/public/foodshow.js"></script>
@stop