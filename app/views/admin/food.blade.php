@extends('admin.base')


@section('content')
<table id="sample-table-1" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th class="center">
				<label>
					<input type="checkbox" class="ace">
					<span class="lbl"></span>
				</label>
			</th>
			<th>名字</th>
			<th>库存</th>
			<th class="hidden-480">价格</th>
			<th>描述</th>
			<th>
				属于的餐厅
			</th>
			<th class="hidden-480">状态</th>
			<th></th>
		</tr>
	</thead>

	<tbody>
		@foreach ($foods as $food)
			<tr>
				<td class="center">
					<label>
						<input type="checkbox" class="ace">
						<span class="lbl"></span>
					</label>
				</td>

				<td>
					<a href="{{ asset('admin/food/'.$food->id) }}">{{$food->name}}</a>
				</td>
				<td>{{$food->stock}}</td>
				<td class="hidden-480">{{$food->price}}</td>
				<td>{{$food->note}}</td>
				<td>{{$food->restaurantname}}</td>

				<td class="hidden-480">
					@if ($food->status == 'Yes')
						<span class="label label-sm label-success">
							上线
						</span>
					@else
						<span class="label label-sm label-waring">
							下线
						</span>
					@endif
					
				</td>

				<td>
					<div id="control" class="visible-md visible-lg hidden-sm hidden-xs btn-group">
						<button class="btn btn-xs btn-success">
							<i class="icon-ok bigger-120"></i>
						</button>

						<button class="btn btn-xs btn-info">
							<i class="icon-edit bigger-120"></i>
						</button>

						<button class="btn btn-xs btn-danger">
							<i class="icon-trash bigger-120"></i>
						</button>

						<button class="btn btn-xs btn-warning">
							<i class="icon-flag bigger-120"></i>
						</button>
					</div>

					<div class="visible-xs visible-sm hidden-md hidden-lg">
						<div class="inline position-relative">
							<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
								<i class="icon-cog icon-only bigger-110"></i>
							</button>

							<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
								<li>
									<a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
										<span class="blue">
											<i class="icon-zoom-in bigger-120"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
										<span class="green">
											<i class="icon-edit bigger-120"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
										<span class="red">
											<i class="icon-trash bigger-120"></i>
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</td>
			</tr>
		@endforeach
		
	</tbody>

</table>
<div class="pull-right">
	
{{$foods->links()}}
</div>
@stop

@section('include-js')
	<script src=""></script>
@stop