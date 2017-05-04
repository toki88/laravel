<?php

namespace App\Http\Controllers\comments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class commentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //查询评价信息
        //保存搜索条件
        $where = '';
        //实例化操作表
        $ob = DB::table('comments');
        //判断是否有搜索条件
        if($request->has('sex')){
            //获取搜索的条件
            $sex = $request->input('sex');
            //添加到将要携带到分页中的数组中
            $where['sex'] = $sex;
            //给查询添加where条件
            $ob->where('sex',$sex);
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
        return view('Admin.comments.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回添加视图
        return view('Admin.comments.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加


        $data = $request->except('_token');
        $id = DB::table('comments')->insertGetId($data);
        if($id>0){
            return redirect('admin/comments')->with('msg','添加成功');
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //跳转修改视图
        $data = DB::table('comments')->where('id',$id)->first();
        return view('Admin.comments.edit',['ob'=>$data]);
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
        //执行修改
        $data = $request->only('name','sex','age');
        $row = DB::table('comments')->where('id',$id)->update($data);
        if($row>0){
            return redirect('admin/comments')->with('msg','修改成功');
        }else{
            return redirect('admin/comments')->with('error','修改失败');
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
        //执行删除
        $row = DB::table('comments')->where('id',$id)->delete();
        if($row>0){
            return redirect('/admin/comments')->with('msg','删除成功');
        }else{
            return redirect('/admin/comments')->with('error','删除失败');
        }
    }
}
