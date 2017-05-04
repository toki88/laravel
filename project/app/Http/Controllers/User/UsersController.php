<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *执行搜索和显示用户信息
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $time = Carbon::now('PRC');
        // dd($time);
        $where = '';
        $ob = DB::table('users');
        //如果有name查询,执行查询
        if($request->has('name')){
            $name = $request->input('name');
            //获取要查询的Name关键字
            $where['name'] = $name;
            $ob->where('name','like',"%{$name}%");
        }
        //获取用户列表信息
        $list = $ob->paginate(2);
        // dd($list);
        return view('Admin.User.index',['list'=>$list,'where'=>$where,'time'=>$time]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回创建用户的视图
        return view('Admin.User.add');
    }

    /**
     * Store a newly created resource in storage.
     *执行用户添加功能
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证用户名和邮箱为必填
        
        $messages = [
        'name.required'=>'请填写用户名',
        'email.required'=>'请填写电子邮箱',
        ];
       
        $this->validate($request,[
            'name'=>'required|max:8',
            'email'=>'required',
            ],$messages);
        $data = $request->except('_token');
        $id = DB::table('users')->insertGetId($data);
        if($id > 0){
            return redirect('admin/user')->with('msg','添加成功');
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *显示修改页
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('users')->where('uid',$id)->first();
        // dd($data);
        return view('Admin.User.edit',['ob'=>$data]);
        
    }

    /**
     * Update the specified resource in storage.
     *执行修改
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->hasFile('pic'));
        //判断是否有文件上传
        if($request->hasFile('pic')){
            // 判断上传的文件是否有效
            if($request->file('pic')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('pic');
                // dd($data);
                // 获取上传的文件的后缀
                $ext = $data->getClientOriginalExtension();
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
               // 移动临时文件，生成新文件到指定目录下
                $data->move('./Admin/upload',$picname);
                // if($data->getError()>0){
                //     echo '上传失败';
                // }else{
                //     echo '上传成功';
                //     echo "<img src='/admin/upload/{$picname}' width='200' height='200'>";
                // }
                // dd($picname);
            }
        }else{
            $picpath = DB::table('users')->select()->where('uid',$id)->get()->first();
            $picname = $picpath->pic;
            // dd($picname);
        }
        $data = $request->except('_token','_method');
        $data['pic'] = $picname;
        // dd($data['pic']);
        $row = DB::table('users')->where('uid',$id)->update($data);
        if($row>0){
            return redirect('admin/user')->with('msg','修改成功');
        }else{
            return redirect('admin/user')->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *执行删除操作
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = DB::table('users')->where('uid',$id)->delete();
        if($row > 0){
            return redirect('admin/user')->with('msg','删除成功');
        }else{
            return redirect('admin/user')->with('error','删除失败');
        }
    }
}
