@extends('layout.base')

@section('title')
	<title>快捷订餐系统 for 毕业设计 -- 顾客后台页面</title>
@stop


@section('css')
	<style type="text/css">
	.pic
	{
		margin-top:50px; 
		width:120px;
		margin-left:50px;
		margin-bottom:-60px;
	}

	.pic-profile
	{
		margin-left: 50px;
		margin-top:25px;
		/*text-align:center;
		margin-left: auto;
		margin-right: auto;*/
	}

	.panel-main
	{
		background-image:url("/img/background/rainbow.jpg"); 
	}

	.name
	{
		position:absolute;
		padding-left:200px;
		font-size:30px;
	}

	.dropdown
	{
		position:absolute;
	}

	.change
	{
		position:relative; 
		bottom:20px;
		padding:1px;
		color:white;
		text-decoration:none;
	}

	
	.change:hover
	{
		text-decoration:none;
		background-color:black;
		color:white;
	}

	.order{
		display:none;
	}
	.profile {
		display:none;
	}
	.security{
		display:none;
	}
	.comment{
		display: none;
	}

	.content-text
	{
		color:#1d1626;
	}
	</style>
@stop


@section('content')

<!-- 内容 -->

<div class="container">
	<div class="row well">
		<div class="col-md-2">
			<ul class="nav nav-pills nav-stacked well">
				<li class="active"><a href="#message"><i class="fa fa-envelope"></i> 信息</a></li>
				<li><a href="#order"><i class="fa fa-home"></i> 订单</a></li>
				<li><a href="#profile"><i class="fa fa-user"></i> 个人信息</a></li>
				<li><a href="#security"><i class="fa fa-key"></i> 安全</a></li>
				<li><a href="#comment"><i class="fa"></i>我的评论</a></li>
				<li><a href="/logout"><i class="fa fa-sign-out"></i> 登出</a></li>
			</ul>
		</div>
		<div class="col-md-10">
			<!-- message -->
			<div class="message">
				<div class="panel-main">
					<img class="pic img-circle" src="http://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/twDq00QDud4/s120-c/photo.jpg" alt="...">
					<div class="name"><small>Welcome , {{ $user->username }}</small></div>
					<a href="#" class="btn btn-xs btn-primary pull-right" style="margin:10px;"><span class="glyphicon glyphicon-picture"></span> 更改背景图片</a>
				</div>

				<br><br><br>
				<ul class="nav nav-tabs" id="myTab">
					<li class="active"><a href="#inbox" data-toggle="tab"><i class="fa fa-envelope-o"></i> 收件箱</a></li>
					<li><a href="#sent" data-toggle="tab"><i class="fa fa-reply-all"></i> 发件箱</a></li>
					<li><a href="#assignment" data-toggle="tab"><i class="fa fa-file-text-o"></i> 任务</a></li>
					<li><a href="#event" data-toggle="tab"><i class="fa fa-clock-o"></i> 活动</a></li>
				</ul>

				<div class="tab-content">
					<!-- inbox -->
					<div class="tab-pane active" id="inbox">
						
						@foreach ($message as $mess)
						
						<!-- 依次foreach -->	
						<div class="btn-toolbar well well-sm" role="toolbar"  style="margin:0px;">
							<div class="btn-group"><input type="checkbox" id="{{$mess->id}}"></div>  
							<a  id="#{{$mess->id}}">
								<div class="btn-group col-md-3">{{$mess->sent}}</div>
								<div class="btn-group col-md-8">
									<b>{{$mess->title}}</b> 
									<div class="pull-right">
										<i class="glyphicon glyphicon-time"></i> {{date($mess->created_at)}}
										@if ($mess->status == 0)
										<button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg" disabled="disabled"><i class="fa fa-share-square-o"> 回复</i></button>
										@else									  
										<button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg" ><i class="fa fa-share-square-o"> 回复</i></button>

										@endif
									</div>
								</div> 
							</a>
						</div>
						<div id="inbox{{$mess->id}}" class="collapse out well">{{$mess->content}}</div>
						@endforeach

						<br>
						<button id="allcheck"  class="btn btn-primary btn-xs" ><i class="fa fa-check-square-o"></i> 全选</button>
						<button id="falsecheck"  class="btn btn-primary btn-xs" ><i class="fa fa-check-square-o"></i> 反选</button>
						<button id="delete"  class="btn btn-primary btn-xs" ><i class="fa fa-check-square-o"></i> 删除选中的内容</button>
						
					</div>
					<!-- end of inbox -->
					<!-- sent -->
					<div class="tab-pane" id="sent">
						@foreach ($message_sent as $mess)
						<a type="button" data-toggle="collapse" data-target="#{{$mess->id}}">

							<div class="btn-toolbar well well-sm" role="toolbar"  style="margin:0px;">
								<div class="btn-group"><input type="checkbox"></div>
								<div class="btn-group col-md-3">{{$mess->receive}}</div>
								<div class="btn-group col-md-8"><b>{{$mess->title}}</b> <div class="pull-right"><i class="glyphicon glyphicon-time"></i> {{data($mess->created_at)}}</div> </div>
							</div>
						</a>
						<div id="{{$mess->id}}" class="collapse out well">{{$mess->content}}</div>
						@endforeach
						<br>
						<button class="btn btn-primary btn-xs"><i class="fa fa-check-square-o"></i> 删除选中的内容</button>
					</div>
					<!-- end of sent -->
					<!-- assignmert -->
					<div class="tab-pane" id="assignment">
						<a href=""><div class="well well-sm" style="margin:0px;">暂时没有准备任务给你<span class="pull-right"><i class="glyphicon glyphicon-time"></i> 所以时间也就待定了~ </span></div></a>        
					</div>
					<!-- end of assignment -->
					<!-- event -->
					<div class="tab-pane" id="event">
						@foreach ($event as $events)
						<div class="media">
							<a class="pull-left" href="#">
								<img class="media-object img-thumbnail" width="100" src="{{$events->imgaddress}}" alt="...">
							</a>
							<div class="media-body">
								<h4 class="media-heading">{{$events->title}}</h4>
								{{$events->content}}
							</div>
						</div>
						@endforeach
					</div>
					<!-- end of event -->
				</div>
				<!-- end fo tab-content -->
			</div>
			<!-- end of message -->
			<!-- order -->
			<div class="order">
				<table class="table table-bordered">
					@foreach ($order as $key => $orders)
					<tbody>
						<tr>
							<td colspan="18">
								<span>订单编号：{{$orders->oid}}　　</span> |
								<span>　　成交时间：{{$orders->created_at}}　　</span>|
								<span>　　送餐地址：{{$orders->address}}</span>
							</td>
						</tr>
						@if (count($fullorder[0]) == 1)
							<tr>
								<td colspan="5"> 
									<div class="col-md-2">
										<img src="{{ asset('restaurant/'.$fullorder->username.'/foodimg/'.$fullorder->savename) }}" class="img-responsive" alt="{{$fullorder->name}}">
									</div>
									{{$fullorder->name}}
								</td>
								<td colspan="2">
									{{$fullorder->price}}
								</td>
								<td colspan="2">
									{{$fullorder->num}}
								</td>
								<td colspan="2">
									{{ $fullorder->price * $fullorder->num }}
								</td>
								<td colspan="4">
									@if ($orders->status == 1)
									<span>已下单</span>
									<a href="###" class="btn btn-primary">取消订单</a>
									@endif
									@if ($orders->status == 2)
									<span>正在配送中</span>
									@endif
									@if ($orders->status == 3)
									<a href="###" class="btn btn-primary">评价</a>
									@endif
								</td>
							</tr>
						@else
							@foreach ($fullorder[0] as $key2 => $fullorders)
							<tr>
								<td colspan="3"> 
									<div class="">
										<img style="width:60px;height:60px;" src="{{ asset('restaurant/'.$fullorders['username'].'/foodimg/'.$fullorders['savename']) }}" class="img-responsive" alt="{{$fullorders['name']}}">
									</div>
									{{$fullorders['name']}}
								</td>
									<td colspan="2">
										{{$fullorders['price']}} 元
									</td>
									<td colspan="2">
										{{$fullorders['num']}} 份
									</td>
									@if ($key2 == 0)
										{{-- 如果是第一次 --}}
										<td rowspan="{{count($fullorder[0])}}">
											{{$orders->money}} 元
										</td>
										<td rowspan="{{count($fullorder[0])}}">
											@if ($orders->status == 1)
												<span>已下单</span>
												<a href="###" class="btn btn-primary">取消订单</a>
											@endif
											@if ($orders->status == 2)
												<span>正在配送中</span>
											@endif
											@if ($orders->status == 3)
												<a href="###" class="btn btn-primary">评价</a>
											@endif
										</td>
									@endif
								</tr>
							@endforeach
						@endif
					</tbody>
					@endforeach
					
				</table>
			</div>
			<!-- end of order -->
			<!-- profile -->
			<div class="profile content-text">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">用户信息</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3">
								<img class="pic-profile img-circle"
								src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100"
								alt="User Pic">
							</div>
							<div class="col-md-9" style="background:none;">
								<strong>{{--$info->username--}}</strong><br>
								<table class="table table-condensed table-responsive table-user-information">
									<tbody>
										<tr>
											<td>用户等级:</td>
											<td>{{-- 待定的呦~ --}}</td>
										</tr>
										<tr>
											<td>用户名:</td>
											<td>{{$user->username}}</td>
										</tr>
										<tr>
											<td>手机号</td>
											<td id="registmobile">{{$customer->mobile}}</td>
										</tr>
										<tr>
											<td>生日</td>
											<td id="birthday">{{$customer->birthday}}</td>
										</tr>
										<tr>
											<td>性别</td>
											@if ($customer->sex == "")
												<td id="sex">未填写</td>
											@else
												<td id="sex">{{$customer->sex}}</td>
											@endif
										</tr>
										<tr>
											<td>邮箱：</td>
											<td id="email">{{$customer->email}}</td>
										</tr>
										<tr>
											<td>注册时间:</td>
											<td>{{$user->created_at}}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button id="changeinfo" class="btn  btn-primary" type="button"
						data-toggle="tooltip"
						data-original-title="修改个人信息"><i class="glyphicon glyphicon-edit"></i></button>
						<button style="display:none;" id="donechange" class="btn  btn-primary" type="button"
						data-toggle="tooltip"
						data-original-title="修改生效"><i class="glyphicon glyphicon-saved"></i></button>
						<button style="display:none;" id="cancel" class="btn btn-danger" type="button"
						data-toggle="tooltip"
						data-original-title="取消编辑"><i class="glyphicon glyphicon-remove-circle"></i></button>
		<!-- 				<span class="pull-right">
							<button class="btn btn-primary" type="button"
							data-toggle="tooltip"
							data-original-title="Edit this user"><i class="glyphicon glyphicon-edit	"></i></button>
							
						</span> -->
					</div>
				</div>
			</div>
			<!-- end of profile -->
			<!-- security -->
			<div class="security">
				<div class="panel panel-success profile-text">
					<div class="panel-heading">用户名：{{$user->username}}</div>
					<div class="panel-body">
						<h3>修改密码</h3>
						<hr>
						<div class="row">
							<div class="col-md-6 col-md-offset-3">

								<div class="form-group">
								  <label class="control-label" for="old_password">原密码</label>
								  <input type="password" class="form-control" id="old_password">
								</div>
								<div class="form-group">
								  <label class="control-label" for="newpassword">新密码</label>
								  <input type="password" class="form-control" id="newpassword">
								</div>
								<div class="form-group">
								  <label class="control-label" for="confirm_password">再次输入</label>
								  <input type="password" class="form-control" id="confirm_password">
								</div>
								 <button class="btn btn-primary center-block" id="changepassword">确认修改</button>
							</div>
						</div>
						<hr>
						<div class="well">
							<strong>{{--$info->username--}}</strong><br>
							<span>你的账号安全系数为：40%</span>
							<div class="progress progress-striped">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
									<span class="sr-only">40% Complete (success)</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-horizontal">
									<div class="form-group">
										<label class="col-sm-2 control-label">邮箱</label>
										<div class="col-sm-10">
											<p class="form-control-static">{{$customer->email}}</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">状态</label>
										@if ($customer->email_status == 0)

										<div class="col-sm-6">
											<p class="form-control-static">尚未验证</p>
										</div>
										<div class="col-sm-4">
											<a id="ineedconfirmeamil" href="#" class="btn btn-info">马上验证</a>
										</div>
										@else
										<div class="col-sm-6">
											<p class="form-control-static">已完成验证</p>
										</div>
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-horizontal">
									<div class="form-group">
										<label class="col-sm-2 control-label">手机号</label>
										<div class="col-sm-10">
											<p class="form-control-static">{{$customer->mobile}}</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">状态</label>
										@if ($customer->mobile_status == 0)

										<div class="col-sm-6">
											<p class="form-control-static">发送验证码</p>
										</div>
										<div class="col-sm-4">
											<a id="confirm_mobile" href="###" class="btn btn-info">马上验证</a>
										</div>

										@else
										<div class="col-sm-6">
											<p class="form-control-static">已完成验证</p>
										</div>
										@endif
									</div>
									@if (!is_null($confirm_mobile))
									<div class="form-group">
										<label class="col-sm-2 control-label" id="confirm_code">验证码</label>
										<div class="col-sm-6">
											<input type="text" class="form-control">
										</div>
										<div class="col-sm-4">
											<a id="check_confirm_mobile" href="###" class="btn btn-primary">验证</a>
										</div>
									</div>
									@endif
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button class="btn  btn-primary" type="button"
						data-toggle="tooltip"
						data-original-title="Send message to user"><i class="icon-envelope icon-white"></i></button>
						<span class="pull-right">
							<button class="btn btn-warning" type="button"
							data-toggle="tooltip"
							data-original-title="Edit this user"><i class="icon-edit icon-white"></i></button>
							<button class="btn btn-danger" type="button"
							data-toggle="tooltip"
							data-original-title="Remove this user"><i class="icon-remove icon-white"></i></button>
						</span>
					</div>
				</div>
			</div>
			<!-- end of security -->
			<!-- comment -->
			<div class="comment">
			{{--	@foreach ($comment as $comment)  --}}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">订单号：1212   糖醋鸡米花   第一餐厅  2014年5月13日23:02:47</h3>
					</div>
					<div class="panel-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, voluptatibus, doloremque qui necessitatibus asperiores dolorem consequatur illum totam animi ut explicabo nam similique facere reprehenderit distinctio perspiciatis soluta maxime autem.
					</div>
				</div>
				{{-- @endforeach --}}
			</div>
			<!-- /.comment -->
		</div>
		<!-- end of col-md-10 -->
	</div>
