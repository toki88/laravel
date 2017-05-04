<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();
        //从数据库中找出需要显示的分类
    	$ob = DB::table('columns')->where('display','1')->get()->all();
        //遍历数组,得到该类下的所有商品
    	foreach($ob as $k=>$v)
    	{
    		$ob2 = DB::table('goods')->select()->where('path','like',"0,{$v->cid}%")->limit(12)->get()->all();
            
            // var_dump($ob2);die;
    		foreach($ob2 as $k=>$v)
    		{
    			$v->path=substr($v->path,2,1);
    			$a[]=$v;
    		}
            // var_dump($ob);
            // var_dump($ob2);die;
    	}
        //从数据库中查找所有的分类
        $ob3 = DB::table('columns')->select()->get()->all();
        //从数据库中查找所有商城头条
        $ob4 = DB::table('announcement')->select()->get()->all();
        //查找数据库中的轮播表
        $ob5 = DB::table('imgloop')->select()->limit(4)->get()->all();
        //查找数据库中的活动信息
        $ob6 = DB::table('recommend')->select()->limit(4)->get()->all();
        // var_dump($ob6);die;
        //返回视图
    	return view('Home.index',['ob6'=>$ob6, 'ob4'=>$ob5, 'ob'=>$ob,'goods'=>$a,'columns'=>$ob3,'announcement'=>$ob4,'list_friends'=>$list_friends,'list_config'=>$list_config]);
    }
}
