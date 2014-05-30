@extends('layout.base')

@section('content')
<div class="container">
	<div class="row ">
		<div class="col-md-2">
			<a href="#" class="thumbnail">
				<img src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
			</a>
		</div>
		<div class="col-md-10 ">
			<div class="center-block clearfix">
				<div class="input-group" style="margin:5%" >
					<span class="input-group-addon">搜索</span>
					<input id="search" type="text" class="form-control" placeholder="请输入要搜索的内容">
				</div>
			</div>			
		</div>

	</div>
<hr>
</div>
<div class="container">
	<!-- 搜索的结果 -->
		<!-- 盖饭 -->
		<div class="row">
			
				<h1 >
					搜索结果：
				</h1>
				搜索到 {{$count}} 条结果
					<hr>
				@foreach ($foods as $food)
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
			
		<!-- /.盖饭 -->
	</div>
	{{$foods->links()}}
	<!-- 搜索的结果 -->
</div>

@stop

@section('include-js')
	<script src="{{ asset('js/public/search.js') }}"></script>
@stop