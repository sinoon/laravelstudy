<!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/css/bootstrap.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/css/scojs.css">
	<link rel="stylesheet" href="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/css/sco.message.css">
	@section('css')

	@show
	<title>会员注册</title>
</head>
<body>
	<div id="wrap">
	<!-- 顶头 -->
	<div class="navbar navbar-default navbar-fixed-top">
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
						<li><a href="#" target="_blank" data-toggle="modal" data-target="#myModal">会员登录</a></li>
						<li><a href="#" target="_blank">会员注册</a></li>
						<li><a href="#" target="_blank">餐厅加入</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /顶头 -->
<!-- 引入的内容 -->
@yield('register')
<!-- /引入的内容 -->

@yield('foot')



		<!-- /content -->
		<!-- js -->
		<script src="http://test-web.oss-cn-hangzhou.aliyuncs.com/mobile/jquery-2.1.0.js"></script>
		<script src="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/js/bootstrap.min.js"></script>
		<!-- stickUP -->
		<script src="http://test-web.oss-cn-hangzhou.aliyuncs.com/mobile/stickUp.min.js"></script>
		<script src="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/js/my.js"></script>
		<script>
		jQuery(function($) {
			$(document).ready( function() {
				$('.navbar-top').stickUp({
				});
				@if ((Session::get('error'))||($errors->first('username'))||($errors->first('password'))||($errors->first('captcha')))
					$('#myModal').modal('show');
				@endif




			});
		});
		</script>
		<script src="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/js/sco.modal.js"></script>
	              <!-- /js -->


	          </body>
	          </html>