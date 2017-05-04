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

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>
						<form class="am-form am-form-horizontal" method="post" action="/home/per_infmt/<?php echo e(session('users')->uid); ?>" enctype="multipart/form-data">
							<?php echo e(csrf_field()); ?>

							<?php echo e(method_field('PUT')); ?>

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
								<input type="file" name="pic" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
								<img class="am-circle am-img-thumbnail" src="/Admin/upload/<?php echo e(session('users')->pic); ?>" alt="" />
							</div>

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i><?php echo e($data->name); ?></i></b></div>
								<div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="#">铜牌会员</a>
						            </span>
								</div>
								<div class="u-safety">
									<a href="/home/per_safety">
									 账户安全
									<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">60分</i></span>
									</a>
								</div>
							</div>
						</div>
						
						<!--个人信息 -->
						<div class="info-main">
								
								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" name="name" placeholder="nickname" value="<?php echo e($data->name); ?>">

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">姓名</label>
									<div class="am-form-content">
										<input type="text" name="realname" placeholder="name" value="<?php echo e($data->realname); ?>">

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="1" data-am-ucheck <?php echo e(($data->sex == 1) ? 'checked' : ''); ?>> 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="2" data-am-ucheck <?php echo e(($data->sex == 2) ? 'checked' : ''); ?>> 女
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="0" data-am-ucheck <?php echo e(($data->sex == 0) ? 'checked' : ''); ?>> 保密
										</label>
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-birth" class="am-form-label">生日</label>
									<div class="am-form-content birth">
										<div class="birth-select" >
											<select data-am-selected name="birth">
												<option value="2015">2015</option>
												<option value="1987">1987</option>
											</select>
											<em>年</em>
										</div>
										<div class="birth-select2">
											<select data-am-selected name="birth1">
												<option value="12">12</option>
												<option value="8">8</option>
											</select>
											<em>月</em></div>
										<div class="birth-select2">
											<select data-am-selected name="birth2">
												<option value="21">21</option>
												<option value="23">23</option>
											</select>
											<em>日</em></div>
									</div>
							
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input name="tel" placeholder="telephonenumber" type="tel" value="<?php echo e($data->tel); ?>">

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input name="email" placeholder="Email" type="email" value="<?php echo e($data->email); ?>">

									</div>
								</div>
								<div class="am-form-group address">
									<label for="user-address" class="am-form-label">收货地址</label>
									<div class="am-form-content address">
										<a href="/home/per_address">
											<p class="new-mu_l2cw">
												<span class="province">湖北</span>省
												<span class="city">武汉</span>市
												<span class="dist">洪山</span>区
												<span class="street">雄楚大道666号(中南财经政法大学)</span>
												<span class="am-icon-angle-right"></span>
											</p>
										</a>

									</div>
								</div>
								<div class="am-form-group safety">
									<label for="user-safety" class="am-form-label">账号安全</label>
									<div class="am-form-content safety">
										<a href="/home/per_safety">

											<span class="am-icon-angle-right"></span>

										</a>

									</div>
								</div>
								<div class="info-btn">
									<div >
									<input type="submit" class="am-btn am-btn-danger" value="保存修改">
									</div>
								</div>

							</form>
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
							<li class="active"> <a href="/home/per_infmt/<?php echo e(session('users')->uid); ?>/edit">个人信息</a></li>
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