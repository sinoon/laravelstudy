@extends('restaurant.base')




@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="row">
			@foreach ($food as $food)
				<div class="col-xs-6 col-sm-3 pricing-box">
					<div class="widget-box">
						<div class="widget-header {{ $food->status ? 'header-color-blue' : 'header-color-orange'}}">
							<h5 class="bigger lighter">{{$food->name}}</h5>
						</div>

						<div class="widget-body">
							<div class="widget-main">
								<ul class="list-unstyled spaced2">
									<li>
										@if ($food->savename)
											<a href="{{$restaurant->username}}/foodimg/{{$food->savename}}">
											<img class="img-responsive" src="{{$restaurant->username}}/foodimg/{{$food->savename}}" alt="">
										</a>
										@else
											<a href="{{ asset('img/暂无图片.jpg') }}">
												<img class="img-responsive" src="{{ asset('img/暂无图片.jpg') }}" alt="">
											</a>
										@endif					
									</li>
								</ul>

								<hr />

								<div class="price">
									类型：
									{{$food->type}}
									
								</div>
								<div class="price">
									售价：
									{{$food->price}}
									<small>元</small>
								</div>
								<div class="price">
									库存：
									{{$food->stock}}
									<small>份</small>
								</div>
								<div class="price">
									是否在售：
									{{$food->status ? '是' : '否'}}
								</div>
							</div>

							<div>
								<a href="foodmanage" class="btn btn-block  {{ $food->status ? 'btn-primary' : 'btn-warning'}}">
									<i class="icon-shopping-cart bigger-110"></i>
									<span>修改</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->
@stop