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
					<!--标题 -->
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">退换货申请</strong> / <small>Apply&nbsp;for&nbsp;returns</small></div>
					</div>
					<hr/>
					<div class="comment-list">
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">买家申请退款</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">商家处理退款申请</p>
                            </span>
							<span class="step-3 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">3<em class="bg"></em></i>
                                <p class="stage-name">款项成功退回</p>
                            </span>                            
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					
					
						<div class="refund-aside">
							<div class="item-pic">
								<a href="/home/goods/{{ $data->gid}}" class="J_MakePoint">
									<img src="/Admin/upload/{{ $data->pic }}" class="itempic">
								</a>
							</div>

							<div class="item-title">

								<div>
									<a href="/home/goods/{{ $data->gid}}">
										<p class="item-basic-info">{{ $data->name }}</p>
									</a>
								</div>
								<div>
									<span>{{ $data->check }}</span>
								</div>
							</div>
							<div class="item-info">
								<div class="item-ordernumber">
									<span class="info-title">订单编号：</span><a>{{ $data->loid }}</a>
								</div>
								<div class="item-price">
									<span class="info-title">价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：</span><span class="price">{{ $data->price }}</span>
									<span class="number">×{{ $data->num }}</span><span class="item-title">(数量)</span>
								</div>
								<div class="item-amount">
									<span class="info-title">小&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;计：</span><span class="amount">{{ ($data->price)*($data->num) }}</span>
								</div>
								<div class="item-pay-logis">
									<span class="info-title">运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费：</span><span class="price">10.00元</span>
								</div>
								<div class="item-amountall">
									<span class="info-title">总&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;计：</span><span class="amountall">{{ ($data->price)*($data->num)+10 }}</span>
								</div>
								<div class="item-time">
									<span class="info-title">成交时间：</span><span class="time">{{ date('Y-m-d H:i:s',($data->ltime)) }}</span>
								</div>

							</div>
							<div class="clear"></div>
						</div>
						<form action="/home/per_order/{{ $data->lid }}" method="post" enctype='multipart/form-data'>
							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<style type="text/css">
								.item-comment{
									margin-left:112px;
									margin-top:105px;
								}
								.refund-tip{
									margin-top:400px;
									float:left;
								}
								.filePic{
									width:80px;
									/*height:80px;*/
									border:1px solid black;

								}

							</style>
						<div class="refund-main">
							<div class="item-comment">
								<div class="am-form-group">
									<label for="refund-type" class="am-form-label">退款类型</label>
									<div class="am-form-content">
										<select data-am-selected="" name="refund_type">
											<option value="0" selected>仅退款</option>
											<option value="1">退款/退货</option>
										</select>
									</div>
								</div>
								
								<div class="am-form-group">
									<label for="refund-reason" class="am-form-label">退款原因</label>
									<div class="am-form-content">
										<select data-am-selected="" name="refund_reason">
											<option value="" selected>请选择退款原因</option>
											<option value="不想要了">不想要了</option>
											<option value="买错了">买错了</option>
											<option value="没收到货">没收到货</option>											
											<option value="与说明不符">与说明不符</option>
										</select>
									</div>
								</div>

								<div class="am-form-group">
									<label for="refund-money" class="am-form-label">退款金额<span>（不可修改）</span></label>
									<div class="am-form-content">
										<input type="text" id="refund-money" readonly="readonly" placeholder="{{ ($data->price)*($data->num)+10 }}" name="refund_price" value="{{ ($data->price)*($data->num) }}">
									</div>
								</div>
								<div class="am-form-group">
									<label for="refund-info" class="am-form-label">退款说明<span>（可不填）</span></label>
									<div class="am-form-content">
										<textarea placeholder="请输入退款说明" name="refund_other_reason"></textarea>
									</div>
								</div>
								<div>
									<br><br><br><br>
									<label for="refund-info" class="am-form-label">上传图片<span>（可不填）</span></label>
									<input type="file" name="refund_pic">
								</div>
								<div class="info-btn">
									<input type="submit" value="提交申请" class="am-btn am-btn-danger">
								</div>
							</div>
							<!-- <div class="refund-tip">
								<div class="filePic">
									<input type="file" class="inputPic" placeholder="请输入商品图片" value="选择凭证图片" name="refund_pic" max="5" maxsize="5120" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
									<img src="/Home/images/image.jpg" alt="">
								</div>
								<span class="desc">上传凭证&nbsp;最多三张</span>

							</div> -->
							
						</div>
						</form>
					</div>
					<div class="clear"></div>
				</div>
@endsection
				<!--底部-->
@section('foot')
				
			</div>

			<aside class="menu">
				<ul>
					<li class="person active">
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
@endsection