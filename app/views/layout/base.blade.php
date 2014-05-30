<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	@section('include-css')
		
	@show
	
	<link rel="stylesheet" href="/css/public/jquery.remodal.css">

	<link rel="stylesheet" href="{{ asset('css/public/bootstrap.min.css') }}">
	
	@section('css')
		
	@show
	
	@section('head-js')
		
	@show

	@section('head-javascript')
		
	@show
		
	@section('title')
		<title>快捷订餐 for 毕业设计</title>
	@show

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
		<!-- 			<li class="dropdown">
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
					</li> -->
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (isset($user))
						<li><a href="#" target="_blank" data-toggle="modal" data-target="#myModal">欢迎回来！</a></li>
						<li><a href="/logout" target="_self">登出</a></li>

						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$user->username}}
							<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<div class="navbar-content">
											<div class="col-md-5">
												<img src="http://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/twDq00QDud4/s120-c/photo.jpg"
												alt="Alternate Text" class="img-responsive" />
												<p class="text-center small">
													<a href="#">更换照片</a>
												</p>
											</div>

											<div class="col-md-7">
												<a href="{{ '/profile/'.$user->username  }}" class="btn btn-primary btn-sm active">个人资料</a>
												<div class="divider"></div>
											</div>
									</div>
									<div class="navbar-footer">
										<div class="navbar-footer-content">
											<div class="row">
												<div class="col-md-6">
													<a href="#" class="btn btn-default btn-sm">修改密码</a>
												</div>
												<div class="col-md-6">
													<a href="/logout" class="btn btn-default btn-sm pull-right">登出</a>
												</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</li>

					@else

						<li><a href="#" target="_blank" data-toggle="modal" data-target="#myModal">会员登录</a></li>
						<li><a href="{{ asset('register') }}" target="_self">会员注册</a></li>
						<li><a href="{{ asset('register-for-restaurant') }}" target="_blank">餐厅加入</a></li>
						<li><a href="{{ asset('restaurant/login') }}" target="_blank">餐厅登录</a></li>
					@endif
				</ul>
			</div>
		</div>
	</div>
	<!-- /.nav -->

	<!-- content -->
	@yield('content')
	<!-- /.content -->
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">会员登录</h4>
				</div>
				<div class="modal-body">

					{{ Form::open(array('class' => 'form-horizontal','action' => 'UsersController@login' ))  }}
					{{$errors->first('username','<div class="alert alert-danger">:message</div>')}}
					{{$errors->first('password','<div class="alert alert-danger">:message</div>')}}
					{{$errors->first('captcha','<div class="alert alert-danger">:message</div>')}}
					@if (Session::get('error'))
					<div class="alert alert-danger">{{Session::get('error')}}</div>
					@endif
					<div class="form-group">
						<label for="inputEmail" class="col-sm-2 control-label">用户名</label>
						<div class="col-sm-10">
							{{  Form::text('username','', array('class' => 'form-control','placeholder'=>'username')  )  }}
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class=" col-sm-2 control-label">密码</label>
						<div class="col-sm-10">
							{{Form::password('password',array('class'=> 'form-control','placeholder'=>'password'))}}
						</div>
					</div>
					<div class="form-group">
						<label for="captcha" class="col-sm-2 control-label">验证码</label>
						<div class="col-sm-10">
							{{Form::text('captcha', '' ,array('class'=> 'form-control','placeholder'=>'captcha'))}}

						</div>
					</div>

					<div class="form-group">

						<div class="col-sm-offset-2 col-sm-5">
							<img src="{{Captcha::img()}}" alt="" id="code">
							<a href="javascript:void(change_code(this));">看不清</a>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									{{Form::checkbox('remeber')}}
									记住我
								</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
						{{Form::submit("登入",array('class' => 'btn btn-primary'))}}
					</div>
					{{Form::close()}}
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- foot -->
	<div class ="modal-footer">
		<div class="pull-right">
			<p>&copy; Copyright 2014 浙江财经大学 商楠</p>
			<p>
				For 毕业设计
			</p>
		</div>
	</div>
	<!-- /foot -->
	
	<div class="remodal" data-remodal-id="remodal-alert">

	</div>

	<!-- js -->
	<script src="{{asset('js/public/jquery-2.1.0.min.js')}}" ></script>
	<script src="{{asset('js/public/bootstrap.min.js')}}" ></script>

	<script src="{{ asset('assets/js/fuelux/fuelux.spinner.min.js') }}"></script>
	<script src="{{	asset('assets/js/fuelux/fuelux.spinner.min.js') }}"></script>
	<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
	<script src="{{ asset('assets/js/ace.min.js') }}"></script>
	
	<script src="{{ asset('js/public/jquery.remodal.min.js') }}"></script>

	
	<script src="{{ asset('js/public/base.js') }}"></script>
	
	@section('include-js')
		
	@show

	@section('javascript')
		
	@show

</body>
</html>