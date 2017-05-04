<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?PHP
session_start();
$users = session()->get('users');
// $uid = $users['uid'];
// var_dump($users->name);die;
?>
@if(session('msg'))
	<script type="text/javascript">
		alert("{{ session('msg') }}");
	</script>
@endif
@if(session('error'))
	<script type="text/javascript">
		alert("{{ session('error') }}");
	</script>
@endif
@if( $list_config->state == 1)
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
		<meta name='csrf-token' content="{{ csrf_token() }}">
		<title>个人中心</title>

		<link href="/Home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="/Home/css/systyle.css" rel="stylesheet" type="text/css">
		<link href="/Home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/Home/css/refstyle.css" rel="stylesheet" type="text/css">
		<link href="/Home/css/addstyle.css" rel="stylesheet" type="text/css">
		<link href="/Home/css/infstyle.css" rel="stylesheet" type="text/css">
		<link href="/Home/css/lostyle.css" rel="stylesheet" type="text/css">
		<link href="/Home/css/refstyle.css" rel="stylesheet" type="text/css">
		<link href="/Home/css/appstyle.css" rel="stylesheet" type="text/css">
		<script src="/Home/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/Home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script type="text/javascript" src="/Home/js/jquery-1.7.2.min.js"></script>
		<link href="/Home/css/stepstyle.css" rel="stylesheet" type="text/css">
		<link href="/Home/css/orstyle.css" rel="stylesheet" type="text/css">

	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
			@if(!empty($users->name))
			<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
						<div class="menu-hd">
							<a href="#" target="_top" class="h">欢迎您，亲爱的{{ $users->name }}</a>|&nbsp;
							<a href="/home/over">登出</a>|
						</div>
					</div>
				</ul>
			<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd"><a href="/home/index" target="_top" class="h">商城首页</a></div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng"><a href="/home/per_index" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
					</div>
					<div class="topMessage mini-cart">
						<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
						
				</ul>
				</div>
				@else

				<div class="am-container header">
					<ul class="message-l">
						<div class="topMessage">
							<div class="menu-hd">
								<a href="/home/login" target="_top" class="h">亲，请登录</a>
								<a href="/home/register" target="_top">免费注册</a>
							</div>
						</div>
					</ul>
				<ul class="message-r">
						<div class="topMessage home">
							<div class="menu-hd"><a href="#" target="_top" class="h">&nbsp;</a></div>
						</div>
						<div class="topMessage my-shangcheng">
							<div class="menu-hd MyShangcheng"><a href="#" target="_top">&nbsp;</a></div>
						</div>
						<div class="topMessage mini-cart">
							<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><span>&nbsp;</span><strong id="J_MiniCartNum" class="h">&nbsp;</strong></a></div>
						</div>
						<div class="topMessage favorite">
							<div class="menu-hd"><a href="#" target="_top"><span>&nbsp;</span></a></div>
							
					</ul>
					</div>
				@endif

				<!--悬浮搜索框-->

				<div class="nav white">
					<div class="logoBig">
						
						<li><img src="/admin/upload/{{ $list_config->logo }}" /></li>
					
					</div>

					<div class="search-bar pr">
						<a name="index_none_header_sysc" href="#"></a>
						<form>
							<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
							<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
						</form>
					</div>
				</div>

						<div class="clear"></div>
					</div>
				</div>
			</article>
		</header>
@yield('logo')
			<div class="footer ">
						<div class="footer-hd ">
							
							<p>@foreach($list_friends as $v)
								<a href="{{ $v->url }}">{{ $v->name }}	　　</a>
								@endforeach
							</p>
							
						</div>
					<!-- <div class="footer"> -->
						<div class="footer-bd ">
							<p>
								<em>{{ $list_config->copyright }}</em>
							</p>
						</div>
				</div>
@yield('foot')

