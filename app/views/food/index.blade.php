<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link href="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/css/bootstrap.min.css" rel="stylesheet"> -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../assets/css/ace.min.css" />
	<script src="{{asset('assets/js/ace-extra.min.js')}}"></script>

	<script type="text/javascript">
		var foodid = {{$food->id}};
	</script>
	<link href="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/css/bootstrap.min.css" rel="stylesheet">
	<title>餐品 —— {{ $food->name }}</title>
</head>
<body data-spy="scroll" data-target="#example">
	<div class="navbar navbar-default ">
		<div class="container">
			<div class="navbar-header">
				<a href="../" class="navbar-brand">速度订餐</a>
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navbar-main">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">A <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="themes">
							<li><a href="../default/">A-1</a></li>
							<li class="divider"></li>
							<li><a href="#">A-2</a></li>
							<li><a href="#">A-3</a></li>
							<li><a href="#">A-4</a></li>
							<li><a href="#">A-5</a></li>
							<li><a href="#">A-6</a></li>
							<li><a href="#">A-7</a></li>
							<li><a href="#/">A-8</a></li>
							<li><a href="#">A-9</a></li>
							<li><a href="#/">A-10</a></li>
							<li><a href="#">A-11</a></li>
							<li><a href="#">A-12</a></li>
							<li><a href="#">A-13</a></li>
							<li><a href="#">-A14</a></li>
							<li><a href="#">A-15</a></li>
							<li><a href="#">A-16</a></li>
						</ul>
					</li>
					<li>
						<a href="#">B</a>
					</li>
					<li>
						<a href="#">C</a>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">D <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="download">
							<li><a href="#">D-1</a></li>
							<li><a href="#">D-2</a></li>
							<li class="divider"></li> 
							<li><a href="#">D-3</a></li>
							<li><a href="#">D-4</a></li>
						</ul>
					</li>
				</ul>



				<ul class="nav navbar-nav navbar-right">
					@if ($user!=null)
					<li><a href="#" target="_blank" data-toggle="modal" data-target="#myModal">欢迎回来！</a></li>
					<li><a href="#" target="_blank" data-toggle="modal" data-target="#myModal">{{$user->username}}</a></li>
					<li><a href="/logout" target="_self">登出</a></li>
					@else
						<li><a href="../login" target="_blank" >登录</a></li>
						<li><a href="../register" target="_blank">注册</a></li>
					@endif
				</ul>
			
	

			</div>
		</div>
	</div>
	<!-- /.nav -->
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
<div class="space-24"></div>
<hr>

<div class="container">
	<div class="row">
		<div id="modal-footer">
			<div class="pull-right">
				<p>&copy;  2014 浙江财经大学 商楠</p>
				<p>
					For 毕业设计
				</p>
			</div>
		</div>
	</div>
</div>


	<!-- /content -->
	<!-- js -->
	<script src="../js/public/jquery-2.1.0.min.js"></script>
	<script src="../js/public/bootstrap.min.js"></script>


	<script src="../assets/js/fuelux/fuelux.spinner.min.js"></script>
	<script src="../assets/js/ace-elements.min.js"></script>
	<script src="../assets/js/ace.min.js"></script>
	<script src="../js/food/public/foodshow.js"></script>
	<!-- stickUP -->
	<script>
	jQuery(function($) {
		$(document).ready( function() {

		});
	});
	</script>
              <!-- /js -->


          </body>
          </html>