@extends('restaurant.base')

@section('content')
<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->

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
		,
		这是为毕业设计项目中餐厅后台管理使用。
	</div>

	<div class="row">
		<div class="space-6"></div>

		<div class="col-sm-12 infobox-container">
			<div class="infobox infobox-green  ">
				<div class="infobox-icon">
					<i class="icon-comments"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number">32</span>
					<div class="infobox-content">新评论 + 2 回复</div>
				</div>
				<div class="stat stat-success">8%</div>
			</div>

			<div class="infobox infobox-blue  ">
				<div class="infobox-icon">
					<i class="icon-twitter"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number">11</span>
					<div class="infobox-content">新会员</div>
				</div>

				<div class="badge badge-success">
					+32%
					<i class="icon-arrow-up"></i>
				</div>
			</div>

			<div class="infobox infobox-pink  ">
				<div class="infobox-icon">
					<i class="icon-shopping-cart"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number">8</span>
					<div class="infobox-content">新订单</div>
				</div>
				<div class="stat stat-important">4%</div>
			</div>

			<div class="infobox infobox-red  ">
				<div class="infobox-icon">
					<i class="icon-beaker"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number">7</span>
					<div class="infobox-content">新菜品</div>
				</div>
			</div>

			<div class="infobox infobox-orange2  ">
				<div class="infobox-chart">
					<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number">100</span>
					<div class="infobox-content">店铺访问数</div>
				</div>

				<div class="badge badge-success">
					7.2%
					<i class="icon-arrow-up"></i>
				</div>
			</div>

			<div class="infobox infobox-blue2  ">
				<div class="infobox-progress">
					<div class="easy-pie-chart percentage" data-percent="42" data-size="46">
						<span class="percent">42</span>%
					</div>
				</div>

				<div class="infobox-data">
					<span class="infobox-text">免费订单流量</span>

					<div class="infobox-content">
						<span class="bigger-110">~</span>
						剩余 1000 份
					</div>
				</div>
			</div>

			<div class="space-6"></div>
		</div>

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
								<tr>
									<td>糖醋鸡米花</td>

									<td>
										<b class="green">8.50</b>
									</td>

									<td>
										<b class="blue">56</b>
									</td>

									<td class="hidden-480">
										<span class="label label-info arrowed-right arrowed-in">在售</span>
									</td>
								</tr>

								<tr>
									<td>吴山烤鸡饭</td>

									<td>
										<b class="green">10.00</b>
									</td>

									<td>
										<b class="blue">50</b>
									</td>

									<td class="hidden-480">
										<span class="label label-info arrowed-in arrowed-in-right">在售</span>
									</td>
								</tr>

								<tr>
									<td>蚝油牛柳饭</td>

									<td>
										<b class="green">15.00</b>
									</td>

									<td>
										<b class="blue">45</b>
									</td>

									<td class="hidden-480">
										<span class="label label-danger arrowed">下架</span>
									</td>
								</tr>

								<tr>
									<td>杭式卤鸭饭</td>

									<td>
										<b class="green">9.00</b>
									</td>
									<td>
										<b class="blue">38</b>
									</td>

									<td class="hidden-480">
										<span class="label arrowed">
											<b>卖完了</b>
										</span>
									</td>
								</tr>

								<tr>
									<td>土家牛肉饭</td>

									<td>
										<b class="green">12.00</b>
									</td>
									<td>
										<b class="blue">32</b>
									</td>

									<td class="hidden-480">
										<span class="label label-info arrowed arrowed-right">在售</span>
									</td>
								</tr>
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
								<a data-toggle="tab" href="#member-tab">会员</a>
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
															<!-- <h4 class="smaller lighter green">
																<i class="icon-list"></i>
																Sortable Lists
															</h4> -->

															<ul id="tasks" class="item-list">
																<li class="item-orange clearfix">
																	<label class="inline">
																		<span class="label label-success arrowed-in-right arrowed">新上架</span>
																		<span class="lbl">吴山烤鸡饭</span>
																	</label>

																	<div class="inline pull-right position-relative dropdown-hover">
																		<span class="badge badge-info">42</span>
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

																<li class="item-red clearfix">
																	<label class="inline">
																		<span class="label label-success arrowed-in-right arrowed">新上架</span>
																		<span class="lbl">蚝油牛柳饭</span>
																	</label>

																	<div class="inline pull-right position-relative dropdown-hover">
																		<span class="badge badge-info">20</span>
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

																<li class="item-default clearfix">
																	<label class="inline">
																		<span class="label label-warning arrowed-in-left arrowed ">即将售完</span>
																		<span class="lbl"> 糖醋鸡米花饭</span>
																	</label>

																	<div class="inline pull-right position-relative dropdown-hover">
																		<span class="badge badge-info">42</span>
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

																<li class="item-blue clearfix">
																	<label class="inline">
																		<span class="label arrowed-in-left arrowed ">已售完</span>
																		<span class="lbl">杭式卤鸭饭</span>
																	</label>

																	<div class="inline pull-right position-relative dropdown-hover">
																		<span class="badge badge-info">60</span>
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

																<li class="item-grey clearfix">
																	<label class="inline">
																		<span class="label label-info arrowed-in-left arrowed ">在售</span>
																		<span class="lbl">咸菜肉片豆腐</span>
																	</label>

																	<div class="inline pull-right position-relative dropdown-hover">
																		<span class="badge badge-info">60</span>
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

																<li class="item-green clearfix">
																	<label class="inline">
																		<span class="label label-info arrowed-in-left arrowed ">在售</span>
																		<span class="lbl">酸菜平菇里脊</span>
																	</label>

																	<div class="inline pull-right position-relative dropdown-hover">
																		<span class="badge badge-info">32</span>
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

																<li class="item-pink clearfix">
																	<label class="inline">
																		<span class="label label-info arrowed-in-left arrowed ">在售</span>
																		<span class="lbl">东坡大肉饭</span>
																	</label>

																	<div class="inline pull-right position-relative dropdown-hover">
																		<span class="badge badge-info">28</span>
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
																<div class="itemdiv commentdiv">
																	<div class="user">
																		<img alt="Bob Doe's Avatar" src="{{ asset('assets/avatars/avatar.png') }}" />
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Bob Doe</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="green">6 min</span>
																		</div>

																		<div class="text">
																			<i class="icon-quote-left"></i>
																			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
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

																<div class="itemdiv commentdiv">
																	<div class="user">
																		<img alt="Jennifer's Avatar" src="{{ asset('assets/avatars/avatar1.png') }}" />
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Jennifer</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="blue">15 min</span>
																		</div>

																		<div class="text">
																			<i class="icon-quote-left"></i>
																			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
																		</div>
																	</div>

																	<div class="tools">
																		<div class="action-buttons bigger-125">
																			<a href="#">
																				<i class="icon-pencil blue"></i>
																			</a>

																			<a href="#">
																				<i class="icon-trash red"></i>
																			</a>
																		</div>
																	</div>
																</div>

																<div class="itemdiv commentdiv">
																	<div class="user">
																		<img alt="Joe's Avatar" src="{{ asset('assets/avatars/avatar2.png') }}" />
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Joe</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="orange">22 min</span>
																		</div>

																		<div class="text">
																			<i class="icon-quote-left"></i>
																			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
																		</div>
																	</div>

																	<div class="tools">
																		<div class="action-buttons bigger-125">
																			<a href="#">
																				<i class="icon-pencil blue"></i>
																			</a>

																			<a href="#">
																				<i class="icon-trash red"></i>
																			</a>
																		</div>
																	</div>
																</div>

																<div class="itemdiv commentdiv">
																	<div class="user">
																		<img alt="Rita's Avatar" src="{{ asset('assets/avatars/avatar3.png') }}" />
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Rita</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="red">50 min</span>
																		</div>

																		<div class="text">
																			<i class="icon-quote-left"></i>
																			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
																		</div>
																	</div>

																	<div class="tools">
																		<div class="action-buttons bigger-125">
																			<a href="#">
																				<i class="icon-pencil blue"></i>
																			</a>

																			<a href="#">
																				<i class="icon-trash red"></i>
																			</a>
																		</div>
																	</div>
																</div>
															</div>

															<div class="hr hr8"></div>

															<div class="center">
																<i class="icon-comments-alt icon-2x green"></i>

																&nbsp;
																<a href="#">
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

									<!-- /span -->
								</div><!-- /row -->

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
@stop

