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
					<!--标题 -->
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">钱款去向</strong> / <small>Apply&nbsp;for&nbsp;returns</small></div>
					</div>
					<hr/>
					<div class="comment-list">

						<div class="record-aside">
							<div class="item-pic">
								<a href="#" class="J_MakePoint">
									<img src="/Admin/upload/<?php echo e($data->pic); ?>" class="itempic">
								</a>
							</div>

							<div class="item-title">

								
							</div>
							<div class="item-info">
								<div class="item-name">
									<a href="#">
										<p class="item-basic-info"><?php echo e($data->name); ?></p>
									</a>
								</div>
								<div class="info-little">
									<span>颜色：<?php echo e($data->check); ?></span>
									<span>数量：<?php echo e($data->num); ?></span>
								</div>
								<div class="item-ordernumber">
									<span class="info-title">退款编号：</span><a><?php echo e($data->refund_id); ?></a>
								</div>
								<div class="item-time">
									<span class="info-title">申请时间：</span><span class="time"><?php echo e(date('Y-m-d H:i:s',$data->refund_time)); ?></span>
								</div>

							</div>
							<div class="clear"></div>
						</div>

						<div class="record-main">
							<div class="detail-list refund-process">
							    <div class="fund-tool">中国农业银行(尾号3361)</div>
								<div class="money"><?php echo e(($data->num) * ($data->price)); ?></div>
							</div>
							<div class="clear"></div>
							<!--进度条-->
							<div class="m-progress" style="height: 100px;">
								<div class="m-progress-list">
									<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">卖家退款 </p>
                                <p class="stage-name">2015-12-21<br>17:38:29</p>
                            </span>
									<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">银行受理</p>
                                <p class="stage-name">2015-12-21<br>19:38:29</p>
                            </span>
									<span class="step-3 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">3<em class="bg"></em></i>
                                <p class="stage-name">退款成功</p>
                                <p class="stage-name">2015-12-21<br>19:58:29</p>
                            </span>
									<span class="u-progress-placeholder"></span>
								</div>
								<div class="u-progress-bar total-steps-2">
									<div class="u-progress-bar-inner"></div>
								</div>
							</div>
						</div>

					</div>
					<div class="clear"></div>
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
							<li class="active"> <a href="news.html">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>

	</body>

</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Home.person.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>