@extends('layout.base')

@section('include-css')
	<link rel="stylesheet" href="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/css/scojs.css">
	<link rel="stylesheet" href="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/css/sco.message.css">
@stop

@section('head-js')
	<script src="{{ asset('js/public/ad.js') }}"></script>
@stop

@section('head-javascript')
<script>
	var link = '{{$ad->link}}';
	var images = '{{$ad->imgaddress}}';
</script>
@stop

@section('title')
	<title>快捷订餐系统 for 毕业设计 -- 首页</title>
@stop

@section('content')
	<!-- head -->
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<a href="#" class="thumbnail">
					<img src="{{ asset('img/logo.gif') }}" alt="...">
				</a>
			</div>
			<div class="col-md-6 ">			
				<div class="input-group" style="margin:5%;">
					<span class="input-group-addon">搜索</span>
					<input id="search" type="text" class="form-control" placeholder="请输入要搜索的内容">
				</div>
			</div>

		</div>
	</div>
	<!-- /head -->

	<!-- content -->
	<div class=" navbar-top" style="z-index: 15;margin-top: 20px;left: 0px;width: 100%;">
		<div class="container">
			<!-- middle-navbar -->
			<div class="row ">
				<div class="col-md-12">
					<div class="navbar navbar-default   navbar-static-top">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
								<span class="icon-bar eye-protector-processed" style="-webkit-transition: background 0.3s ease; transition: background 0.3s ease; background-color: rgb(193, 230, 198);"></span>
								<span class="icon-bar eye-protector-processed" style="-webkit-transition: background 0.3s ease; transition: background 0.3s ease; background-color: rgb(193, 230, 198);"></span>
								<span class="icon-bar eye-protector-processed" style="-webkit-transition: background 0.3s ease; transition: background 0.3s ease; background-color: rgb(193, 230, 198);"></span>
							</button>
							<a class="navbar-brand" href="#">订餐之旅</a>
						</div>
						<div class="navbar-collapse collapse navbar-inverse-collapse">
							<ul class="nav navbar-nav">
								<li class="active"><a href="#gaifan">盖饭</a></li>
								<li><a href="#chaocai">炒菜</a></li>
								
							</ul>
							<form class="navbar-form navbar-right">
								<input type="text" class="form-control col-lg-8" placeholder="搜索">
							</form>
							<ul class="nav navbar-nav navbar-right">
								
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /middle-navbar -->
		</div>
	</div>
	<div class="container">
		<div class="row">
			<!-- 左侧 -->
			<div class="col-md-2" id="example">
				<ul class="nav nav-pills nav-stacked affix">
					<li class="active"><a href="#action">今日主打<span class="badge ">42</span></a></li>
					<li><a  href="#gaifan">盖饭类<span class="badge ">10</span></a></li>
					<li><a  href="#chaocai">炒菜类<span class="badge ">6</span></a></li>
