		<link href="/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/Home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/Home/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/Home/css/seastyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/home/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/home/js/script.js"></script>
		<link href="/Home/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
			div div div div div div ul li{float:left;margin-right:15px;margin-left:10px;}
		</style>

<?php $__env->startSection('content'); ?>


			<div class="clear"></div>
			<b class="line"></b>
           <div class="search">
			<div class="search-list">
			<div class="nav-table">
					   <div class="long-title"><a href="/home/search/path/0"><span class="all-goods">全部分类</span></a></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="/home/index">首页</a></li>
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
			
				
					<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12">
	                  	<div class="theme-popover">														

							<ul class="select">


<!-- 								<li class="select-list">
									<dl id="select1">
										<dt class="am-badge am-round">品牌</dt>	
									
										 <div class="dd-conent">										
											<dd class="select-all selected"><a href="#">全部</a></dd>
											<dd><a href="#">百草味</a></dd>
											<dd><a href="#">良品铺子</a></dd>
											<dd><a href="#">新农哥</a></dd>
											<dd><a href="#">楼兰蜜语</a></dd>
											<dd><a href="#">口水娃</a></dd>
											<dd><a href="#">考拉兄弟</a></dd>
										 </div>
						
									</dl>
								</li> -->

<!-- 								<li class="select-list">
									<dl id="select3">
										<dt class="am-badge am-round">选购热点</dt>
										<div class="dd-conent">
											<dd class="select-all selected"><a href="#">全部</a></dd>
											<dd><a href="#">手剥松子</a></dd>
											<dd><a href="#">薄壳松子</a></dd>
											<dd><a href="#">进口零食</a></dd>
											<dd><a href="#">有机零食</a></dd>
										</div>
									</dl>
								</li> -->
					        
							</ul>
							<div class="clear"></div>
                        </div>
							<div class="search-content">
								<div class="sort">
									<li class="first"><a title="综合">综合排序</a></li>
									<li><a title="销量">销量排序</a></li>
									<li><a title="价格">价格优先</a></li>
									<li class="big"><a title="评价" href="#">评价为主</a></li>
								</div>
								<div class="clear"></div>

								<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
									

										<?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									

									<li>
										<a href="/home/goods/<?php echo e($v->gid); ?>"><div class="i-pic limit">
											<img src="/Admin/upload/<?php echo e($v->showpic); ?>" />											
											<p class="title fl"><?php echo e($v->gname); ?></p>
											<p class="price fl">
												<b>¥</b>
												<strong><?php echo e($v->price); ?></strong>
											</p>
											<p class="number fl">
												销量<span><?php echo e($v->sell); ?></span>
											</p>
										</div></a>
									</li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								</ul>
								<div><?php echo e($goods->links()); ?></div>
								
							</div>

							<div class="search-side">

								<div class="side-title">
									推荐
								</div>
								<?php $__currentLoopData = $list2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li>
									<div class="i-pic check">
										<img src="/Admin/upload/<?php echo e($v->showpic); ?>" />
										<p class="check-title"><?php echo e($v->gname); ?></p>
										<p class="price fl">
											<b>¥</b>
											<strong><?php echo e($v->price); ?></strong>
										</p>
										<p class="number fl">
											销量<span><?php echo e($v->sell); ?></span>
										</p>
									</div>
								</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<div class="clear"></div>
							<!--分页 -->


						</div>
					</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Home.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>