</div>
<!-- 内容结束 -->

<!-- modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content"><br/><br/>
			<form class="form-horizontal">
				<fieldset>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-2 control-label" for="body">标题</label>  
						<div class="col-md-8">
							<input id="body" name="body" type="text" placeholder="你想要发送的题目" class="form-control input-md">

						</div>
					</div>

					<!-- Textarea -->
					<div class="form-group">
						<label class="col-md-2 control-label" for="message">内容</label>
						<div class="col-md-8">                     
							<textarea class="form-control" id="message" name="message"></textarea>
						</div>
					</div>

					<!-- Button -->
					<div class="form-group">
						<label class="col-md-2 control-label" for="send"></label>
						<div class="col-md-8">
							<button id="send" name="send" class="btn btn-primary">发送</button>
						</div>
					</div>

				</fieldset>
			</form>

		</div>
	</div>
</div>
<!-- end of modal -->


<!-- modal -->
<!-- 确实是否删除模态框 -->
<div class="remodal" data-remodal-id="confirm">
	<h1>确定删除选中？</h1>
	<p>
		此项操作是硬删除，删除无法恢复
	</p>
	<p>
		我知道你不会回头的！
	</p>
	<p>
		但是我还是忍不住问你
	</p>
	<br>
	<a class="remodal-cancel" href="#">浪子回头金不换</a>
	<a class="remodal-confirm" href="#">人生有舍有得</a>
