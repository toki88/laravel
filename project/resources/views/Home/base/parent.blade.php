<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?PHP
session_start();
$users = session()->get('users');
?>
@if( $list_config->state == 1)
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
        <title>{{ $list_config->title }}</title>
        <meta name="keywords" content="{{ $list_config->key }}">
        <meta name="description" content="{{ $list_config->desn }}">

<!-- .. -->

    </head>

    <body>
        <!-- <div class="hmtop"> -->
            <!--顶部导航条 -->
            <!-- <div class="am-container header"> -->

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
                        <div class="menu-hd"><a id="mc-menu-hd" href="/home/shopcart" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">{{ count(session('c'))/7 }}</strong></a></div>
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

                <div class="nav white" style='display:-99999;'>
                    <div class="logo" style='display:-99999;'><img src="/Home/images/logo.png" /></div>
                    <div class="logoBig">
                        
                        <li><img src="/admin/upload/{{ $list_config->logo }}" /></li>
                    
                    </div>

                    <div class="search-bar pr">
                        <a name="index_none_header_sysc" href="#"></a>
                        <form method='get' action='/home/search'>
                            <input  name="ss" type="text" >
                            <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
                        </form>

                    </div>
                </div>

        
            <section >
                @yield('content')
            </section>
            <div class="footer ">
                        <div class="footer-hd ">
                            
                            <p>@foreach($list_friends as $v)
                                <a href="{{ $v->url }}">{{ $v->name }}  　　</a>
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
            </div>
        </div>
        </div>
        <!--引导 -->

        <div class="navCir">
            <li class="active"><a href="home3.html"><i class="am-icon-home "></i>首页</a></li>
            <li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
            <li><a href=""><i class="am-icon-shopping-basket"></i>购物车</a></li>  
            <li><a href=""
                ><i class="am-icon-user"></i>我的</a></li>                    
        </div>
        <!--菜单 -->
        <div class='tip'>
            <div id="sidebar">
                <div id="wrap">
                    <div id="prof" class="item ">
                        <a href="# ">
                            <span class="setting "></span>
                        </a>
                        <div class="ibar_login_box status_login ">
                            <div class="avatar_box ">
                                <p class="avatar_imgbox "><img src="/Home/images/no-img_mid_.jpg " /></p>
                                <ul class="user_info ">
                                    <li>用户名：sl1903</li>
                                </ul>
                            </div>
                            <div class="login_btnbox ">
                                <a href="# " class="login_order ">我的订单</a>
                                <a href="# " class="login_favorite ">我的收藏</a>
                            </div>
                            <i class="icon_arrow_white "></i>
                        </div>

                    </div>
                    <div id="shopCart " class="item ">
                        <a href="/home/shopcart">
                            <span class="message "></span>
                        </a>
                        <p>
                            购物车
                        </p>
                        <p class="cart_num ">{{ count(session('c'))/7 }}</p>
                    </div>
                    <div id="asset " class="item ">
                        <a href="# ">
                            <span class="view "></span>
                        </a>
                        <div class="mp_tooltip ">
                            我的资产
                            <i class="icon_arrow_right_black "></i>
                        </div>
                    </div>

                    <div id="foot " class="item ">
                        <a href="# ">
                            <span class="zuji "></span>
                        </a>
                        <div class="mp_tooltip ">
                            我的足迹
                            <i class="icon_arrow_right_black "></i>
                        </div>
                    </div>

                    <div id="brand " class="item ">
                        <a href="#">
                            <span class="wdsc "><img src="/Home/images/wdsc.png " /></span>
                        </a>
                        <div class="mp_tooltip ">
                            我的收藏
                            <i class="icon_arrow_right_black "></i>
                        </div>
                    </div>

                    <div id="broadcast " class="item ">
                        <a href="# ">
                            <span class="chongzhi "><img src="/Home/images/chongzhi.png " /></span>
                        </a>
                        <div class="mp_tooltip ">
                            我要充值
                            <i class="icon_arrow_right_black "></i>
                        </div>
                    </div>

                    <div class="quick_toggle ">
                        <li class="qtitem ">
                            <a href="# "><span class="kfzx "></span></a>
                            <div class="mp_tooltip ">客服中心<i class="icon_arrow_right_black "></i></div>
                        </li>
                        <!--二维码 -->
                        <li class="qtitem ">
                            <a href="#none "><span class="mpbtn_qrcode "></span></a>
                            <div class="mp_qrcode " style="display:none; "><img src="/Home/images/weixin_code_145.png " /><i class="icon_arrow_white "></i></div>
                        </li>
                        <li class="qtitem ">
                            <a href="#top " class="return_top "><span class="top "></span></a>
                        </li>
                    </div>

                    <!--回到顶部 -->
                    <div id="quick_links_pop " class="quick_links_pop hide "></div>

                </div>

            </div>
            <div id="prof-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    我
                </div>
            </div>
            <div id="shopCart-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    购物车
                </div>
            </div>
            <div id="asset-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    资产
                </div>

                <div class="ia-head-list ">
                    <a href="# " target="_blank " class="pl ">
                        <div class="num ">0</div>
                        <div class="text ">优惠券</div>
                    </a>
                    <a href="# " target="_blank " class="pl ">
                        <div class="num ">0</div>
                        <div class="text ">红包</div>
                    </a>
                    <a href="# " target="_blank " class="pl money ">
                        <div class="num ">￥0</div>
                        <div class="text ">余额</div>
                    </a>
                </div>

            </div>
            <div id="foot-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    足迹
                </div>
            </div>
            <div id="brand-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    收藏
                </div>
            </div>
            <div id="broadcast-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    充值
                </div>
            </div>
        </div>
        <script>
            window.jQuery || document.write('<script src="basic/js/jquery.min.js "><\/script>');
        </script>
        <script type="text/javascript " src="/home/basic/js/quick_links.js "></script>
    </body>

</html>

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