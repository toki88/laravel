<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
class ParentController extends Controller
{
    //
    public function index(Request $request)
    {	
    	// 获取友情链接表中的数据
    	$list_friends = DB::table('friends')->get();
    	// 获取网站设置中开启的设置
    	$list_config = DB::table('config')->where('display', '1')->get()->first();
    	// 带值返回页面
    	return view('Home.base.parent',['list_friends'=>$list_friends,'list_config'=>$list_config]);
    }
}
