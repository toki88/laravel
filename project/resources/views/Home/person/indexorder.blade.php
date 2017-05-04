@extends('Home.person.base.parent')
@section('logo')
            <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-order">

						<!--标题 -->
						<!-- <div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">最近订单</strong> / <small>Order</small></div>
						</div> -->
						<div class="m-userinfo">
									<div class="m-baseinfo">
										<a href="information.html">
											<img src="/Home/images/getAvatar.do.jpg">
										</a>
										<em class="s-name">{{ session('users')->name }}<span class="vip1"></em>
										<div class="s-prestige am-btn am-round">
											</span>会员福利</div>
									</div>
									<div class="m-right">
										<div class="m-new">
											<a href="news.html"><i class="am-icon-bell-o"></i>消息</a>
										</div>
										<div class="m-address">
											<a href="/home/per_address" class="i-trigger">我的收货地址</a>
										</div>
									</div>
								</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<!-- <ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有订单</a></li>
								
							</ul> -->

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>
<style type="text/css">
	.item-info{
		width:200px;
	}
</style>
									<div class="order-main">
										<div class="order-list">
											@foreach($data as $v)
											<!--不同状态订单-->
											<div class="order-status3">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{ $v->lid }}</a></div>
													<span>成交时间：{{ $v->ltime }}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="/home/goods/{{ $v->lid }}" class="J_MakePoint">
																		<img src="/Admin/upload/{{ $v->pic }}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="/home/goods/{{ $v->lid }}">
																			<p>{{ $v->name }}</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>数量：{{ $v->num }} </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{ $v->price }}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{ $v->num }}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="/home/per_reorder/{{ $v->lid }}">
																		@if(($v->state == 0) || ($v->state == 2)) 退款/退货@endif
																	</a>
																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{ ($v->num) * ($v->price)+10 }}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">
																		@if($v->state == 1)卖家已发货
																		@elseif($v->state == -1) 等待支付
																		@elseif($v->state == 0) 等待发货
																		@elseif($v->state == 6) 交易完成
																		@elseif($v->state == 2) 交易完成
																		@elseif($v->state == 3) 申请退款中
																		@elseif($v->state == 4) 正在退款
																		@elseif($v->state == 5) 退款成功
																		@elseif($v->state == 7) 已取消订单
																		@elseif($v->state == 8) 待退款
																		@elseif($v->state == 9) 换货中
																		@elseif($v->state == 10) 交易完成
																		@endif
																	</p>
																	<p class="order-info"><a href="/home/per_order/{{ $v->lid }}">订单详情</a></p>
																	@if($v->state == -1)<p class="order-info"><a href="取消订单{{ $v->lid }}">取消订单</a></p>
																		@endif
																	<p class="order-info"><a href="/home/per_order/{{ $v->lid }}">
																		@if($v->state == 1)查看物流
																		@endif

																	</a></p>

																	<p class="order-info">
																		@if($v->state == 1)
																		<span href="" onclick='alert("延长收货成功")' name="yc">延长收货</span>
																		@endif
																	</p>
																</div>
															</li>
															
															<li class="td td-change">
																
																@if($v->state == 10) <div class="am-btn am-btn-danger anniu"> 评价完成 </div>
																@elseif(($v->state == 7)) <div > <a class="am-btn am-btn-danger anniu"href="/home/per_delorder/{{ $v->lid }}">删除订单 </a></div>
																@elseif($v->state == 0)<div class="am-btn am-btn-danger anniu" onclick='alert("已经提醒卖家发货...")'> 提醒发货 </div>
																@elseif($v->state == 2)<li class="td td-change">
																<a href="/home/per_commentlist/{{ $v->lid }}">
																	<div class="am-btn am-btn-danger anniu">
																		评价商品</div>
																</a>
															</li>

														@elseif($v->state == 4)<li class="td td-change td-changebutton"><a href="/home/per_record/{{ $v->lid }}"><div class="am-btn am-btn-danger anniu">钱款去向</div></a></li>
														@elseif($v->state == 5)<li class="td td-change td-changebutton"><a href="/home/per_record/{{ $v->lid }}"><div class="am-btn am-btn-danger anniu">钱款去向</div></a></li>
														@elseif($v->state == -1)<li class="td td-change"><a href="pay.html"><div class="am-btn am-btn-danger anniu">一键支付</div></a></li>
														@elseif($v->state == 1)<li class="td td-change"><a href="pay.html"><div class="am-btn am-btn-danger anniu">查看物流</div></a></li>	
																@endif
															</li>
														</div>
													</div>
												</div>

											</div>
											@endforeach
										</div>

									</div>

								</div>
						
							
							</div>

						</div>
					</div>
				</div>
@endsection
				<!--底部-->
@section('foot')
				
			</div>
			<aside class="menu">
				<ul>
					<li class="person">
						<a href="/home/per_index">个人中心</a>
					</li>
					<li class="person">
						<a href="#">个人资料</a>
						<ul>
							<li> <a href="/home/per_infmt/{{ session('users')->uid }}/edit">个人信息</a></li>
							<li> <a href="/home/per_safety">安全设置</a></li>
							<li> <a href="/home/per_address">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li class="active"><a href="/home/per_order">订单管理</a></li>
							<li> <a href="/home/per_change">退款售后</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的资产</a>
						<ul>
							<li> <a href="coupon.html">优惠券 </a></li>
							<li> <a href="bonus.html">红包</a></li>
							<li> <a href="bill.html">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="#">我的小窝</a>
						<ul>
							<li> <a href="collection.html">收藏</a></li>
							<li> <a href="foot.html">足迹</a></li>
							<li> <a href="comment.html">评价</a></li>
							<li> <a href="news.html">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>

	</body>
 <script type="text/javascript">
	function del(id){
        	if(confirm('确定删除吗？')){
        		var form = document.myform;
        		form.action = '/home/per_order';
        		form.submit();
        	}
        }
 </script>
</html>
@endsection