@else
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
<meta charset="utf-8" />
<title>网站维护界面</title>
<style>
div{position:absolute;top:50%;left:50%;overflow:hidden;width:300px;height:150px;margin:-75px 0 0 -150px;border:3px solid #eee;background:#e0e0e0;}
span{display:block;height:50px;font:bold 14px/50px Georgia;}
.a1{
    -webkit-transform:translate(60px);
    -moz-transform:translate(60px);
    transform:translate(60px);
    -webkit-animation:animations 2s ease-out 2s infinite forwards;
    -moz-animation:animations 2s ease-out 2s infinite forwards;
    animation:animations 2s ease-out 2s infinite forwards;
}
@-webkit-keyframes animations{
    0%{-webkit-transform:translate(0);opacity:0;}
    50%{-webkit-transform:translate(30px);opacity:1;}
    70%{-webkit-transform:translate(35px);opacity:1;}
    100%{-webkit-transform:translate(60px);opacity:0;}
}
@-moz-keyframes animations{
    0%{-moz-transform:translate(0);opacity:0;}
    50%{-moz-transform:translate(30px);opacity:1;}
    70%{-moz-transform:translate(35px);opacity:1;}
    100%{-moz-transform:translate(60px);opacity:0;}
}
@keyframes animations{
    0%{transform:translate(0);opacity:0;}
    50%{transform:translate(30px);opacity:1;}
    70%{transform:translate(35px);opacity:1;}
    100%{transform:translate(60px);opacity:0;}
}
.a3{
    opacity: 0;
    -webkit-transform:translate(100px);
    -moz-transform:translate(100px);
    transform:translate(100px);
    -webkit-animation:animations3 2s ease-out 2s infinite forwards;
    -moz-animation:animations3 2s ease-out 2s infinite forwards;
    animation:animations3 2s ease-out 2s infinite forwards;
}
@-webkit-keyframes animations3{
    0%{-webkit-transform:translate(160px);opacity:0;}
    50%{-webkit-transform:translate(130px);opacity:1;}
    70%{-webkit-transform:translate(125px);opacity:1;}
    100%{-webkit-transform:translate(100px);opacity:0;}
}
@-moz-keyframes animations3{
    0%{-moz-transform:translate(160px);opacity:0;}
    50%{-moz-transform:translate(130px);opacity:1;}
    70%{-moz-transform:translate(125px);opacity:1;}
    100%{-moz-transform:translate(100px);opacity:0;}
}
@keyframes animations3{
    0%{transform:translate(160px);opacity:0;}
    50%{transform:translate(130px);opacity:1;}
    70%{transform:translate(125px);opacity:1;}
    100%{transform:translate(100px);opacity:0;}
}
.a2{
    opacity: 0;
    text-align:center;font-size:26px;
    -webkit-animation:animations2 5s ease-in-out 4s infinite forwards;
    -moz-animation:animations2 5s ease-in-out 4s infinite forwards;
    animation:animations2 5s ease-in-out 4s infinite forwards;
}
@-webkit-keyframes animations2{
    0%{opacity:0;}
    40%{opacity:.8;}
    45%{opacity:.3;}
    50%{opacity:.8;}
    55%{opacity:.3;}
    60%{opacity:.8;}
    100%{opacity:0;}
}
@-moz-keyframes animations2{
    0%{opacity:0;}
    40%{opacity:.8;}
    45%{opacity:.3;}
    50%{opacity:.8;}
    55%{opacity:.3;}
    60%{opacity:.8;}
    100%{opacity:0;}
}
@keyframes animations2{
    0%{opacity:0;}
    40%{opacity:.8;}
    45%{opacity:.3;}
    50%{opacity:.8;}
    55%{opacity:.3;}
    60%{opacity:.8;}
    100%{opacity:0;}
}
</style>
</head>
<body>
<div>
    <span class="a1">我们正在维护网页</span>
    <span class="a2">网站维护中...</span>
    <span class="a3">请稍后再进行访问</span>
</div>
</body>
</html>
@endif