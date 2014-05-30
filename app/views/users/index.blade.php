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
	
	<style type="text/css">
	        body.modal-open #wrapfade{
	    -webkit-filter: blur(7px);
	    -moz-filter: blur(15px);
	    -o-filter: blur(15px);
	    -ms-filter: blur(15px);
	    filter: blur(15px);
	}
	.modal-backdrop {background: #f7f7f7;}
	</style>

	<title>主页</title>
</head>
<body data-spy="scroll" data-target="#example">

	  <!-- Button trigger modal -->
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">会员登录</h4>
	      </div>
	      <div class="modal-body">

	      	{{ Form::open(array('class' => 'form-horizontal'))  }}
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



	<div id="wrapfade">  
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


<div >

	<ul class="nav navbar-nav navbar-right">
		@if ($info!=null)
		<li><a href="#" target="_blank" data-toggle="modal" data-target="#myModal">欢迎回来！</a></li>
		<!-- <li><a href="#" target="_blank" data-toggle="modal" data-target="#myModal">{{$info->username}}</a></li> -->
		<li><a href="/logout" target="_self">登出</a></li>

		<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$info->username}}
			<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li>
					<div class="navbar-content">
						<div class="row">
							<div class="col-md-5">
								<img src="http://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/twDq00QDud4/s120-c/photo.jpg"
								alt="Alternate Text" class="img-responsive" />
								<p class="text-center small">
									<a href="#">更换照片</a></p>
								</div>
								<div class="col-md-7">
									<span>NickName</span>
									<p class="text-muted small">
										{{ $info->email }}</p>
										<div class="divider">
										</div>
										<a href="{{ '/profile/'.$info->username  }}" class="btn btn-primary btn-sm active">个人资料</a>
									</div>
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

			<li><a href="/register" target="_self">会员注册</a></li>
			<li><a href="#" target="_blank">餐厅加入</a></li>
		@endif
		
			</ul>


<!-- 				<ul  class="nav navbar-nav navbar-right">
					@if ($info!=null)
					<li><a href="#" target="_blank" data-toggle="modal" data-target="#myModal">欢迎回来！</a></li>
					<li><a href="#" target="_blank" data-toggle="modal" data-target="#myModal">{{$info->username}}</a></li>
					<li><a href="/logout" target="_self">登出</a></li>
					@else
					
						<li><a href="#" target="_blank" data-toggle="modal" data-target="#myModal">会员登录</a></li>

						<li><a href="/register" target="_self">会员注册</a></li>
						<li><a href="#" target="_blank">餐厅加入</a></li>
					@endif
				</ul> -->
