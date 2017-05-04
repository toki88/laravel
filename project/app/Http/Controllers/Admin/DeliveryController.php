<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DeliveryController extends Controller
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
        return view('Admin.Book_lists.non-payment',['ob'=>$list,'where'=>$where]);
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
        $where = '';
        $ob = DB::table('book_lists')->where('state',$id);
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
            $where['uid'] = $uid;
            $ob->where('uid','like',"%{$uid}%");
        }
        //获取用户列表信息
        $list = $ob->paginate(2);
        // dd($list);
        return view('Admin.Book_lists.delivery',['list'=>$list,'state'=>$id,'where'=>$where]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *执行发货
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('Admin.book_lists.Logistics',['lid'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function insa(Request $request)
    {
        // dd(2222);
        $data = $request->except('_token');
        // var_dump($data);die;
        $id = DB::table('book_lists')->where('lid',$data['lid'])->update($data);
        if($id > 0){
            return redirect('admin/book_lists_f/0')->with('msg','已成功发货');
        }else{
            return redirect('admin/book_lists_f/0')->with('error','发货失败');
        }
    }
}
