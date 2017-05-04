<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect('/home/index');
});



// 后台路由群组
Route::group(['prefix' => 'admin','middleware' => 'login'],function(){
    //后台首页
    Route::resource('/index','Admin\IndexController');
    // 用户管理
    Route::resource('/user','User\UsersController');
        // 用户管理
    Route::resource('/imgloop','Admin\ImgloopController');
        //管理员管理
    Route::resource('/admin','Admin\AdminController');
    //活动管理
    Route::resource('/recom','Admin\RecommendController');
    //网站设置管理
    Route::resource('/config','Admin\ConfigController');
    // 用户退出
    Route::get('/over','Admin\LoginController@over');
    // 分类管理
    Route::resource('/column','Column\ColumnController');
    // 创建子类
    route::get('addSon/{id}','Column\ColumnController@addSon');
    route::post('addSon','Column\ColumnController@storeSon');
    // 商品管理
    route::resource('/goods','Goods\GoodsController');
    // 商品详情
    route::get('selgoods/{id}','Goods\GoodsController@selgoods');

    route::post('updgoods/{id}','Goods\GoodsController@updgoods');
    //添加商品
    route::get('addgoods/{id}/{path}','Goods\GoodsController@addgoods');
    // 评价管理
    route::resource('/comments','comments\commentsController');
    //友情链接管理
    Route::resource('/flink','Admin\FlinkController');
    //订单管理
    Route::resource('/book_lists','Admin\Book_listsController');
    Route::resource('/book_lists_f','Admin\DeliveryController');
    Route::post('/book_lists_l','Admin\DeliveryController@insa');

    // 退货管理
    Route::resource('/refund','Admin\RefundController');
    route::get('/torefund/{id}','Admin\RefundController@do');
    // 公告管理
    route::resource('/announcement','Announcement\AnnouncementController');
});
// 登录
Route::get('admin/login','Admin\LoginController@index');
Route::post('admin/dologin','Admin\LoginController@dologin');
// 验证码
Route::get('Admin/captch/{tmp}','Admin\LoginController@captch');

Route::group(['prefix' => 'home'],function(){
    // 前台分类
    route::get('/search/','Home\SearchController@index');
    // 前台商品分类
    Route::get('/search/path/{path}','Home\SearchController@path');
    //前台首页
    Route::get('/index', 'Home\IndexController@index');
    // 前台商品页
    Route::get('/goods/{id}', 'Home\GoodsController@index');
    // 前台商品提交购物车(缓存)
    Route::post('/tijiao', 'Home\GoodsController@tijiao');
    // 前台商品提交到购买页
    route::post('/buy','Home\GoodsController@buy');
    // 前台登录
    Route::get('/login','Home\LoginController@index');
    // 前台退出
    Route::get('/over','Home\LoginController@over');
    
    Route::post('/dologin','Home\LoginController@dologin');
    // 前台注册
    Route::get('/register','Home\RegisterController@index');
    Route::post('/doregister','Home\RegisterController@doregister');
    // 前台修改密码
    Route::get('/rpass','Home\RpassController@index');
    Route::post('/dorpass','Home\RpassController@dorpass');
    //前台验证码
    Route::get('/captch/{tmp}','Home\LoginController@captch');

    // ajax请求
    Route::get('/ajaxdemo','Home\AjaxController@index');
    Route::get('/ajaxdemo/gets','Home\AjaxController@doget');
    Route::post('/ajaxdemo/posts','Home\AjaxController@dopost');
 //前台个人中心首页
    Route::resource('/per_index','Home\Per_indexController');
    //personal information
    Route::resource('/per_infmt','Home\per_infmtController');
    //安全设置路由
    Route::resource('/per_safety','Home\per_safetyController');
    // 收货地址路由
    Route::resource('/per_address','Home\per_addressController');
    // 选中默认地址
    Route::get('/per_add/{id}','Home\per_addressController@addr');
    // 订单管理
    Route::resource('/per_order','Home\OrderController');
    // 个人中心首页显示订单
    Route::get('/per_order_per','Home\OrderController@per');
    // 取消订单
    Route::get('/per_qxorder/{id}','Home\OrderController@qx');
     // 查询要评价的订单
    Route::get('/per_commentlist/{id}','Home\OrderController@pj');
    // 提交评价
    Route::resource('/per_comment','Home\OrderController');
    //订单物流
    Route::get('/per_loorder/{id}','Home\OrderController@lo');
    // 删除订单
    Route::get('/per_delorder/{id}','Home\OrderController@delorder');
    //确认收货  
    Route::get('/per_confirm/{id}','Home\OrderController@confirm'); 
    //退货退款
    Route::get('/per_reorder/{id}','Home\OrderController@reorder');
    //退款售后
    Route::resource('/per_change','Home\ChangeController');
    Route::get('/per_record/{id}','Home\ChangeController@record');
    //购物车
    route::resource('/shopcart','Home\ShopcartController');
    route::post('/do','Home\ShopcartController@do');

    //清理购物车
    route::get('/clear','Home\GoodsController@clear');

        //结算界面
    Route::get('/checkbuy/{did}','Home\CheckbuyController@index');
    //结算成功页面
    Route::get('/checkbuy/{did}/success','Home\CheckbuyController@success');

});

