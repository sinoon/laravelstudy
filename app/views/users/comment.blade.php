@extends('layout.base')

@section('title')
<title>快捷订餐系统 for 毕业设计 -- 评价页面</title>
@stop

@section('content')
<div class="container">
	<div class="row">
		<h3>评价</h3>
		<hr>
	</div>
	
<!-- food -->
<div class="container">
	<div class="row">
		<h1>{{$food->name}}</h1>
	</div>	
	<hr>
	<div class="row">
		<div class="col-md-6">
				@if ($food->savename)
					<a href="{{ asset('restaurant/'.$restaurant->username.'/foodimg/'.$food->savename) }}">
					<img class="img-responsive" src="{{ asset('restaurant/'.$restaurant->username.'/foodimg/'.$food->savename) }}" alt="">
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
			  <dd>{{$food->note}}</dd>
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

			<hr>

		</div>
	</div>
</div>
<!-- /.food -->
<hr>
	<!-- order -->
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span>订单编号：{{$order->oid}}　　</span> |
				<span>　　成交时间：{{$order->created_at}}　　</span>|
				<span>　　送餐地址：{{$order->address}}</span>
			</div>
			<div class="panel-body">
				<!-- comment -->
				<div class="row">
					<!-- <form class="form-horizontal" role="form"> -->
						{{Form::open(array('class' => 'form-horizontal','action' => 'OrderController@PutComment'))}}
						<input name="fullorderid" type="hidden" value="{{$fullorderid}}">
						<div class="form-group">
							<label  class="col-sm-2 control-label">口味</label>
							<div class="col-sm-2">
								<select name="taste" class="form-control">
									<option value="1">1星</option>
									<option value="2">2星</option>
									<option value="3">3星</option>
									<option value="4">4星</option>
									<option value="5">5星</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-2 control-label">送餐速度</label>
							<div class="col-sm-2">
								<select name="fast" class="form-control">
									<option value="1">1星</option>
									<option value="2">2星</option>
									<option value="3">3星</option>
									<option value="4">4星</option>
									<option value="5">5星</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">评价</label>
							<div class="col-sm-6">
								<textarea name="content" class="form-control" rows="3"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6 col-sm-offset-2">
								<div class="text-center">
									{{Form::submit('提交',array('class'=> 'btn btn-primary'))}}
								</div>
							</div>
						</div>
					{{Form::close()}}
					<!-- </form> -->
				</div>

				<!-- /.comment -->

			</div>
		</div>
	</div><!-- 	/.row -->
	<!-- /.order -->


</div>
@stop