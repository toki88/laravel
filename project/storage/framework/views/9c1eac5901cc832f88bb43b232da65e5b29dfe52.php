<?php $__env->startSection('content'); ?>
		<title>结算页面</title>

		<link href="/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />

		<link href="/Home/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/Home/css/cartstyle.css" rel="stylesheet" type="text/css" />

		<link href="/Home/css/jsstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/Home/js/address.js"></script>

</div>

			<div class="clear"></div>
			<div class="concent">
				<!--地址 -->
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						<div class="clear"></div>
						<ul>
							<div class="per-border"></div>
							<li class="user-addresslist defaultAddr">

								<div class="address-left">
									<div class="user DefaultAddr">
										<?php $__currentLoopData = $list_address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<span class="buy-address-detail">   
                   					<span class="buy-user"><?php echo e($name); ?></span>
										<span class="buy-phone"><?php echo e($v->phone); ?></span>
										</span>
									</div>
									<div class="default-address DefaultAddr">
										
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
								   <!-- <span class="province">湖北</span>省 -->
										<span class="city"><?php echo e($v->city); ?></span>
										<!-- <span class="dist">洪山</span>区 -->
										<span class="street"><?php echo e($v->address); ?></span>
										</span>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
									<ins class="deftip">默认地址</ins>
								</div>
								<div class="address-right">
									<a href="/Home/person/address.html">
										<span class="am-icon-angle-right am-icon-lg"></span></a>
								</div>
								<div class="clear"></div>

								<div class="new-addr-btn">
									<a href="#" class="hidden">设为默认</a>
									<span class="new-addr-bar hidden">|</span>
									<a href="/home/per_address">修改地址</a>
								</div>

							</li>

						</ul>

						<div class="clear"></div>
					</div>
					<!--物流 -->
					<div class="logistics">
						<h3>选择物流方式</h3>
						<ul class="op_express_delivery_hot">
							<li data-value="yuantong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -468px"></i>圆通<span></span></li>
							<li data-value="shentong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -1008px"></i>申通<span></span></li>
							<li data-value="yunda" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -576px"></i>韵达<span></span></li>
							<li data-value="zhongtong" class="OP_LOG_BTN op_express_delivery_hot_last "><i class="c-gap-right" style="background-position:0px -324px"></i>中通<span></span></li>
							<li data-value="shunfeng" class="OP_LOG_BTN  op_express_delivery_hot_bottom"><i class="c-gap-right" style="background-position:0px -180px"></i>顺丰<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>

					<!--支付方式-->
					<div class="logistics">
						<h3>选择支付方式</h3>
						<ul class="pay-list">
							<li class="pay card"><img src="../images/wangyin.jpg" />银联<span></span></li>
							<li class="pay qq"><img src="../images/weizhifu.jpg" />微信<span></span></li>
							<li class="pay taobao"><img src="../images/zhifubao.jpg" />支付宝<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>

					<!--订单 -->
					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

									<div class="th th-item">
										<div class="td-inner">商品信息</div>
									</div>
									<div class="th th-price">
										<div class="td-inner">单价</div>
									</div>
									<div class="th th-amount">
										<div class="td-inner">数量</div>
									</div>
									<div class="th th-sum">
										<div class="td-inner">金额</div>
									</div>
									<div class="th th-oplist">
										<div class="td-inner">配送方式</div>
									</div>

								</div>
							</div>
							<div class="clear"></div>
							<tr class="item-list">
								<div class="bundle  bundle-last">
									<?php $__currentLoopData = $list_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="bundle-main">
										<ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="/home/goods/<?php echo e($v->gid); ?>" class="J_MakePoint">
															<img src="/admin/upload/<?php echo e($v->pic); ?>" class="itempic J_ItemImg"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="/home/goods/<?php echo e($v->gid); ?>" class="item-title J_MakePoint" data-point="tbcart.8.11"><?php echo e($v->name); ?></a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<span class="sku-line"><?php echo e($v->check); ?></span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now"><?php echo e($v->price); ?></em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															<!-- <input class="min am-btn" name="" type="button" value="-" /> -->
															<span style="width:30px;"><?php echo e($v->num); ?></span>
															<!-- <input class="add am-btn" name="" type="button" value="+" /> -->
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" class="J_ItemSum number"><?php echo e($v->price*$v->num); ?></em>
												</div>
											</li>
											<li class="td td-oplist">
												<div class="td-inner">
													<span class="phone-title">配送方式</span>
													<div class="pay-logis">
														快递<b class="sys_item_freprice">10</b>元
													</div>
												</div>
											</li>

										</ul>
										<div class="clear"></div>
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>

							</tr>
							</tr>
							</div>
							<div class="clear"></div>
							<div class="pay-total">
						
	
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
									合计（含运费） <span>¥</span><em class="pay-sum"><?php echo e($p); ?></em>
								</p>
							</div>

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee"><?php echo e($p); ?></em>
											</span>
										</div>

										<div id="holyshit268" class="pay-address">
											<?php $__currentLoopData = $list_address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<p class="buy-footer-address">
												
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="buy--address-detail">
								   <!-- <span class="province">湖北</span>省 -->
												<span class="city"><?php echo e($v->city); ?></span>市
												<!-- <span class="dist">洪山</span>区 -->
												<span class="street"><?php echo e($v->city); ?></span>
												</span>
												</span>
											</p>
											<p class="buy-footer-address">
												<span class="buy-line-title">收货人：</span>
												<span class="buy-address-detail">   
                                         <span class="buy-user"><?php echo e($name); ?></span>
											<span class="buy-phone"><?php echo e($v->phone); ?></span>
												</span>
											</p>
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<a id="J_Go" href="/home/checkbuy/<?php echo e($lid); ?>/success" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
<?php $__env->stopSection(); ?>
				
<?php echo $__env->make('Home.base.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>