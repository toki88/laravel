<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //保存搜索条件
        $where = '';
        //实例化操作表
        $ob = DB::table('admin');
        //判断是否有搜索条件
        if($request->has('gid')){
            //获取搜索的条件
            $gid = $request->input('gid');
            //添加到将要携带到分页中的数组中
            $where['gid'] = $gid;
            //给查询添加where条件
            $ob->where('gid',$gid);
        }
        if($request->has('name')){
            //获取搜索的条件
            $name = $request->input('name');
            //添加到将要携带到分页中的数组中
            $where['name'] = $name;
            //给查询添加where条件
            $ob->where('name','like',"%{$name}%");
        }
        //执行分页查询
        $list = $ob->paginate(5);
        return view('Admin.Admin.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Admin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 限制名字和密码的最大长度，如果超过长度则返回信息
        $this->validate($request, [
            'name' => 'required|max:8',
            'password' => 'required|max:16',
        ],$this->messages());
        // 获取前台返回的数据（除了令牌的Token）
        $data = $request->except('_token');
        // 时间等于当时的上传时间
        $data['time']=time();
        // 将获取的信息上传数据库
        $id = DB::table('admin')->insertGetId($data);
        // 如果受影响行数大于一则成功
        if($id>0){
            return redirect('admin/admin')->with('msg','添加成功');
        }
    }
    
    public function messages()
    {
        return [
            'name.required' => '用户名必须填写',
            'pass.min' => '密码不能超过16个字符',
        ];
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取推送活动表在数据库中的信息
        $data = DB::table('admin')->where('id',$id)->first();
        // 带值返回页面
        return view('Admin.Admin.edit',['ob'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //添加字段
        $data = $request->only('name','password','gid');
        // 更新数据库中的数据
        $row = DB::table('admin')->where('id',$id)->update($data);
        // 如果受影响行数大于一则成功
        if($row>0){
            return redirect('admin/admin/')->with('msg','修改成功');
        }else{
            return redirect('admin/admin/')->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除所选id的那条在数据库中数据
        $row = DB::table('admin')->where('id',$id)->delete();
        // 如果受影响行数大于一则成功
        if($row>0){
            return redirect('admin/admin')->with('msg','删除成功');
        }else{
            return redirect('admin/admin')->with('error','删除失败');
        }
    }
}
