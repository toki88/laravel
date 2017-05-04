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
					<div class="user-address">
						<!--标题 -->
						<!-- <div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
						</div> -->
						<hr/>
						
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" action="/home/per_address/{{ $data->id }}" method="post">
										{{ csrf_field() }}
										{{ method_field('PUT') }}
										<input type="hidden" name="uid" value="{{ session('users')->uid }}">
										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" name="consignee" placeholder="{{ $data->consignee }}" value="{{ $data->consignee }}" disabled>
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input name="phone" placeholder="{{ $data->phone }}" type="text" value="{{ $data->phone }}">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地</label>
											<div class="am-form-content address">
												<select id='cid' name='city[]'>
													<option>--请选择--</option>
												</select>
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea class="" rows="3" name="address" placeholder="{{ $data->address }}" value="{{ $data->address }}">{{ $data->address }}</textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>
										<br><br><br><br><br>
										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<input type="submit" value="保存" class="am-btn am-btn-danger">
												<!-- <input type="reset" value="取消"> -->
												<a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close>重置</a>
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>
					
					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})
					</script>

					<div class="clear"></div>

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
							<li class="active"> <a href="/home/per_address">收货地址</a></li>
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
	 <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
	 <script type="text/javascript">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		
		$.ajax({
			url:'/home/ajaxdemo/gets',
			type:'get',
			async:true,
			data:{upid:0},
			dataType:'json',
			// alert(333333);
			success:function(data)
			{
				console.log(data);
				//遍历从数据库查出来的数据，生成option选项追加到select里
				for (var i = 0; i < data.length; i++) {
					$('#cid').append("<option value="+data[i].id+">"+data[i].name+"</option>");
				};
			},
			error:function()
			{
				alert('ajax请求失败');
			}
		});

		//给所有的select标签绑定change事件
		$('select').live("change",function(){
			//干掉当前你选择的select标签后面的select标签
			$(this).nextAll('select').remove();
			//判断你选择是不是--请选择--
			if($(this).val() != '--请选择--'){
				//因为在ajax的回调函数中需要使用当前对象，但是$(this)在ajax的回调函数中用不了
				var ob = $(this);
				$.ajax({
					url:'/home/ajaxdemo/posts',
					type:'post',
					async:true,
					// ,'_token':"{{ csrf_token() }}"
					data:{upid:$(this).val()},
					dataType:'json',
					success:function(data)
					{
						// alert(data);
						// console.log(data);
						//判断是不是最后一级城市，最后一级城市查数据库length==0
						if(data.length>0){
							//生成一个新的select标签
							var select = $("<select name='city[]'><option>--请选择--</option></select>");
							//遍历从数据库查出来的数据，生成option选项追加到select里
							for (var i = 0; i < data.length; i++) {
								$(select).append("<option value="+data[i].id+">"+data[i].name+"</option>");
							};
							//外部插入到前一个select后面
							ob.after(select);
						}
					},
					error:function()
					{
						alert('ajax请求失败');
					}
				});
			}
		});
	 </script>
	
</html>
@endsection