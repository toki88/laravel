<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
class CheckbuyController extends Controller
{
    //

    public function index(Request $request,$lid)
    {	

        // 获取友情链接的数据
    	$list_friends = DB::table('flinks')->get();
        // 获取网站设置的数据
    	$list_config = DB::table('config')->where('display', '1')->get()->first();
        // 获取订单表的数据
    	$list_books = DB::table('book_lists')->where('lid',$lid)->get();
        // 获取用户的uid
        $uid = $list_books->first()->uid;
        // 获取指定用户的地址的数据
        $list_address = DB::table('address')->where('uid',$uid)->where('default','1')->get();
        // 获取指定ID的用户数据
        $list_users = DB::table('users')->where('uid',$uid)->get();
        // 获取用户的姓名
        $name = $list_users->first()->name;

        // var_dump($name);
        // exit;
    	foreach($list_books as $v){

    		$all[] = $v->num*$v->price;
    	}
        // 计算所有物品的总价
    	$p=0;
		foreach($all as $v){
			// var_dump($v);
			$p = $v+$p;
			// echo $p;
		}
        // 加运费
        $p = $p + 10;
        // 带值返回页面
    	return view('Home.pay',['list_friends'=>$list_friends,'list_config'=>$list_config,'list_books'=>$list_books,'list_address'=>$list_address,'p'=>$p,'uid'=>$uid,'name'=>$name,'lid'=>$lid]);
    }

    public function success($lid)
    {   


        $a['state'] = 0;
        
        
        // 获取友情链接的数据
        $list_friends = DB::table('flinks')->get();
        // 获取网站设置的数据
        $list_config = DB::table('config')->where('display', '1')->get()->first();
        // 获取订单表的数据
        $list_books = DB::table('book_lists')->where('lid',$lid)->get();
        // 获取用户的uid
        $uid = $list_books->first()->uid;
        // 获取指定ID的用户数据
        $list_address = DB::table('address')->where('uid',$uid)->where('default','1')->get()->all();
        //如果地址为空则令用户重定向至个人主页填地址
        if(empty($list_address)){
            return redirect('/home/per_address');
        }
        // 获取指定ID的用户数据
        $list_users = DB::table('users')->where('uid',$uid)->get();
        // 获取用户的姓名
        $name = $list_users->first()->name;

        foreach($list_books as $v){
            // 计算所有物品的总价
            $all[] = $v->num*$v->price;
        }

        $p=0;
        foreach($all as $v){
            // var_dump($v);
            $p = $v+$p;
            // echo $p;
        }
        // 加运费
        $p = $p + 10;
        // 如果受影响行数大于一则成功
        $row = DB::table('book_lists')->where('lid',$lid)->update($a);
        if($row>0){
        return view('Home.success',['list_friends'=>$list_friends,'list_config'=>$list_config,'list_books'=>$list_books,'list_address'=>$list_address,'p'=>$p,'uid'=>$uid,'name'=>$name,'lid'=>$lid]);
        }
    }
}
