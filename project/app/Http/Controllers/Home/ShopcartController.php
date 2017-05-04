<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Users;

use DB;
class ShopcartController extends Controller
{
    public function index()
    {   
        // session()->forget('c');
        // 获取友情链接表的数据
    	$list_friends = DB::table('flinks')->get();
        // 获取网站设置表中开启中设置
    	$list_config = DB::table('config')->where('display', '1')->get()->first();
        // 获取session中的购物车的缓存
        $books=session('c');
        // var_dump($books);
        // var_dump(session('c'));die;
        // session()->forget('c');
        // var_dump(session('c'));die;
        // var_dump($books);die;
    	// 带值返回页面
        return view('Home.shopcart',['books'=>$books,'list_friends'=>$list_friends,'list_config'=>$list_config]);
    }
    public function do(Request $request)
    {
        // 获取页面返回的值（除了令牌的token）
        $data = $request->except('_token');
        // var_dump($data);die;
        // 将从前台页面获取的数据上传到数据库
        $id = DB::table('book_lists')->insertGetId($data);
        // 返回页面
        return redirect('home/checkbuy/'.$id);
    	// // session(['book_list'=>$ob])
    	// getRouteForMethods(object(Request), array('GET', 'HEAD'))
    }
}