</div>


			</div>
		</div>
	</div>

	<!-- head -->
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<a href="#" class="thumbnail">
					<img src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
				</a>
			</div>
			<div class="col-md-10 ">			
				<div class="input-group" style="margin:5%;">
					<span class="input-group-addon">搜索</span>
					<input type="text" class="form-control" placeholder="请输入要搜索的内容">
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
								<li class="active"><a href="#">A</a></li>
								<li><a href="#">B</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">C <b class="caret"></b></a>
									<ul class="dropdown-menu eye-protector-processed" style="-webkit-transition: background 0.3s ease; transition: background 0.3s ease; background-color: rgb(193, 230, 198);">
										<li><a href="#">C-1</a></li>
										<li><a href="#">C-2</a></li>
										<li><a href="#">C-3</a></li>
										<li class="divider"></li>
										<li class="dropdown-header eye-protector-processed" style="border-color: rgba(0, 0, 0, 0.34902); color: rgb(0, 0, 0);">C-4(不可选)</li>
										<li><a href="#">C-5</a></li>
										<li><a href="#">C-6</a></li>
									</ul>
								</li>
							</ul>
							<form class="navbar-form navbar-right">
								<input type="text" class="form-control col-lg-8" placeholder="sousuo">
							</form>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#">D</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">E <b class="caret"></b></a>
									<ul class="dropdown-menu eye-protector-processed" style="-webkit-transition: background 0.3s ease; transition: background 0.3s ease; background-color: rgb(193, 230, 198);">
										<li><a href="#">E-1</a></li>
										<li><a href="#">E-2</a></li>
										<li><a href="#">E-3</a></li>
										<li class="divider"></li>
										<li><a href="#">E-4</a></li>
									</ul>
								</li>
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
					<li><a  href="#today">今日销量榜<span class="badge ">10</span></a></li>
					<li><a  href="#week">周销量榜<span class="badge ">6</span></a></li>
					<li><a  href="#month">月销量榜<span class="badge ">10</span></a></li>
					<li><a  href="#quarter">季度销量<span class="badge ">15</span></a></li>
					<hr>
					<!-- <li><a href="#">服务水平排行榜<span class="badge pull-right">5</span></a></li>
					<li><a href="#">送餐速度排行榜<span class="badge pull-right">12</span></a></li>
					<li><a href="#">味道可口排行榜<span class="badge pull-right">19</span></a></li> -->
				</ul>
				<!-- <img src="img/zuoce.jpg" style="width:100%" class="img-thumbnail" alt=""> -->
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
				<!-- 今日销量榜 -->
				<div class="row">
					<section id="today">
						<h1 >
							今日销量榜
						</h1>
						<hr>
						<div class="col-md-6">
							<div class="media">
								<div class="col-md-8">
									<a class="pull-left thumbnail btn-block" href="#">
										<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Top 1</h4>
									<p>
										食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
									</p>
								</div>
							</div>

							<div class="media">
								<div class="col-md-8">
									<a class="pull-left thumbnail btn-block" href="#">
										<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Top 3</h4>
									<p>
										食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
									</p>
								</div>
							</div>

							<div class="media">
								<div class="col-md-8">
									<a class="pull-left thumbnail btn-block" href="#">
										<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Top 5</h4>
									<p>
										食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
									</p>
								</div>
							</div>

							<div class="media">
								<div class="col-md-8">
									<a class="pull-left thumbnail btn-block" href="#">
										<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Top 7</h4>
									<p>
										食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
									</p>
								</div>
							</div>

							<div class="media">
								<div class="col-md-8">
									<a class="pull-left thumbnail btn-block" href="#">
										<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Top 9</h4>
									<p>
										食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
									</p>
								</div>
							</div>

						</div>
						<div class="col-md-6">
							<div class="media">
								<div class="col-md-8">
									<a class="pull-left thumbnail btn-block" href="#">
										<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Top 2</h4>
									<p>
										食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
									</p>
								</div>
							</div>


							<div class="media">
								<div class="col-md-8">
									<a class="pull-left thumbnail btn-block" href="#">
										<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Top 4</h4>
									<p>
										食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
									</p>
								</div>
							</div>


							<div class="media">
								<div class="col-md-8">
									<a class="pull-left thumbnail btn-block" href="#">
										<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Top 6</h4>
									<p>
										食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
									</p>
								</div>
							</div>

							<div class="media">
								<div class="col-md-8">
									<a class="pull-left thumbnail btn-block" href="#">
										<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Top 8</h4>
									<p>
										食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
									</p>
								</div>
							</div>

							<div class="media">
								<div class="col-md-8">
									<a class="pull-left thumbnail btn-block" href="#">
										<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Top 10</h4>
									<p>
										食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
									</p>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- /今日销量榜 -->
				<!-- 周月季度 navbar -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#week" data-toggle="tab">周销量</a></li>
					<li><a href="#month" data-toggle="tab">月销量</a></li>
					<li><a href="#quarter" data-toggle="tab">季度销量</a></li>
				</ul>
				<!-- /周月季度 navbar -->
				<!-- Tab panes -->
				<div class="tab-content">
					<!-- 周销量 -->
					<div class="tab-pane active in fade" id="week">
						<br>
						<section id="week">
							<div class="col-md-6">
								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 1</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>

								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 2</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>

								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 3</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 4</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>


								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 5</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>


								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 4</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>
							</div>					
						</section>
					</div>
					<!-- /周销量 -->
					<!-- 月销量 -->
					<div class="tab-pane  fade" id="month">
						<br>
						<section id="month">
							<div class="col-md-6">
								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 1</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>

								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 2</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>

								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 4</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 4</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>


								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 5</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>


								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 4</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>
							</div>
						</section>
					</div>
					<!-- /月销量 -->
					<!-- 季度销量 -->
					<div class="tab-pane fade" id="quarter">
						<br>
						<section id="quarter">
							<div class="col-md-6">
								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 1</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>

								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 2</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>

								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 4</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">

								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 4</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>


								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 5</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>


								<div class="media">
									<div class="col-md-8">
										<a class="pull-left thumbnail btn-block" href="#">
											<img class="media-object" src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Top 4</h4>
										<p>
											食品名称, 价格 评分 起送价 送餐时间 份数 待定信息占位符
										</p>
									</div>
								</div>
							</div>
						</section>
					</div>
					<!-- /季度销量 -->
				</div>
				<!-- /Tab panes -->
			</div>
			<!-- /中间 -->
			<!-- 右侧 -->
			<div class="col-md-2">
				<ul class="nav nav-pills nav-stacked affix ">
					<li class="active"><a href="#">购买的商品<span class="badge">10</span></a></li>
					<li><a href="#">Profile</a></li>
					<li><a href="#">Messages</a></li>
				</ul>



			</div>
			<!-- /右侧 -->
		</div>
	</div>
	<!-- /content -->

<!-- foot -->
<footer class ="modal-footer">
  <p>&copy; Copyright 2014 浙江财经大学 商楠</p>
  <p>
  	For 毕业设计
  </p>
</footer>
<!-- /foot -->
</div>

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
			@if ($info!=null)
			$.scojs_message('{{$info->username . " ,欢迎回来！"}}', $.scojs_message.TYPE_OK);
			@endif
		});
	});
	</script>
	<script src="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/js/sco.modal.js"></script>
	<script src="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/js/sco.message.js"></script>
              <!-- /js -->


          </body>
          </html>