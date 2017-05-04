<?php $__env->startSection('logo'); ?>
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
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">退换货管理</strong> / <small>Change</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">退款订单</a></li>
								<li><a href="#tab2">售后管理</a></li>

							</ul>
<style type="text/css">
	.item-info{
		width:200px;
	}
</style>
							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-orderprice th-price">
											<td class="td-inner">交易金额</td>
										</div>
										<div class="th th-changeprice th-price">
											<td class="td-inner">退款金额</td>
										</div>
										<div class="th th-status th-moneystatus">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change th-changebuttom">
											<td class="td-inner">交易操作</td>
										</div>
									</div>
									<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="order-main">
										<div class="order-list">
											<div class="order-title">
												<div class="dd-num">退款编号：<a href="javascript:;"><?php echo e($v->refund_id); ?></a></div>
												<span>申请时间：<?php echo e($v->refund_time); ?></span>
												<!--    <em>店铺：小桔灯</em>-->
											</div>
											<div class="order-content">
												<div class="order-left">
													<ul class="item-list">
														<li class="td td-item">
															<div class="item-pic">
																<a href="/home/goods/<?php echo e($v->gid); ?>" class="J_MakePoint">
																	<img src="/Admin/upload/<?php echo e($v->pic); ?>" class="itempic J_ItemImg">
																</a>
															</div>
															<div class="item-info">
																<div class="item-basic-info">
																	<a href="/home/goods/<?php echo e($v->gid); ?>">
																		<p><?php echo e($v->name); ?></p>
																		<p class="info-little"><?php echo e($v->check); ?>

																			<br/>数量：<?php echo e($v->num); ?> </p>
																	</a>
																</div>
															</div>
														</li>

														<ul class="td-changeorder">
															<li class="td td-orderprice">
																<div class="item-orderprice">
																	<span>交易金额：</span><?php echo e($v->price); ?>

																</div>
															</li>
															<li class="td td-changeprice">
																<div class="item-changeprice">
																	<span>退款金额：</span><?php echo e(($v->num)*($v->price)); ?>

																</div>
															</li>
														</ul>
														<div class="clear"></div>
													</ul>

													<div class="change move-right">
														<li class="td td-moneystatus td-status">
															<div class="item-status">
																<p class="Mystatus"><?php if($v->state == 4): ?> 退款中 <?php elseif($v->state == 5): ?> 退款成功 <?php endif; ?></p>

															</div>
														</li>
													</div>
													<li class="td td-change td-changebutton">
														<a href="/home/per_record/<?php echo e($v->lid); ?>">
														<div class="am-btn am-btn-danger anniu">
															钱款去向</div>
														</a>
													</li>

												</div>
											</div>
										</div>

									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								</div>

								<div class="am-tab-panel am-fade" id="tab2">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-orderprice th-price">
											<td class="td-inner">交易金额</td>
										</div>
										<div class="th th-changeprice th-price">
											<td class="td-inner">退款金额</td>
										</div>
										<div class="th th-status th-moneystatus">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change th-changebuttom">
											<td class="td-inner">交易操作</td>
										</div>
									</div>
									<?php $__currentLoopData = $message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<!-- <?php echo e($v->num); ?> -->
									<div class="order-main">
										<div class="order-list">
											<div class="order-title">
												<div class="dd-num">退款编号：<a href="javascript:;"><?php echo e($v->refund_id); ?></a></div>
												<span>申请时间：<?php echo e($v->refund_time); ?></span>
												<!--    <em>店铺：小桔灯</em>-->
											</div>
											<div class="order-content">
												<div class="order-left">
													<ul class="item-list">
														<li class="td td-item">
															<div class="item-pic">
																<a href="/home/goods/<?php echo e($v->gid); ?>" class="J_MakePoint">
																	<img src="/Admin/upload/<?php echo e($v->pic); ?>" class="itempic J_ItemImg">
																</a>
															</div>
															<div class="item-info">
																<div class="item-basic-info">
																	<a href="/home/goods/<?php echo e($v->gid); ?>">
																		<p><?php echo e($v->name); ?></p>
																		<p class="info-little"><?php echo e($v->check); ?>

																			<br/>数量：<?php echo e($v->num); ?> </p>
																	</a>
																</div>
															</div>
														</li>

														<ul class="td-changeorder">
															<li class="td td-orderprice">
																<div class="item-orderprice">
																	<span>交易金额：</span><?php echo e(($v->price) * ($v->num)); ?>

																</div>
															</li>
															<li class="td td-changeprice">
																<div class="item-changeprice">
																	<span>退款金额：</span><?php echo e(($v->price)*($v->num)); ?>

																</div>
															</li>
														</ul>
														<div class="clear"></div>
													</ul>

													<div class="change move-right">
														<li class="td td-moneystatus td-status">
															<div class="item-status">
																<p class="Mystatus">退款成功</p>

															</div>
														</li>
													</div>
													<li class="td td-change td-changebutton">
                                                        <a href="/home/per_record/<?php echo e($v->lid); ?>">
														    <div class="am-btn am-btn-danger anniu">
															钱款去向</div>
														</a>
													</li>

												</div>
											</div>
										</div>
									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>

							</div>

						</div>
					</div>

				</div>
<?php $__env->stopSection(); ?>
				<!--底部-->
<?php $__env->startSection('foot'); ?>
			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="/home/per_index">个人中心</a>
					</li>					
					<li class="person">
						<a href="#">个人资料</a>
						<ul>
							<li> <a href="/home/per_infmt/<?php echo e(session('users')->uid); ?>/edit">个人信息</a></li>
							<li> <a href="/home/per_safety">安全设置</a></li>
							<li> <a href="/home/per_address">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="/home/per_order">订单管理</a></li>
							<li class="active"> <a href="/home/per_change">退款售后</a></li>
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

</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Home.person.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>