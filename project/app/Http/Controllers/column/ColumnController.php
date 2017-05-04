<?php

namespace App\Http\Controllers\Column;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ColumnController extends Controller
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
        $ob = DB::table('columns');

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
        return view('Admin.column.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回视图到添加页面
        return view('Admin.column.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加操作,并返回到主页面
        $this->validate($request, [
            'name' => 'required|max:8',
        ],$this->messages());
        $data = $request->except('_token');
        $id = DB::table('columns')->insertGetId($data);
        if($id>0){
            return redirect('/admin/column')->with('msg','添加成功');
        }
    }

    public function messages()
    {
        return [
            'name.required' => '类别名必须填写',
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
        //获取要修改的数据,返回修改视图
        $data = DB::table('columns')->where('cid',$id)->first();
        return view('Admin.column.edit',['ob'=>$data]);
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
        //获取表单提交的数据,并修改
        $data = $request->only('name','display');
        $row = DB::table('columns')->where('cid',$id)->update($data);
        if($row>0){
            return redirect('admin/column')->with('msg','修改成功');
        }else{
            return redirect('admin/column')->with('error','修改失败');
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
        //删除分类
        $row = DB::table('columns')->where('cid',$id)->delete();
        if($row>0){
            return redirect('/admin/column')->with('msg','删除成功');
        }else{
            return redirect('/admin/column')->with('error','删除失败');
        }
    }
    public function addSon($id)
    {
        //跳转到添加子级分类视图
        $list = DB::table('columns')->where('cid',$id)->first();
        return view('Admin.column.addSon',['list'=> $list]);
    }

    public function storeSon(Request $request)
    {   
        //创建子级分类
        $data = $request->except('_token');
        $par = DB::table('columns')->where('cid',$request->input('upid'))->first();
        $data['path'] = $par->path.','.$data['upid'];
        
        $id = DB::table('columns')->insertGetId($data);
        if($id>0){
            return redirect('/admin/column')->with('msg','添加子类成功');

        }
    }
}
