<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示退款订单
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where = '';
        $ob = DB::table('book_lists')->whereIn('state',[4,5,8]);
        //如果有name查询,执行查询
        if($request->has('name')){
            $name = $request->input('name');
            //获取要查询的Name关键字
            $where['name'] = $name;
            $ob->where('name','like',"%{$name}%");
        }
        //获取用户列表信息
        $list = $ob->paginate(10);
        return view('Admin.Refund.index',['data'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = DB::table('book_lists')->where('lid',$id)->first();
        // dd($data);
        return view('Admin.Refund.edit',['ob'=>$data]);
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
        // $data = $request->except('_token','_method');
        // dd($data);
        //判断是否有文件上传
        if($request->hasFile('refund_pic')){
            // dd(44444444);
            // 判断上传的文件是否有效
            if($request->file('refund_pic')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('refund_pic');
                // dd($data);
                // 获取上传的文件的后缀
                $ext = $data->getClientOriginalExtension();
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
               // 移动临时文件，生成新文件到指定目录下
                $data->move('./Admin/upload',$picname);
                
            }
        }else{
            $picpath = DB::table('book_lists')->select()->where('lid',$id)->get()->first();
            $picname = $picpath->refund_pic;
            // dd($picname);
        }
        $data = $request->except('_token','_method');
        $data['refund_pic'] = $picname;
        // dd($data['pic']);
        $row = DB::table('book_lists')->where('lid',$id)->update($data);
        if($row>0){
            return redirect('admin/refund')->with('msg','修改成功');
        }else{
            return redirect('admin/refund')->with('error','修改失败');
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
        $row = DB::table('book_lists')->where('lid',$id)->delete();
        if($row > 0){
            return redirect('admin/refund')->with('msg','删除成功');
        }else{
            return redirect('admin/refund')->with('error','删除失败');
        }
    }
    public function do($id)
    {
        $state['state'] = 5;
        $row = DB::table('book_lists')->where('lid',$id)->update($state);
        if($row>0){
            return redirect('admin/refund')->with('msg','退款成功');
        }else{
            return redirect('admin/refund')->with('error','退款失败');
        }
    }
}