<!-- 					<li><a  href="#month">月销量榜<span class="badge ">10</span></a></li>
					<li><a  href="#quarter">季度销量<span class="badge ">15</span></a></li> -->
					<hr>
				</ul>
			</div>
			<!-- /左侧 -->
			<!-- 中间 -->
			<div class="col-md-8">
				<!-- 今日主打 -->
				<section id="action">
					<h1 >
						今日主打
					</h1>
					<hr>
					<div class="row">
						<div class="col-md-8">
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#myCarousel" data-slide-to="1"></li>
									<li data-target="#myCarousel" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="item active">
										<img class="img-responsive center"  src="restaurant/{{$foodshowone->belongto}}/foodimg/{{$foodshowone->savename}}" alt="First slide">
										<div class="container">
											<div class="carousel-caption">
												<h1>{{$foodshowone->name}}</h1>
												<p>{{$foodshowone->note}}</p>
												<p><a class="btn btn-lg btn-primary" href="food/{{$foodshowone->id}}" role="button">订餐</a></p>
											</div>
										</div>
									</div>
									<div class="item">
										<img class="img-responsive"  src="restaurant/{{$foodshowtwo->belongto}}/foodimg/{{$foodshowtwo->savename}}" alt="Second slide">
										<div class="container">
											<div class="carousel-caption">
												<h1>{{$foodshowtwo->name}}</h1>
												<p>{{$foodshowtwo->note}}</p>
												<p><a class="btn btn-lg btn-primary" href="food/{{$foodshowtwo->id}}" role="button">订餐</a></p>
											</div>
										</div>
									</div>
									<div class="item">
										<img class="img-responsive"  src="restaurant/{{$foodshowthree->belongto}}/foodimg/{{$foodshowthree->savename}}" alt="Third slide">
										<div class="container">
											<div class="carousel-caption">
												<h1>{{$foodshowthree->name}}</h1>
												<p>{{$foodshowthree->note}}</p>
												<p><a class="btn btn-lg btn-primary" href="food/{{$foodshowthree->id}}" role="button">订餐</a></p>
											</div>
										</div>
									</div>
								</div>
								<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
								<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
							</div><!-- /.carousel -->
						</div>


						<div class="col-md-4">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
								<li class="active"><a href="#home" data-toggle="tab">盖饭</a></li>
								<li><a href="#profile" data-toggle="tab">炒菜</a></li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content ">
								<div class="tab-pane fade in active" id="home">
									<div class="list-group">
										
										@foreach ($foodone as $food)
										<li class="list-group-item">
											<span class="glyphicon glyphicon-star"></span><a href="food/{{$food->id}}">{{$food->name}}</a>
										</li>
										@endforeach
									</div>
								</div>
								<div class="tab-pane fade " id="profile">
									<div class="list-group">
										@foreach ($foodtwo as $food)
										<li class="list-group-item">
											<span class="glyphicon glyphicon-star"></span><a href="food/{{$food->id}}">{{$food->name}}</a>
										</li>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- /今日主打 -->
				<!-- 盖饭 -->
				<div class="row">
					<section id="gaifan">
						<h1 >
							盖饭类
						</h1>
						<span class="text-primary"><a href="###">more...</a></span>
						<hr>
						@foreach ($gaifan_food as $food)
						<div class="col-md-6">
							<div class="media">
								<div class="col-md-8">
									<a class="pull-left thumbnail btn-block" href="#">
										<img class="media-object" src="{{ asset('restaurant/'.$food->belongto.'/foodimg/'.$food->savename) }}" alt="">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading"><a href="{{ asset('food/'.$food->id) }}">{{$food->name}}</a></h4>
									<dl class="">
									  <dt>价格</dt>
									  <dd>{{$food->price}}</dd>

									  <dt>库存数量</dt>
									  <dd>{{$food->stock}}</dd>

									  <!-- <dt>描述</dt> -->
									  <dd>
									  	{{mb_substr($food->note,0,20,"utf-8")."..."}}
									  </dd>
									</dl>
								</div>
							</div>
						</div>
						@endforeach
					</section>
				</div>
				<!-- /.盖饭 -->
				
				<!-- 炒菜 -->
				<div class="row">
					<section id="chaocai">
						<h1 >
							炒菜类
						</h1>
						<span class="text-primary"><a href="###">more...</a></span>
						<hr>
						@foreach ($chaocai_food as $food)
						<div class="col-md-6">
							<div class="media">
								<div class="col-md-8">
									<a class="pull-left thumbnail btn-block" href="#">
										<img class="media-object" src="{{ asset('restaurant/'.$food->belongto.'/foodimg/'.$food->savename) }}" alt="">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading"><a href="{{ asset('food/'.$food->id) }}">{{$food->name}}</a></h4>
									<dl class="">
									  <dt>价格</dt>
									  <dd>{{$food->price}}</dd>

									  <dt>库存数量</dt>
									  <dd>{{$food->stock}}</dd>

									  <!-- <dt>描述</dt> -->
									  <dd>
									  	{{mb_substr($food->note,0,20,"utf-8")."..."}}
									  </dd>
									</dl>
								</div>
							</div>
						</div>
						@endforeach
					</section>
				</div>
				<!-- /.炒菜 -->

			</div>
			<!-- /中间 -->
			<!-- 右侧 -->
			<div class="col-md-2">
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
			<!-- /右侧 -->
		</div>
	</div>
	<!-- /content -->



@stop

@section('include-js')
	
	<script src="{{ asset('js/public/stickUp.min.js') }}"></script>
	<script src="{{ asset('js/public/sco.message.js') }}"></script>
	<script src="{{ asset('js/public/index.js') }}"></script>
@stop

@section('javascript')
<script>

