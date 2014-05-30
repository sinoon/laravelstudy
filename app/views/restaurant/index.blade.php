@extends('restaurant.base')



@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
				<i class="icon-remove"></i>
			</button>

			<i class="icon-ok green"></i>
			欢迎来到
			<strong class="green">
				快捷订餐后台管理系统
				<small>(v1.0)</small>
			</strong>
			,这是为毕业设计项目中餐厅后台管理使用。
		</div>

		<div class="row">
			<div class="space-6"></div>


			<div class="vspace-sm"></div>
			<!-- /span -->
		</div><!-- /row -->

		<div class="hr hr32 hr-dotted"></div>

		<div class="row">
			<div class="col-sm-12">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-flat">
						<h4 class="lighter">
							<i class="icon-star orange"></i>
							销量排行
						</h4>

						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="icon-chevron-up"></i>
							</a>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th>
											<i class="icon-caret-right blue"></i>
											名称
										</th>

										<th>
											<i class="icon-caret-right blue"></i>
											价格 (元)
										</th>

										<th>
											<i class="icon-caret-right blue"></i>
											销量 (份)
										</th>

										<th class="hidden-480">
											<i class="icon-caret-right blue"></i>
											状态
										</th>
									</tr>
								</thead>

								<tbody>
									@foreach ($result as $results)
									<tr>
										<td>{{$results->name}}</td>
										<td>
											<b class="green">{{$results->price}}</b>
										</td>
										<td>
											<b class="blue">{{$results->total}}</b>
										</td>
										<td class="hidden-480">
											@if ($results->foodstatus == 'Yes')
											<span class="label label-info arrowed-right arrowed-in">在售</span>
											@else
												<span class="label label-danger arrowed">下架</span>
											@endif
										</td>
									</tr>
									@endforeach

								</tbody>
							</table>
						</div><!-- /widget-main -->
					</div><!-- /widget-body -->
				</div><!-- /widget-box -->
			</div>
		</div>

		<div class="hr hr32 hr-dotted"></div>

		<div class="row">
			<div class="col-sm-6">
				<div class="widget-box transparent" id="recent-box">
					<div class="widget-header">
						<h4 class="lighter smaller">
							<i class="icon-rss orange"></i>
							近况
						</h4>

						<div class="widget-toolbar no-border">
							<ul class="nav nav-tabs" id="recent-tab">
								<li class="active">
									<a data-toggle="tab" href="#task-tab">美食</a>
								</li>

								<li>
									<a data-toggle="tab" href="#comment-tab">评价</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main padding-4">
							<div class="tab-content padding-8 overflow-visible">
								<div id="task-tab" class="tab-pane active">
									<ul id="tasks" class="item-list">
										@if (count($foods) == 0)
											最近没有菜品活动。
										@endif
										@foreach ($foods as $food)
											{{-- expr --}}
										
										<li class="item-orange clearfix">
											<label class="inline">
												@if ($food->status == 'Yes')
													<span class="label label-success arrowed-in-right arrowed">新上架</span>
												@endif
												@if ($food->stock < 5 && $food->stock > 0)
													<span class="label label-warning arrowed-in-left arrowed ">即将售完</span>
												@endif
												@if ($food->stock == 0)
													<span class="label arrowed-in-left arrowed ">已售完</span>
												@endif
												<span class="lbl">{{$food->name}}</span>
											</label>

											<div class="inline pull-right position-relative dropdown-hover">
												<span class="badge badge-info">{{$food->stock}}</span>
												<button class="btn btn-minier bigger btn-primary">
													<i class="icon-cog icon-only bigger-120"></i>
												</button>

												<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-caret dropdown-close pull-right">
													<li>
														<a href="#" class="tooltip-success" data-rel="tooltip" title="Mark&nbsp;as&nbsp;done">
															<span class="green">
																<i class="icon-ok bigger-110"></i>
															</span>
														</a>
													</li>

													<li>
														<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
															<span class="red">
																<i class="icon-trash bigger-110"></i>
															</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										@endforeach
							
								</ul>
							</div>

							<div id="member-tab" class="tab-pane">
								<div class="clearfix">
									<div class="itemdiv memberdiv">
										<div class="user">
												<img alt="Bob Doe's avatar" src="{{ asset('assets/avatars/user.jpg') }}" />
										</div>

										<div class="body">
											<div class="name">
												<a href="#">Bob Doe</a>
											</div>
											<div class="time">
												<i class="icon-time"></i>
												<span class="green">20 min</span>
											</div>
											<div>
												<span class="label label-info label-sm">在线</span>
											</div>
										</div>
									</div>

									<div class="itemdiv memberdiv">
										<div class="user">
											<img alt="Joe Doe's avatar" src="{{ asset('assets/avatars/avatar2.png') }}" />
										</div>

										<div class="body">
											<div class="name">
												<a href="#">Joe Doe</a>
											</div>

											<div class="time">
												<i class="icon-time"></i>
												<span class="green">1 hour</span>
											</div>

											<div>
												<span class="label label-sm">离线</span>
											</div>
										</div>
									</div>

									<div class="itemdiv memberdiv">
										<div class="user">
											<img alt="Jim Doe's avatar" src="{{ asset('assets/avatars/avatar.png') }}" />
										</div>

										<div class="body">
											<div class="name">
												<a href="#">Jim Doe</a>
											</div>

											<div class="time">
												<i class="icon-time"></i>
												<span class="green">2 hour</span>
											</div>

											<div>
												<span class="label label-info label-sm">在线</span>
											</div>
										</div>
									</div>

									<div class="itemdiv memberdiv">
										<div class="user">
											<img alt="Alex Doe's avatar" src="{{ asset('assets/avatars/avatar5.png') }}" />
										</div>

										<div class="body">
											<div class="name">
												<a href="#">Alex Doe</a>
											</div>

											<div class="time">
												<i class="icon-time"></i>
												<span class="green">3 hour</span>
											</div>

											<div>
												<span class="label label-sm">离线</span>
											</div>
										</div>
									</div>

									<div class="itemdiv memberdiv">
										<div class="user">
											<img alt="Bob Doe's avatar" src="{{ asset('assets/avatars/avatar2.png') }}" />
										</div>

										<div class="body">
											<div class="name">
												<a href="#">Bob Doe</a>
											</div>

											<div class="time">
												<i class="icon-time"></i>
												<span class="green">6 hour</span>
											</div>

											<div>
												<span class="label label-info label-sm arrowed-in">在线</span>
											</div>
										</div>
									</div>

									<div class="itemdiv memberdiv">
										<div class="user">
											<img alt="Susan's avatar" src="{{ asset('assets/avatars/avatar3.png') }}" />
										</div>

										<div class="body">
											<div class="name">
												<a href="#">Susan</a>
											</div>

											<div class="time">
												<i class="icon-time"></i>
												<span class="green">yesterday</span>
											</div>

											<div>
												<span class="label label-sm arrowed-in">离线</span>
											</div>
										</div>
									</div>

									<div class="itemdiv memberdiv">
										<div class="user">
											<img alt="Phil Doe's avatar" src="{{ asset('assets/avatars/avatar4.png') }}" />
										</div>

										<div class="body">
											<div class="name">
												<a href="#">Phil Doe</a>
											</div>

											<div class="time">
												<i class="icon-time"></i>
												<span class="green">2 days ago</span>
											</div>

											<div>
												<span class="label label-info label-sm arrowed-in arrowed-in-right">在线</span>
											</div>
										</div>
									</div>

									<div class="itemdiv memberdiv">
										<div class="user">
											<img alt="Alexa Doe's avatar" src="{{ asset('assets/avatars/avatar1.png') }}" />
										</div>

										<div class="body">
											<div class="name">
												<a href="#">Alexa Doe</a>
											</div>

											<div class="time">
												<i class="icon-time"></i>
												<span class="green">3 days ago</span>
											</div>

											<div>
												<span class="label label-sm arrowed-in">离线</span>
											</div>
										</div>
									</div>
								</div>

								<div class="center">
									<i class="icon-group icon-2x green"></i>
									&nbsp;
									<a href="#">
										查看全部会员 &nbsp;
										<i class="icon-arrow-right"></i>
									</a>
								</div>

								<div class="hr hr-double hr8"></div>
							</div><!-- member-tab -->

							<div id="comment-tab" class="tab-pane">
								<div class="comments">
									@foreach ($comments as $comment)
										<div class="itemdiv commentdiv">
											<div class="user">
												<img alt="Bob Doe's Avatar" src="{{ asset('assets/avatars/avatar.png') }}" />
											</div>

											<div class="body">
												<div class="name">
													<a href="#">{{$comment->username}}</a>
												</div>

												<div class="time">
													<i class="icon-time"></i>
													<span class="green">{{$comment->updated_at}}</span>
												</div>

												<div class="text">
													<i class="icon-quote-left"></i>
													<p>
														口味：{{$comment->taste}} 星
													</p>
													<p>
														送餐速度：{{$comment->fast}} 星
													</p>
													<p>
														{{$comment->comment}}
													</p>
												</div>
											</div>

											<div class="tools">
												<div class="inline position-relative">
													<button class="btn btn-minier bigger btn-yellow dropdown-toggle" data-toggle="dropdown">
														<i class="icon-angle-down icon-only bigger-120"></i>
													</button>

													<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
														<li>
															<a href="#" class="tooltip-success" data-rel="tooltip" title="Approve">
																<span class="green">
																	<i class="icon-ok bigger-110"></i>
																</span>
															</a>
														</li>

														<li>
															<a href="#" class="tooltip-warning" data-rel="tooltip" title="Reject">
																<span class="orange">
																	<i class="icon-remove bigger-110"></i>
																</span>
															</a>
														</li>

														<li>
															<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																<span class="red">
																	<i class="icon-trash bigger-110"></i>
																</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									@endforeach

								</div>

								<div class="hr hr8"></div>

								<div class="center">
									<i class="icon-comments-alt icon-2x green"></i>
									&nbsp;
									<a href="{{ asset('restaurant/comment') }}">
										查看全部评论 &nbsp;
										<i class="icon-arrow-right"></i>
									</a>
								</div>

								<div class="hr hr-double hr8"></div>
							</div>
						</div>
					</div><!-- /widget-main -->
				</div><!-- /widget-body -->
			</div><!-- /widget-box -->
		</div><!-- /span -->
	</div><!-- /row -->
</div><!-- /.col -->
</div>

@stop

