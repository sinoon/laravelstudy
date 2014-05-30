<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8" />
		<title>快捷订餐管理系统 for 毕业设计 -- 管理员登录页面</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
		<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="{{ asset('assets/css/ace-fonts.css') }}" />

		<!-- ace styles -->

		<link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/public/jquery.remodal.css') }}">
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
		
		
			<div class="main-content">

				<div class="row">

					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="icon-leaf green"></i>
									<span class="red">快捷订餐</span>
									<span class="white">后台管理系统</span>
								</h1>
								<h4 class="blue">&copy; 2014 浙江财经大学 商楠 for 毕业设计</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												请登录
											</h4>

											<div class="space-6"></div>

											
												{{Form::open()}}
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="username" type="text" class="form-control" placeholder="用户名" />
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="password" type="password" class="form-control" placeholder="密码" />
															<i class="icon-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input name="remember" type="checkbox" class="ace" />
															<span class="lbl"> 记住我</span>
														</label>

														<button id="restaurant-login" type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="icon-key"></i>
															登录
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
												{{Form::close()}}
											
		
										</div><!-- /widget-main -->

									</div><!-- /widget-body -->
								</div><!-- /login-box -->
							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->

		<!-- basic scripts -->
		
		<!-- remodal -->
		<div class="remodal" data-remodal-id="remodal-alert">

		</div>
		<!-- /.remodal -->
		
		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='{{ asset('assets/js/jquery-2.0.3.min.js') }}'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->

		
		<script type="text/javascript" src="{{ asset('js/public/jquery.remodal.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/admin/base.js') }}"></script>

		<script>
			@if (Session::get('flash_error'))
				remodal_alert('{{Session::get('flash_error')}}');
			@endif
		</script>
		
	</body>
</html>
