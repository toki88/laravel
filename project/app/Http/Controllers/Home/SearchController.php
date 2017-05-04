<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();
        $where = '';
        $ob = DB::table('goods');
        // var_dump($ob);die;
        //如果有name查询,执行查询
        if($request->has('ss')){
            // echo 11;die;
            $ss = $request->input('ss');
            // var_dump($ss);die;
            //获取要查询的Name关键字
            $where['ss'] = $ss;
            $ob->where('gname','like',"%{$ss}%");
        }
        // $ob1 = $ob->get();
        // var_dump($ob1);
        $list = $ob->paginate(12);
    	$list2 = $ob->limit(3)->get();
    	return view('Home.find' ,['list2'=>$list2,'goods'=>$list,'list_friends'=>$list_friends,'list_config'=>$list_config]);
    }


    public function path(Request $request , $path)
    {	
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();
        //查询数据库中主分类下的商品
    	$ob = DB::table('goods')->select()->where('path','like',"{$path}%");
        $list2 = $ob->limit(3)->get();
        $list = $ob->paginate(12);
        // var_dump($list);die;
        //把$path转为数组
        $a = explode(',',$path);
        //取出数组中最后一个的值,
        $b = end($a);
        //查找数据库中的分类下的子类
        $ob1 = DB::table('columns')->select()->where('upid','like',"{$b}")->get();
        //弹出path数组中的最后一个,取出他的路径
        array_pop($a);
        //拼接出查询的分类的路径,用来寻找父类
        $c = implode(',',$a);
        //返回视图和参数
    	return view('Home.search',['list2'=>$list2,'goods'=>$list,'path'=>$path,'son'=>$ob1,'parent'=>$c , 'list_friends'=>$list_friends,'list_config'=>$list_config]);
    }
}
