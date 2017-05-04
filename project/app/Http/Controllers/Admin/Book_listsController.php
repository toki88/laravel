<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Book_listsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where = '';
        $ob = DB::table('book_lists');
        //如果有name查询,执行查询
        if($request->has('name')){
            $name = $request->input('name');
            //获取要查询的Name关键字
            $where['name'] = $name;
            $ob->where('name','like',"%{$name}%");
        }
        if($request->has('lid')){
            $lid = $request->input('lid');
            //获取要查询的Name关键字
            $where['lid'] = $lid;
            $ob->where('lid','like',"%{$lid}%");
        }
        if($request->has('gid')){
            $gid = $request->input('gid');
            //获取要查询的Name关键字
            $where['gid'] = $gid;
            $ob->where('gid','like',"%{$gid}%");
        }
        if($request->has('uid')){
            $uid = $request->input('uid');
            //获取要查询的Name关键字
            $where['uid'] = $lid;
            $ob->where('uid','like',"%{$uid}%");
        }
        //获取用户列表信息
        $list = $ob->paginate(5);
        return view('Admin.Book_lists.non-payment',['list'=>$list,'where'=>$where]);
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
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        // dd(3333333333);
        // die;
        // var_dump($id);die;
        $where = '';
        $ob = DB::table('book_lists')->where('state',$id);
        // 如果有name查询,执行查询
        if($request->has('name')){
            $name = $request->input('name');
            //获取要查询的Name关键字
            $where['name'] = $name;
            $ob->where('name','like',"%{$name}%");
        }
        if($request->has('lid')){
            $lid = $request->input('lid');
            //获取要查询的Name关键字
            $where['lid'] = $lid;
            $ob->where('lid','like',"%{$lid}%");
        }
        if($request->has('gid')){
            $gid = $request->input('gid');
            //获取要查询的Name关键字
            $where['gid'] = $gid;
            $ob->where('gid','like',"%{$gid}%");
        }
        if($request->has('uid')){
            $uid = $request->input('uid');
            //获取要查询的Name关键字
            $where['uid'] = $uid;
            $ob->where('uid','like',"%{$uid}%");
        }
        //获取用户列表信息
        $list = $ob->paginate(2);
        return view('Admin.Book_lists.non-payment',['list'=>$list,'state'=>$id,'where'=>$where]);

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
        return view('Admin.Book_lists.edit',['ob'=>$data]);
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
        $row = DB::table('book_lists')->where('lid',$id)->update($data);
        if($row>0){
            return redirect('admin/book_lists/'.$data['state'])
            ->with('msg','修改成功');
        }else{
            return redirect('admin/book_lists/'.$data['state'])->with('error','修改失败');
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
        
    }
}
