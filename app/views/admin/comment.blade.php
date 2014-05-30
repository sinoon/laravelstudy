@extends('admin.base')

@section('content')
@foreach ($comments as $comment)
	<div class="col-xs-12 col-sm-6 widget-container-span ui-sortable">
		<div class="widget-box">
			<div class="widget-header header-color-blue">
				<p class="">购买菜品：{{$comment->name}}，购买数量：{{$comment->num}} 份，购买时间：{{$comment->created_at}}</p>
					
				<div class="widget-toolbar">
					<a href="#" data-action="settings">
						<i class="icon-cog"></i>
					</a>

					<a href="#" data-action="reload">
						<i class="icon-refresh"></i>
					</a>

					<a href="#" data-action="collapse">
						<i class="icon-chevron-up"></i>
					</a>

					<a href="#" data-action="close">
						<i class="icon-remove"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<span>口味评价：{{$comment->taste}}</span>
					<span>送餐速度：{{$comment->fast}}</span>
					<p class="alert alert-info">
						{{$comment->comment}}
					</p>
				</div>
<!-- 				<div class="widget-toolbox padding-8 clearfix">
					<button class="btn btn-xs btn-success pull-right">
						<span id="delete" value="{{$comment}}" class="bigger-110">删除</span>

						<i class="icon-arrow-right icon-on-right"></i>
					</button>
				</div> -->
			</div>
		</div>
	</div>			
@endforeach
@stop
