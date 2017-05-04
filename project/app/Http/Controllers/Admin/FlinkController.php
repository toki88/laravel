<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class FlinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *用户列表页
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where = '';
        $ob = DB::table('flinks');
        //如果有name查询,执行查询
        if($request->has('name')){
            $name = $request->input('name');
            //获取要查询的Name关键字
            $where['name'] = $name;
            $ob->where('name','like',"%{$name}%");
        }
        //获取用户列表信息
        $list = $ob->paginate(5);
        return view('Admin.Flink.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *执行添加友情链接
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('Admin.Flink.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证用户名和邮箱为必填
        $messages = [
        'name.required'=>'请填写友情链接名称',
        'url.required'=>'请填写url地址',
        'url.url'=>'请填写符合url地址规范的url地址',
        ];

        $this->validate($request,[
            'name'=>'required',
            'url'=>'required|url',
            ],$messages);
        $data = $request->except('_token');
        // dd($data);
        $id = DB::table('flinks')->insertGetId($data);
        if($id > 0){
            return redirect('admin/flink')->with('msg','添加成功');
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
     *显示修改页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('flinks')->where('id',$id)->first();
        return view('Admin.Flink.edit',['ob'=>$data]);
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
        $data = $request->except('_token','_method');
        $row = DB::table('flinks')->where('id',$id)->update($data);
        if($row>0){
            return redirect('admin/flink')->with('msg','修改成功');
        }else{
            return redirect('admin/flink')->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *执行删除友情链接
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = DB::table('flinks')->where('id',$id)->delete();
        if($row > 0){
            return redirect('admin/flink')->with('msg','删除成功');
        }else{
            return redirect('admin/flink')->with('error','删除失败');
        }
    }
}
