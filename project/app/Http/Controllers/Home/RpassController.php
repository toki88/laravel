<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
class RpassController extends Controller
{
    //
    public function index()
    {
    	return view('Home.rpass');
    }
    public function dorpass(Request $request)
    {
        //获取需要修改的用户名和修改的新密码
        $data = $request->except('_token');
        // 用查询用户名在数据库中查询数据
        $u_data = DB::table('users')->select('password')->where('name',$data['name'])->get(); 
        // 上传新密码
        $row = DB::table('users')->where('name', $data['name'])->update(['password' => $data['password']]);
        // 判断是否成功如果成功则返回主页
        if($row>0){
            return redirect('home/home')->with('msg','修改成功');;
        }else{
            return redirect('home/rpass')->with('error','修改失败');;
        }

    }
}
