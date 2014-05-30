<!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link href="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/css/bootstrap.min.css" rel="stylesheet"> -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<!-- <link rel="stylesheet" href="../assets/css/ace.min.css" /> -->
	<link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}">
	<script src="{{asset('assets/js/ace-extra.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('assets/css/ace.fonts.css')}}">
	
	<style>
	#footer{
		height: 60px;
		background-color: #f5f5f5;
		width: 100%;
	}
	</style>

	<script type="text/javascript">
		
	</script>
	<link href="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/css/bootstrap.min.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="{{ asset('css/public/bootstrap.min.css') }}"> -->
	<title>订餐下单</title>
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
		<h1>
			订餐下单
		</h1>
	</div>
	<hr>
	<div class="row">
		<div class="panel-panel-info">
			
			<table class="table table-hover">
				<thead>
					<tr>
						<th>
							餐品名称
						</th>
						<th>
							价格
						</th>
						<th>
							购买份数
						</th>
						<th>
							总共
						</th>
						<th>
							操作
						</th>
					</tr>
				</thead>
				<tbody>
					{{Form::open()}}
						<!-- 准备foreach -->
						@foreach ($fullcart as $cart)
							<tr>
							
								<td>
									{{$cart->name}}
								</td>
								<td class="price">
									{{$cart->price}} 元
								</td>
								<td id="num">
									<input type="text"  id="spinner" name="food{{ $cart->foodid }}" value="{{$cart->num}}" />
<!-- 								<div class="input-group">
									<input type="text" class="input-mini " id="spinner1" maxlength="3" value="{{$cart->num}}">
									<div class="spinner-buttons input-group-btn btn-group-vertical">
										<button type="button" class="btn spinner-up btn-xs btn-info">
											<i class="icon-chevron-up"></i>							
										</button>
										<button type="button" class="btn spinner-down btn-xs btn-info">
											<i class="icon-chevron-down"></i>
										</button>
									</div>
								</div> -->
							
									 份
								</td>
								<td class="total">
									{{$cart->price*$cart->num}} 元
								</td>
								<td>
									<a id="{{$cart->foodid}}" href="###" class="btn btn-primary">删除</a>
								</td>
							</tr>
						@endforeach
						<!-- 结束foreach -->
				</tbody>
			</table>
			<hr>
			<div class="row">
				@foreach ($restnum as $key => $restnum)
				<span>在 <strong>{{$restnum->restaurantname}}</strong> 餐厅订餐 {{ $foodnum[$key] }}份，共计 {{ $money[$key] }} 元</span>

				@if ($restaurant[$key]->typeofdemand == 1)
					<span>起送要求：{{ $restaurant[$key]->demandfornum }} 份起送</span>
				@else
					<span>起送要求：消费{{ $restaurant[$key]->demandformoney }} 元起送</span>
				@endif
				<br>
				@endforeach
			</div>
			<div class="space-6"></div>


			<div class="row">
				<div class="pull-right">
					<a id="backtofood" href="#" class="btn btn-warning">返回菜品页面</a>

					<!-- <a href="###" type="submit" class="btn btn-success">确定下单</a> -->
					{{Form::submit("登入",array('class' => 'btn btn-primary'))}}
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>



<div class="space-24"></div>


<div id="footer">
	<div id="modal-footer">
		<div class="pull-right">
			<p>&copy;  2014 浙江财经大学 商楠</p>
			<p>
				For 毕业设计
			</p>
		</div>
	</div>
</div>


	<!-- /content -->
	<!-- js -->
	<!-- // <script src="../../js/public/jquery-2.1.0.min.js"></script> -->
	<script src="{{asset('js/public/jquery-2.1.0.min.js')}}" ></script>

	<!-- // <script src="../../js/public/bootstrap.min.js"></script> -->
	<script src="{{asset('js/public/bootstrap.min.js')}}" ></script>

	<!-- // <script src="../../assets/js/fuelux/fuelux.spinner.min.js"></script> -->
	<!-- // <script src="{{ asset('assets/js/fuelux/fuelux.spinner.min.js') }}" ></script> -->

	<!-- // <script src="../../assets/js/ace-elements.min.js"></script> -->
	<script src="{{ asset('assets/js/ace-elements.min.js') }}" ></script>

	<!-- // <script src="../../assets/js/ace.min.js"></script> -->
	<script src="{{ asset('assets/js/ace.min.js') }}" ></script>

	<!-- // <script src="../../js/order/order.js"></script> -->
	<script src="{{ asset('js/order/order.js') }}" ></script>
	<!-- stickUP -->
	<!-- 让footer始终处于页面底部 -->
	<script type="text/javascript">
			// Window load event used just in case window height is dependant upon images
			$(window).bind("load", function() {
				var footerHeight = 0,
				footerTop = 0,
				$footer = $("#footer");
				positionFooter();
				//定义positionFooter function
				function positionFooter() {
					//取到div#footer高度
					footerHeight = $footer.height();
					//div#footer离屏幕顶部的距离
					footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";
					/* DEBUGGING STUFF
						console.log("Document height: ", $(document.body).height());
						console.log("Window height: ", $(window).height());
						console.log("Window scroll: ", $(window).scrollTop());
						console.log("Footer height: ", footerHeight);
						console.log("Footer top: ", footerTop);
						console.log("-----------")
						*/
					//如果页面内容高度小于屏幕高度，div#footer将绝对定位到屏幕底部，否则div#footer保留它的正常静态定位
					if ( ($(document.body).height()+footerHeight) < $(window).height()) {
						$footer.css({
							position: "absolute",
							top: footerTop
						});/* .stop().animate({
							top: footerTop
						}); */
					} else {
						$footer.css({
							position: "static"
						});
					}
				}
				$(window).scroll(positionFooter).resize(positionFooter);

	
			});

	</script>
              <!-- /js -->


          </body>
          </html>