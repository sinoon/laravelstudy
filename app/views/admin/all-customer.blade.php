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
			<th>用户名</th>
			<th>性别</th>
			<th class="hidden-480">手机号</th>
			<th>邮箱</th>
			<th>
				<i class="icon-time bigger-110 hidden-480"></i>
				注册时间
			</th>
			<th class="hidden-480">账号状态</th>
			<th></th>
		</tr>
	</thead>

	<tbody>
		@foreach ($customers as $customer)
			<tr>
				<td class="center">
					<label>
						<input type="checkbox" class="ace">
						<span class="lbl"></span>
					</label>
				</td>

				<td>
					<a href="{{ asset('admin/control-customer/'.$customer->username) }}">{{$customer->username}}</a>
				</td>
				<td>{{$customer->sex}}</td>
				<td class="hidden-480">{{$customer->mobile}}</td>
				<td>{{$customer->email}}</td>
				<td>{{$customer->updated_at}}</td>

				<td class="hidden-480">
					<span class="label label-sm label-success">
						@if ($customer->status == 1)
							可以使用
						@else
							禁止使用
						@endif
					</span>
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
	
{{$customers->links()}}
</div>
@stop

@section('include-js')
	<script src="{{ asset('js/admin/all-customer.js') }}"></script>
@stop