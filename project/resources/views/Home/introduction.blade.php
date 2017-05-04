        <link href="/Home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
        <link href="/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
        <link href="/Home/basic/css/demo.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="/Home/css/optstyle.css" rel="stylesheet" />
        <link type="text/css" href="/Home/css/style.css" rel="stylesheet" />

        <script type="text/javascript" src="/Home/basic/js/jquery-1.7.min.js"></script>
        <script type="text/javascript" src="/Home/basic/js/quick_links.js"></script>

        <script type="text/javascript" src="/Home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
        <script type="text/javascript" src="/Home/js/jquery.imagezoom.min.js"></script>
        <script type="text/javascript" src="/Home/js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="/Home/js/list.js"></script>

@extends('Home.base.parent')
@section('content')




            <div class="clear"></div>
            <b class="line"></b>
            <div class="listMain">

                <!--分类-->
            <div class="nav-table" style='display:1111;'>
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
                <ol class="am-breadcrumb am-breadcrumb-slash">
                    <li><a href="#">首页</a></li>
                    <li><a href="#">分类</a></li>
                    <li class="am-active">内容</li>
                </ol>
                <script type="text/javascript">
                    $(function() {});
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            start: function(slider) {
                                $('body').removeClass('loading');
                            }
                        });
                    });
                </script>
                <div class="scoll">
                    <section class="slider">
                        <div class="flexslider">
                            <ul class="slides">
                                @foreach($pic as $v)
                                <li>
                                    <img src="/admin/upload/s_{{ $v }}" title="pic" />
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                </div>

                <!--放大镜-->

                <div class="item-inform">
                    <div class="clearfixLeft" id="clearcontent">

                        <div class="box">
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $(".jqzoom").imagezoom();
                                    $("#thumblist li a").click(function() {
                                        $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
                                        $(".jqzoom").attr('src', $(this).find("img").attr("mid"));
                                        $(".jqzoom").attr('rel', $(this).find("img").attr("big"));
                                    });
                                });
                            </script>

                            <div class="tb-booth tb-pic tb-s310">
                                <a href="/admin/upload/s_{{ $pic[0] }}"><img src="/admin/upload/s_{{ $pic[0] }}" alt="细节展示放大镜特效" rel="/admin/upload/{{ $pic[0] }}" class="jqzoom" /></a>
                            </div>
                            <ul class="tb-thumb" id="thumblist">
                                @foreach($pic as $v)
                                <li class="tb-selected">
                                    <div class="tb-pic tb-s40">
                                        <a href="#"><img src="/admin/upload/ss_{{ $v }}" mid="/admin/upload/s_{{ $v }}" big="/admin/upload/{{ $v }}"></a>
                                    </div>
                                </li>
                                @endforeach
                                

                            </ul>
                        </div>

                        <div class="clear"></div>
                    </div>

                    <div class="clearfixRight">

                        <!--规格属性-->
                        <!--名称-->
                        <div class="tb-detail-hd">
                            <h1>    
                 {{ $ob['0']->gname}}
              </h1>
                        </div>
                        <div class="tb-detail-list">
                            <!--价格-->
                            <div class="tb-detail-price">
                                <li class="price iteminfo_price">
                                    <dt>{{ $ob['0']->title}}</dt>
                                    <dd><em>¥</em><b class="sys_item_price">{{ $ob['0']->price}}</b>  </dd>                                 
                                </li>
                                <li class="price iteminfo_mktprice">
                                    <dt>原价</dt>
                                    <dd><em>¥</em><b class="sys_item_mktprice">{{ $ob['0']->oprice}}</b></dd>                                   
                                </li>
                                <div class="clear"></div>
                            </div>

                            <!--地址-->
                            <dl class="iteminfo_parameter freight">
                                <dt>配送至</dt>
                                <div class="iteminfo_freprice">
                                    <div class="am-form-content address">
                                        <select data-am-selected>
                                            <option value="a">全国</option>
                                        </select>

                                    </div>
                                    <div class="pay-logis">
                                        快递<b class="sys_item_freprice">10</b>元
                                    </div>
                                </div>
                            </dl>
                            <div class="clear"></div>

                            <!--销量-->
                            <ul class="tm-ind-panel">
                                <li class="tm-ind-item tm-ind-sellCount canClick">
                                    <div class="tm-indcon"><span class="tm-label">月销量</span><span class="tm-count">{{ $ob['0']->sell}}</span></div>
                                </li>
                                <li class="tm-ind-item tm-ind-sumCount canClick">
                                    <div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count">{{ $ob['0']->sell}}</span></div>
                                </li>
                                <li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
                                    <div class="tm-indcon"><span class="tm-label">累计评价</span><span class="tm-count">640</span></div>
                                </li>
                            </ul>
                            <div class="clear"></div>

                            <!--各种规格-->
                            <dl class="iteminfo_parameter sys_item_specpara">
                                <dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
                                <dd>
                                    <!--操作页面-->

                                    <div class="theme-popover-mask"></div>

                                    <div class="theme-popover">
                                        <div class="theme-span"></div>
                                        <div class="theme-poptit">
                                            <a href="javascript:;" title="关闭" class="close">×</a>
                                        </div>
                                        <div class="theme-popbod dform">
                                            <form class="theme-signin" name="loginform" method="post">
                                                {{ csrf_field() }}

                                                <div class="theme-signin-left">
                                                    @foreach($che as $k=>$v)
                                                    <div class="theme-options">
                                                        <ul ><span class='sku-span'>{{ $v[0] }}</span>
                                                        
                                                        
                                                            @foreach($v[1] as $ka=>$va)
                                                            @if($ka%2==0)
                                                            <br>　{{ $va }} <input type='radio' name='{{ $v[0] }}' value='{{ $va }}'>　
                                                            @endif
                                                            @if($ka%2==1)
                                                            　{{ $va }} <input type='radio' name='{{ $v[0] }}' value='{{ $va }}'>　
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endforeach

                                                    <script type="text/javascript">


                                                    </script>
                                                    <div class="theme-options">
                                                        <div class="cart-title number">数量</div>
                                                        <dd>
                                                            <input type='hidden' name='price' value='{{$ob[0]->price }}'>
                                                            <input type='hidden' name='name' value='{{$ob[0]->gname }}'>
                                                            <input type='hidden' name='gid' value='{{$ob[0]->gid }}'>
                                                            <input type='hidden' name='pic' value='{{$ob[0]->showpic }}'>
                                                            <!-- <input type='hidden' name='pirce' value='{{$ob[0]->price }}'>
                                                            <input type='hidden' name='pirce' value='{{$ob[0]->price }}'> -->
                                                            <input id="min" class="am-btn am-btn-default" name="" type="button" value="-" />
                                                            <input id="text_box" name="num" type="text" value="1" style="width:30px;" />
                                                            <input id="add" class="am-btn am-btn-default" name="" type="button" value="+" />
                                                            <span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
                                                        </dd>

                                                    </div>
                                                    <div class="clear"></div>

                                                    <div class="btn-op">
                                                        <div class="btn am-btn am-btn-warning">确认</div>
                                                        <div class="btn close am-btn am-btn-warning">取消</div>
                                                    </div>
                                                </div>
                                                <div class="theme-signin-right">
                                                    <div class="img-info">
                                                        <img src="/Home/images/songzi.jpg" />
                                                    </div>
                                                    <div class="text-info">
                                                        <span class="J_Price price-now">¥39.00</span>
                                                        <span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
                                                    </div>
                                                </div>
                                                
                                           
                                        </div>
                                    </div>
                                </dd>
                            </dl>
                            <div class="clear"></div>
                            <!--活动  -->
                            <div class="shopPromotion gold">
                                <div class="hot">
                                    <dt class="tb-metatit">店铺优惠</dt>
                                    <div class="gold-list">
                                        <p>买第二件价格双倍</p>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="coupon">
                                    <dt class="tb-metatit">优惠券</dt>

                                </div>
                            </div>
                        </div>

                        <div class="pay">
                            <div class="pay-opt">
                            <a href="home.html"><span class="am-icon-home am-icon-fw">首页</span></a>
                            <a><span class="am-icon-heart am-icon-fw">收藏</span></a>
                            
                            </div>
                            <li>
                                <div class="clearfix tb-btn tb-btn-buy theme-login">
                                    <a id="LikBuy" title="点此按钮到下一步确认购买信息" href="javascript:buy()">立即购买</a>
                                </div>
                            </li>
                                <script type="text/javascript">
                                    function doDel(){
                                            var form = document.loginform;
                                            form.action = '/home/tijiao';
                                            form.submit();
                                    }
                                    function buy(){
                                            var form = document.loginform;
                                            form.action = '/home/buy';
                                            form.submit();
                                    }
                                </script>
                            <li>
                                <div class="clearfix tb-btn tb-btn-basket theme-login">
                                    <a id="LikBasket" title="加入购物车" href="javascript:doDel()"><i></i>加入购物车</a>
                                </div>
                            </li>
                        </div>
                    </form>
                    </div>

                    <div class="clear"></div>

                </div>

                <!--优惠套装-->
                <div class="match">
                    <div class="match-title">优惠套装</div>
                    <div class="match-comment">
                        <ul class="like_list">
                            <li>
                                <div class="s_picBox">
                                    <a class="s_pic" href="#"><img src="/Admin/upload/{{ $ob['0']->showpic }}"></a>
                                </div> <a class="txt" target="_blank" href="#">{{ $ob['0']->gname}}</a>
                                <div class="info-box"> <span class="info-box-price">¥ {{ $ob['0']->price}}</span> <span class="info-original-price">￥ {{ $ob['0']->oprice}}</span> </div>
                            </li>
                            
                            <li class="plus_icon"><i>=</i></li>
                            <li class="total_price">
                                <p class="combo_price"><span class="c-title">套餐价:</span><span>￥{{ $ob['0']->price}}</span> </p>
                                <p class="save_all">省:<span>￥99.00</span></p> <a href="#" class="buy_now">立即购买</a> </li>
                            <li class="plus_icon"><i class="am-icon-angle-right"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
                
                            
                <!-- introduce-->

                <div class="introduce">
                    <div class="browse">
                        <div class="mc"> 
                             <ul>                       
                                <div class="mt">            
                                    <h2>看了又看</h2>        
                                </div>
                                  @foreach($ob5 as $v)
                                  <a  href="/home/goods/{{ $v->gid }}" >
                                  <li class="first">

                                    <div class="p-img">                    
                                         <img class="" src="/Admin/upload/{{ $v->showpic }}"> </a>               
                                    </div>
                                    <div class="p-name"><a href="#">
                                        {{ $v->gname }}
                                    
                                    </div>
                                    <div class="p-price"><strong>￥{{ $v->price }}</strong></div>
                                  </li></a>
                                  @endforeach
                             </ul>                  
                        </div>
                    </div>
                    <div class="introduceMain">
                        <div class="am-tabs" data-am-tabs>
                            <ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
                                <li class="am-active">
                                    <a href="#">

                                        <span class="index-needs-dt-txt">宝贝详情</span></a>

                                </li>

                                <li>
                                    <a href="#">

                                        <span class="index-needs-dt-txt">全部评价</span></a>

                                </li>

                                <li>
                                    <a href="#">

                                        <span class="index-needs-dt-txt">猜你喜欢</span></a>
                                </li>
                            </ul>

                            <div class="am-tabs-bd">

                                <div class="am-tab-panel am-fade am-in am-active">
                                    <div class="J_Brand">

                                        <div class="attr-list-hd tm-clear">
                                            <h4>产品参数：</h4></div>
                                        <div class="clear"></div>
                                        <ul id="J_AttrUL">
                                            @foreach($data as $v)
                                            <li title="">{{ $v }}</li>
                                            @endforeach
                                        </ul>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="details">
                                        <div class="attr-list-hd after-market-hd">
                                            <h4>商品细节</h4>
                                        </div>
                                        <div class="twlistNews">
                                            @foreach($spec as $v)
                                            <img src="/admin/upload/{{ $v }}" />
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="clear"></div>

                                </div>

                                <div class="am-tab-panel am-fade">
                                    
                                    <div class="actor-new">
                                        <div class="rate">                
                                            <strong>100<span>%</span></strong><br> <span>好评度</span>            
                                        </div>
                                        <dl>                    
                                            <dt>买家印象</dt>                    
                                            <dd class="p-bfc">
                                                        <q class="comm-tags"><span>味道不错</span><em>(2177)</em></q>
                                                        <q class="comm-tags"><span>颗粒饱满</span><em>(1860)</em></q>
                                                        <q class="comm-tags"><span>口感好</span><em>(1823)</em></q>
                                                        <q class="comm-tags"><span>商品不错</span><em>(1689)</em></q>
                                                        <q class="comm-tags"><span>香脆可口</span><em>(1488)</em></q>
                                                        <q class="comm-tags"><span>个个开口</span><em>(1392)</em></q>
                                                        <q class="comm-tags"><span>价格便宜</span><em>(1119)</em></q>
                                                        <q class="comm-tags"><span>特价买的</span><em>(865)</em></q>
                                                        <q class="comm-tags"><span>皮很薄</span><em>(831)</em></q> 
                                            </dd>                                           
                                         </dl> 
                                    </div>  
                                    <div class="clear"></div>
                                    <div class="tb-r-filter-bar">
                                        <ul class=" tb-taglist am-avg-sm-4">
                                            <li class="tb-taglist-li tb-taglist-li-current">
                                                <div class="comment-info">
                                                    <span>全部评价</span>
                                                    <span class="tb-tbcr-num">(32)</span>
                                                </div>
                                            </li>

                                            <li class="tb-taglist-li tb-taglist-li-1">
                                                <div class="comment-info">
                                                    <span>好评</span>
                                                    <span class="tb-tbcr-num">(32)</span>
                                                </div>
                                            </li>

                                            <li class="tb-taglist-li tb-taglist-li-0">
                                                <div class="comment-info">
                                                    <span>中评</span>
                                                    <span class="tb-tbcr-num">(32)</span>
                                                </div>
                                            </li>

                                            <li class="tb-taglist-li tb-taglist-li--1">
                                                <div class="comment-info">
                                                    <span>差评</span>
                                                    <span class="tb-tbcr-num">(32)</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clear"></div>

                                    <ul class="am-comments-list am-comments-list-flip">
                                        @foreach($ob1 as $v)
                                        <li class="am-comment">
                                            <!-- 评论容器 -->
                                            <a href="">
                                                <img class="am-comment-avatar" src="/Home/images/hwbn40x40.jpg" />
                                                <!-- 评论者头像 -->
                                            </a>

                                            <div class="am-comment-main">
                                                <!-- 评论内容容器 -->
                                                <header class="am-comment-hd">
                                                    <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                    <div class="am-comment-meta">
                                                        <!-- 评论元数据 -->
                                                        <a href="#link-to-user" class="am-comment-author">(匿名)</a>
                                                        <!-- 评论者 -->
                                                        评论于
                                                        <time datetime="">{{ date('Y-m-d H:i:s',$v->time)}}</time>
                                                    </div>
                                                </header>

                                                <div class="am-comment-bd">
                                                    <div class="tb-rev-item " data-id="255776406962">
                                                        <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                            {{$v->content}}
                                                        </div>

                                                    </div>

                                                </div>
                                                <!-- 评论内容 -->
                                            </div>
                                        </li>
                                        @endforeach

                                    </ul>

                                    <div class="clear"></div>

                                    <!--分页 -->
                                    <ul class="am-pagination am-pagination-right">
                                        <li class="am-disabled"><a href="#">&laquo;</a></li>
                                        <li class="am-active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                    <div class="clear"></div>

                                    <div class="tb-reviewsft">
                                        <div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
                                    </div>

                                </div>

                                <div class="am-tab-panel am-fade">
                                    <div class="like">
                                        <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                                            @foreach($ob3 as $v)
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/Admin/upload/{{ $v->showpic}}" />
                                                    <p>{{ $v->gname}}
                                                        </p>
                                                    <p class="price fl">
                                                        <b>¥</b>
                                                        <strong>{{ $v->price }}</strong>
                                                    </p>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="clear"></div>

                                    <!--分页 -->
                                    <ul class="am-pagination am-pagination-right">
                                        <li class="am-disabled"><a href="#">&laquo;</a></li>
                                        <li class="am-active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                    <div class="clear"></div>

                                </div>

                            </div>

                        <!-- </div> -->

                        <div class="clear"></div>

@stop