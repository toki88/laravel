<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Users;

use DB;
class RegisterController extends Controller
{
    public function index()
    {   
        //返回页面
    	return view('Home.register');
    }

    public function doregister(Request $request)
    {
        // 限制用户名和密码的最大长度，如果超过长度则返回信息
        $this->validate($request, [
            'name' => 'required|max:8',
            'password' => 'required|max:16',
        ],$this->messages());
        // 获取前台返回的数据（除了令牌的Token）
        $data = $request->except('_token');
        // 将获取的信息上传数据库
        $id = DB::table('users')->insertGetId($data);
        // 如果受影响行数大于一则成功
        if($id>0){
            return redirect('home/index')->with('msg','添加成功');
        }
    }

    public function messages()
    {
        // 设定返回信息
        return [
            'name.required' => '用户名必须填写',
            'pass.min' => '密码不能超过16个字符',
        ];
    }
    public function show(Request $request, $id)
    {
        
        session_start();
        // 将返回的信息存入缓存中
        $value = $request->session();

    }


}