</div>
<!-- 结束——确实删除模态框 -->
<!-- 未选中提示模态框 -->
<div class="remodal" data-remodal-id="joke">
	<h1>你什么都没有选择哦~</h1>
	<p>
		什么都没有选中就点我。。。
	</p>
	<p>
		以后还能不能一起好好玩耍了？
	</p>
	<br>
	<a class="remodal-cancel" href="#">好了，我知道错了~</a>
	<!-- <a class="remodal-confirm" href="#">人生有舍有得</a> -->
</div>
<!--  结束—— 未选中提示模态框 -->

<!-- 请求验证邮箱成功提示框 -->
<div class="remodal" data-remodal-id="placeconfirmemail">
	<h1>OK!已经把发送验证邮件的请求加入到服务器队列中</h1>
	<p>
		请稍后去验证
	</p>
	<br>
	<a class="remodal-confirm" href="#">恩，知道了~</a>
	<!-- <a class="remodal-confirm" href="#">人生有舍有得</a> -->
</div>
<!--  结束—— 请求验证邮箱成功提示框 -->

<!-- 修改密码提示 -->
<div class="remodal" data-remodal-id="change_password">
	
	<!-- <a class="remodal-confirm" href="#">恩，知道了~</a> -->
</div>
<!-- /.修改密码提示 -->
<!-- end of modal -->

@stop

@section('include-js')
	<script type="text/javascript" src="/js/users/profile.js"></script>
@stop