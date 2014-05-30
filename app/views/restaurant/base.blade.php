<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	@section('title')
	<title>快捷订餐后台管理系统 for 毕业设计 -- 管理员模块</title>
	@show
	
	<script type="text/javascript">
	var active_id = "{{$active}}";
	</script>
	


	<meta name="description" content="Dynamic tables and grids using jqGrid plugin" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- basic styles -->

	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/css/datepicker.css') }}" />

	<link rel="stylesheet" href="{{ asset('css/public/jquery.remodal.css') }}">
	
		<!--[if IE 7]>
		  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-ie7.min.css') }}" />
		  <![endif]-->

	<link rel="stylesheet" href="{{ asset('assets/css/ace-fonts.css') }}">

	<!-- include css -->
	@section('include-css')

	@show

	<!-- ace styles -->
	<link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}">


	<!--[if lte IE 8]>
		<link rel="stylesheet" href="assets/css/ace-ie.min.css" />
	<![endif]-->

		

	<!-- ace settings handler -->
	<script src="{{ asset('assets/js/ace-extra.min.js') }}" ></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="{{ asset('assets/js/html5shiv.js') }}"></script>
		<script src="{{ asset('assets/js/respond.min.js') }}"></script>
	<![endif]-->
</head>

<body>
	<div class="navbar navbar-default" id="navbar">
		<script type="text/javascript">
			try{ace.settings.check('navbar' , 'fixed')}catch(e){}
		</script>

		<div class="navbar-container" id="navbar-container">
			<div class="navbar-header pull-left">
				<a href="#" class="navbar-brand">
					<small>
						<i class="icon-leaf"></i>
						快捷订餐后台管理系统 for 毕业设计 -- 餐厅模块
					</small>
				</a><!-- /.brand -->
			</div><!-- /.navbar-header -->
			<div class="navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">
					<li class="purple">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<i class="icon-bell-alt icon-animated-bell"></i>
							<span class="badge badge-important">8</span>
						</a>

						<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
							<li class="dropdown-header">
								<i class="icon-warning-sign"></i>
								8 Notifications
							</li>

							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">
											<i class="btn btn-xs no-hover btn-pink icon-comment"></i>
											New Comments
										</span>
										<span class="pull-right badge badge-info">+12</span>
									</div>
								</a>
							</li>

							<li>
								<a href="#">
									<i class="btn btn-xs btn-primary icon-user"></i>
									Bob just signed up as an editor ...
								</a>
							</li>

							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">
											<i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>
											New Orders
										</span>
										<span class="pull-right badge badge-success">+8</span>
									</div>
								</a>
							</li>

							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">
											<i class="btn btn-xs no-hover btn-info icon-twitter"></i>
											Followers
										</span>
										<span class="pull-right badge badge-info">+11</span>
									</div>
								</a>
							</li>

							<li>
								<a href="#">
									See all notifications
									<i class="icon-arrow-right"></i>
								</a>
							</li>
						</ul>
					</li>

					<li class="green">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<i class="icon-envelope icon-animated-vertical"></i>
							<span class="badge badge-success">5</span>
						</a>

						<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
							<li class="dropdown-header">
								<i class="icon-envelope-alt"></i>
								5 Messages
							</li>

							<li>
								<a href="#">
									<img src="{{ asset('assets/avatars/avatar.png') }}" class="msg-photo" alt="Alex's Avatar" />
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">Alex:</span>
											Ciao sociis natoque penatibus et auctor ...
										</span>

										<span class="msg-time">
											<i class="icon-time"></i>
											<span>a moment ago</span>
										</span>
									</span>
								</a>
							</li>

							<li>
								<a href="#">
									<img src="{{ asset('assets/avatars/avatar3.png') }}" class="msg-photo" alt="Susan's Avatar" />
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">Susan:</span>
											Vestibulum id ligula porta felis euismod ...
										</span>

										<span class="msg-time">
											<i class="icon-time"></i>
											<span>20 minutes ago</span>
										</span>
									</span>
								</a>
							</li>

							<li>
								<a href="#">
									<img src="{{ asset('assets/avatars/avatar4.png') }}" class="msg-photo" alt="Bob's Avatar" />
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">Bob:</span>
											Nullam quis risus eget urna mollis ornare ...
										</span>

										<span class="msg-time">
											<i class="icon-time"></i>
											<span>3:15 pm</span>
										</span>
									</span>
								</a>
							</li>

							<li>
								<a href="inbox.html">
									See all messages
									<i class="icon-arrow-right"></i>
								</a>
							</li>
						</ul>
					</li>

					<li class="light-blue">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="{{ asset('assets/avatars/user.jpg') }}" alt="Jason's Photo" />
							<span class="user-info">
								<small>Welcome,</small>
								{{--$restaurant->username--}}
							</span>

							<i class="icon-caret-down"></i>
						</a>

						<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<li>
								<a href="#">
									<i class="icon-cog"></i>
									设置
								</a>
							</li>

							<li>
								<a href="#">
									<i class="icon-user"></i>
									修改密码
								</a>
							</li>

							<li class="divider"></li>
								<li>
									<a href="/logout">
										<i class="icon-off"></i>
										登出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						<li id="dashboard">
							<a href="{{ asset('restaurant/index') }}">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 管理面板 </span>
							</a>
						</li>

						<li id="profile">
							<a href="{{ asset('restaurant/profile') }}">
								<i class="icon-text-width"></i>
								<span class="menu-text"> 餐厅设置 </span>
							</a>
						</li>

						<li>
							<a href="" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 菜品管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li id="food">
									<a href="{{ asset('restaurant/food') }}">
										<i value="总揽" class="icon-double-angle-right"></i>
										总揽
									</a>
								</li>

								<li id="foodmanage">
									<a href="{{ asset('restaurant/foodmanage') }}">
										<i value="增加 &amp; 删除 &amp; 修改" class="icon-double-angle-right"></i>
										增加 &amp; 删除 &amp; 修改
									</a>
								</li>

								<li id="img-upload">
									<a href="{{ asset('restaurant/img-upload') }}">
										<i value="图片上传" class="icon-double-angle-right"></i>
										图片上传
									</a>
								</li>
							</ul>
						</li>

						<li id="allorder">
							<a href="{{ asset('restaurant/all-order') }}">
								<i class="icon-text-width"></i>
								<span class="menu-text"> 订单管理 </span>
							</a>
						</li>


						

						<li id="lookcomment">
							<a href="{{ asset('restaurant/comment') }}">
								<i class="icon-text-width"></i>
								<span class="menu-text"> 查看顾客评论 </span>
							</a>
						</li>
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div><!-- /.sildebar -->

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">管理面板</a>
							</li>

							<li>
								<a id="breadcrumb" href="#"></a>
							</li>
							<!-- sub-breadcrumb	 -->
						</ul><!-- .breadcrumb -->


					</div>

					<div class="page-content">
						<div class="page-header">
							<h1 id="page-breadcrumb">
								<!-- js put in -->
							</h1>
						</div><!-- /.page-header -->

						
							<!-- content -->
							@yield('content')
							<!-- /.content -->
						
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; 选择皮肤</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> 固定导航栏</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> 固定侧边栏</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> 固定页面内容顶部</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> 从右到左视图</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								包含在
								<b>.container</b>内
							</label>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		
		<!-- remodal -->
		<div class="remodal" data-remodal-id="remodal-alert">

		</div>
		<!-- /.remodal -->

		<!-- basic scripts -->

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

		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

		<script src="{{ asset('js/public/jquery.remodal.min.js') }}"></script>
		
		<script src="{{ asset('assets/js/typeahead-bs2.min.js') }}"></script>
		
		<script src="{{ asset('assets/js/date-time/bootstrap-datepicker.min.js') }}"></script>


		<!-- page specific plugin scripts -->
		@section('include-js')

		@show

		<!-- ace scripts -->
		<!-- // <script src="assets/js/ace-elements.min.js"></script> -->
		<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>

		<!-- // <script src="assets/js/ace.min.js"></script> -->
		<script src="{{ asset('assets/js/ace.min.js') }}"></script>

		<!-- inline scripts related to this page -->
		<script src="{{ asset('js/restaurant/base.js') }}"></script>
		
		<!-- specific javascript -->
		@section('javascript')

		@show

	</body>
</html>