jQuery(function($) {
	$(document).ready( function() {
		$('.navbar-top').stickUp({
		});
		@if ((Session::get('error'))||($errors->first('username'))||($errors->first('password'))||($errors->first('captcha')))
		$('#myModal').modal('show');
		@endif
		@if (isset($user))
		$.scojs_message('{{$user->username . " ,欢迎回来！"}}', $.scojs_message.TYPE_OK);
		@endif
	});


	//广告
	var browser={ie6:function(){return((window.XMLHttpRequest==undefined)&&(ActiveXObject!=undefined))},getWindow:function(){var myHeight=0;var myWidth=0;if(typeof(window.innerWidth)=='number'){myHeight=window.innerHeight;myWidth=window.innerWidth}else if(document.documentElement){myHeight=document.documentElement.clientHeight;myWidth=document.documentElement.clientWidth}else if(document.body){myHeight=document.body.clientHeight;myWidth=document.body.clientWidth}return{'height':myHeight,'width':myWidth}},getScroll:function(){var myHeight=0;var myWidth=0;if(typeof(window.pageYOffset)=='number'){myHeight=window.pageYOffset;myWidth=window.pageXOffset}else if(document.documentElement){myHeight=document.documentElement.scrollTop;myWidth=document.documentElement.scrollLeft}else if(document.body){myHeight=document.body.scrollTop;myWidth=document.body.scrollLeft}return{'height':myHeight,'width':myWidth}},getDocWidth:function(D){if(!D)var D=document;return Math.max(Math.max(D.body.scrollWidth,D.documentElement.scrollWidth),Math.max(D.body.offsetWidth,D.documentElement.offsetWidth),Math.max(D.body.clientWidth,D.documentElement.clientWidth))},getDocHeight:function(D){if(!D)var D=document;return Math.max(Math.max(D.body.scrollHeight,D.documentElement.scrollHeight),Math.max(D.body.offsetHeight,D.documentElement.offsetHeight),Math.max(D.body.clientHeight,D.documentElement.clientHeight))}};var dom={ID:function(id){var type=typeof(id);if(type=='object')return id;if(type=='string')return document.getElementById(id);return null},insertHtml:function(html){var frag=document.createDocumentFragment();var div=document.createElement("div");div.innerHTML=html;for(var i=0,ii=div.childNodes.length;i<ii;i++){frag.appendChild(div.childNodes[i])}document.body.insertBefore(frag,document.body.firstChild)}};var myEvent={add:function(element,type,handler){var ele=dom.ID(element);if(!ele)return;if(ele.addEventListener)ele.addEventListener(type,handler,false);else if(ele.attachEvent)ele.attachEvent("on"+type,handler);else ele["on"+type]=handler},remove:function(element,type,handler){var ele=dom.ID(element);if(!ele)return;if(ele.removeEventListener)ele.removeEventListener(type,handler,false);else if(ele.detachEvent)ele.detachEvent("on"+type,handler);else ele["on"+type]=null}};var position={rightCenter:function(id){var id=dom.ID(id);var ie6=browser.ie6();var win=browser.getWindow();var ele={'height':id.clientHeight,'width':id.clientWidth};if(ie6){var scrollBar=browser.getScroll()}else{var scrollBar={'height':0,'width':0};id.style.position='fixed'}ele.top=parseInt((win.height-ele.height)/2+scrollBar.height);id.style.top=ele.top+'px';id.style.right='3px'},floatRightCenter:function(id){position.rightCenter(id);var fun=function(){position.rightCenter(id)};if(browser.ie6()){myEvent.add(window,'scroll',fun);myEvent.add(window,'resize',fun)}else{myEvent.add(window,'resize',fun)}},leftCenter:function(id){var id=dom.ID(id);var ie6=browser.ie6();var win=browser.getWindow();var ele={'height':id.clientHeight,'width':id.clientWidth};if(ie6){var scrollBar=browser.getScroll()}else{var scrollBar={'height':0,'width':0};id.style.position='fixed'}ele.top=parseInt((win.height-ele.height)/2+scrollBar.height);id.style.top=ele.top+'px';id.style.left='3px'},floatLeftCenter:function(id){position.leftCenter(id);var fun=function(){position.leftCenter(id)};if(browser.ie6()){myEvent.add(window,'scroll',fun);myEvent.add(window,'resize',fun)}else{myEvent.add(window,'resize',fun)}}};

	function ad_left(){
	    var html;
	    html = '<div id="ad_left" style="position:absolute;width:130px;height:300px;z-index:10001"><a style="position:absolute;top:-15px;left:0;" href="javascript:void(0);" onclick="document.getElementById(\'ad_left\').style.display=\'none\'">关闭</a><a href="'+link+'"><img src="advertisement/'+images+'" width="130" height="300" /></a></div>';
	    dom.insertHtml(html);position.floatLeftCenter('ad_left');
	}
	function ad_right(){
	    var html;
	    html = '<div id="ad_right" style="position:absolute;width:130px;height:300px;z-index:10001"><a style="position:absolute;top:-15px;right:0;" href="javascript:void(0);" onclick="document.getElementById(\'ad_right\').style.display=\'none\'">关闭</a><a href="'+link+'"><img src="advertisement/'+images+'" width="130" height="300" /></a></div>';
	    dom.insertHtml(html);position.floatRightCenter('ad_right');
	}
	myEvent.add(window,'load',ad_left);
	myEvent.add(window,'load',ad_right);



});
</script>
@stop