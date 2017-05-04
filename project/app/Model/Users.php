<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Users extends Model
{
    // protected $table = 'user';.
    // protected $primaryKey = 'uid';
    // public $timestamps = false;
    public function checkUser($request)
    {
    	// 获取用户登录的用户名
    	$name = $request->input('name');
        // var_dump($name)
    	//通过用户名查询数据库有没有这个用户
        $db = DB::table('users');
    	$ob = $db->where('name',$name)->first();
    	// 如果查出有用户，则验证密码
    	if($ob){
    		if($request->input('password') == $ob->password){
    			return $ob;
    		}else{
    			return null;
    		}
    	}else{
    		return null;
    	}
    }

    public function registerUser($request)
    {
        // 获取用户登录的用户名
        $name = $request->input('name');
        //通过用户名查询数据库有没有这个用户
        $db = DB::table('users');
        $ob = $db->where('name',$name)->first();
        // 如果查出有用户，则验证密码
        if($ob){
            if($request->input('password') == $ob->password){
                return $ob;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }
}
