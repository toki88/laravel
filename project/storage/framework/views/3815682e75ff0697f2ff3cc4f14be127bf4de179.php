<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>Super Admin Responsive Template</title>
            
        <!-- CSS -->
        <link href="<?php echo e(asset('Admin/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('Admin/css/animate.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('Admin/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('Admin/css/form.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('Admin/css/calendar.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('Admin/css/style.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('Admin/css/icons.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('Admin/css/generics.css')); ?>" rel="stylesheet"> 
    </head>
    <body id="skin-blur-violate">

        <header id="header" class="media">
            <a href="" id="menu-toggle"></a> 
            <a class="logo pull-left" href="demo3">SUPER ADMIN 1.0</a>
            
            <div class="media-body">
                <div class="media" id="top-menu">
                    <div class="pull-left tm-icon">
                        <a data-drawer="messages" class="drawer-toggle" href="">
                            <i class="sa-top-message"></i>
                            <i class="n-count animated">5</i>
                            <span>Messages</span>
                        </a>
                    </div>
                    <div class="pull-left tm-icon">
                        <a data-drawer="notifications" class="drawer-toggle" href="">
                            <i class="sa-top-updates"></i>
                            <i class="n-count animated">9</i>
                            <span>Updates</span>
                        </a>
                    </div>

                    

                    <div id="time" class="pull-right">
                        <span id="hours"></span>
                        :
                        <span id="min"></span>
                        :
                        <span id="sec"></span>
                    </div>
                    
                    <div class="media-body">
                        <input type="text" class="main-search">
                    </div>
                </div>
            </div>
        </header>
        
        <div class="clearfix"></div>
        
        <section id="main" class="p-relative" role="main">
            
            <!-- Sidebar -->
            <aside id="sidebar">
                
                <!-- Sidbar Widgets -->
                <div class="side-widgets overflow">
                    <!-- Profile Menu -->
                    <div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
                        <a href="" data-toggle="dropdown">
                            <img class="profile-pic animated" src="<?php echo e(asset('Admin/img/profile-pic.jpg')); ?>" alt="">
                        </a>
                        <ul class="dropdown-menu profile-menu">
                            <li><a href="">My Profile</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="">Messages</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="">Settings</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="<?php echo e(url('admin/over')); ?>">Sign Out</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                        </ul>
                        <h4 class="m-0">Malinda Hollaway</h4>
                        @malinda-h
                    </div>
                    
                    <!-- Calendar -->
                    <div class="s-widget m-b-25">
                        <div id="sidebar-calendar"></div>
                    </div>
                    
                    <!-- Feeds -->
                    <div class="s-widget m-b-25">
                        <h2 class="tile-title">
                           News Feeds
                        </h2>
                        
                        <div class="s-widget-body">
                            <div id="news-feed"></div>
                        </div>
                    </div>
                    
                    <!-- Projects -->
                    <div class="s-widget m-b-25">
                        <h2 class="tile-title">
                            Projects on going
                        </h2>
                        
                        <div class="s-widget-body">
                            <div class="side-border">
                                <small>Joomla Website</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="progress-bar tooltips progress-bar-danger" style="width: 60%;" data-original-title="60%">
                                          <span class="sr-only">60% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Opencart E-Commerce Website</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-info" style="width: 43%;" data-original-title="43%">
                                          <span class="sr-only">43% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Social Media API</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-warning" style="width: 81%;" data-original-title="81%">
                                          <span class="sr-only">81% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>VB.Net Software Package</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-success" style="width: 10%;" data-original-title="10%">
                                          <span class="sr-only">10% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Chrome Extension</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-success" style="width: 95%;" data-original-title="95%">
                                          <span class="sr-only">95% Complete</span>
                                     </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Side Menu -->
                <ul class="list-unstyled side-menu">
                    <li class="active">
                        <a class="sa-side-home" href="/admin/index">
                            <span class="menu-item">Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">用户管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/user">显示用户信息</a></li>
                            <li><a href="/admin/user/create">添加用户</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">管理员管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/admin">显示管理员信息</a></li>
                            <li><a href="/admin/admin/create">添加管理员</a></li>
                        </ul>
                    </li>
                                        <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">分类管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/column">显示分类信息</a></li>
                            <li><a href="/admin/column/create">添加分类</a></li>
                        </ul>
                    </li>
                                        <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">商品管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/goods">显示商品信息</a></li>
                            <li><a href="/admin/column">添加商品</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">活动管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/recom">活动推荐管理</a></li>
                            <li><a href="/admin/recom/create">添加活动推荐</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">网站配置管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/config">显示网站配置</a></li>
                            <li><a href="/admin/config/create">添加网站配置</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">轮播图管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/imgloop">轮播图配置</a></li>
                            <li><a href="/admin/imgloop/create">添加轮播图</a></li>
                        </ul>
                    </li>  
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">评价管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/comments">显示评价</a></li>
                            <li><a href="/admin/comments/create">添加评价</a></li>
                        </ul>
                    </li>
                     <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">友情链接管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/flink">友情链接配置</a></li>
                            <li><a href="/admin/flink/create">添加友情链接</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">退货管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/refund">退货订单</a></li>
                        </ul>
                    </li>
                     <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">订单管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/book_lists/-1">待付款订单</a></li>
                            <li><a href="/admin/book_lists_f/0">待发货订单</a></li>
                            <li><a href="/admin/book_lists/1">待收货订单</a></li>
                            <li><a href="/admin/book_lists/2">待评价订单</a></li>
                            <li><a href="/admin/book_lists/10">评价完成订单</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">公告管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/announcement">显示公告</a></li>
                            <li><a href="/admin/announcement/create">添加公告</a></li>
                        </ul>
                    </li>
                </ul>

            </aside>
        
            <!-- Content -->
            <section id="content" class="container">
                <?php echo $__env->yieldContent('content'); ?>
            </section>

            <!-- Older IE Message -->
            <!--[if lt IE 9]>
                <div class="ie-block">
                    <h1 class="Ops">Ooops!</h1>
                    <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser in order to access the maximum functionality of this website. </p>
                    <ul class="browsers">
                        <li>
                            <a href="https://www.google.com/intl/en/chrome/browser/">
                                <img src="<?php echo e(asset('Admin/img/browsers/chrome.png')); ?>" alt="">
                                <div>Google Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.mozilla.org/en-US/firefox/new/">
                                <img src="<?php echo e(asset('Admin/img/browsers/firefox.png')); ?>" alt="">
                                <div>Mozilla Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com/computer/windows">
                                <img src="<?php echo e(asset('Admin/img/browsers/opera.png')); ?>" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://safari.en.softonic.com/">
                                <img src="<?php echo e(asset('Admin/img/browsers/safari.png')); ?>" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/downloads/ie-10/worldwide-languages">
                                <img src="<?php echo e(asset('Admin/img/browsers/ie.png')); ?>" alt="">
                                <div>Internet Explorer(New)</div>
                            </a>
                        </li>
                    </ul>
                    <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
                </div>   
            <![endif]-->
        </section>
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="<?php echo e(asset('Admin/js/jquery.min.js')); ?>"></script> <!-- jQuery Library -->
        <script src="<?php echo e(asset('Admin/js/jquery-ui.min.js')); ?>"></script> <!-- jQuery UI -->
        <script src="<?php echo e(asset('Admin/js/jquery.easing.1.3.js')); ?>"></script> <!-- jQuery Easing - Requirred for Lightbox + Pie Charts-->

        <!-- Bootstrap -->
        <script src="<?php echo e(asset('Admin/js/bootstrap.min.js')); ?>"></script>

        <!-- Charts -->
        <script src="<?php echo e(asset('Admin/js/charts/jquery.flot.js')); ?>"></script> <!-- Flot Main -->
        <script src="<?php echo e(asset('Admin/js/charts/jquery.flot.time.js')); ?>"></script> <!-- Flot sub -->
        <script src="<?php echo e(asset('Admin/js/charts/jquery.flot.animator.min.js')); ?>"></script> <!-- Flot sub -->
        <script src="<?php echo e(asset('Admin/js/charts/jquery.flot.resize.min.js')); ?>"></script> <!-- Flot sub - for repaint when resizing the screen -->

        <script src="<?php echo e(asset('Admin/js/sparkline.min.js')); ?>"></script> <!-- Sparkline - Tiny charts -->
        <script src="<?php echo e(asset('Admin/js/easypiechart.js')); ?>"></script> <!-- EasyPieChart - Animated Pie Charts -->
        <script src="<?php echo e(asset('Admin/js/charts.js')); ?>"></script> <!-- All the above chart related functions -->

        <!-- Map -->
        <script src="<?php echo e(asset('Admin/js/maps/jvectormap.min.js')); ?>"></script> <!-- jVectorMap main library -->
        <script src="<?php echo e(asset('Admin/js/maps/usa.js')); ?>"></script> <!-- USA Map for jVectorMap -->

        <!--  Form Related -->
        <script src="<?php echo e(asset('Admin/js/icheck.js')); ?>"></script> <!-- Custom Checkbox + Radio -->

        <!-- UX -->
        <script src="<?php echo e(asset('Admin/js/scroll.min.js')); ?>"></script> <!-- Custom Scrollbar -->

        <!-- Other -->
        <script src="<?php echo e(asset('Admin/js/calendar.min.js')); ?>"></script> <!-- Calendar -->
        <script src="<?php echo e(asset('Admin/js/feeds.min.js')); ?>"></script> <!-- News Feeds -->
        

        <!-- All JS functions -->
        <script src="<?php echo e(asset('Admin/js/functions.js')); ?>"></script>
    </body>
</html>
