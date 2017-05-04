<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Per_infmtController extends Controller
{
    /**
     * Display a listing of the resource.
     *personal information显示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();
        return view('Home.person.information');
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
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();
        // dd($id);
        $data = DB::table('users')->where('uid',$id)->get()->first();
        return view('Home.person.information',['data'=>$data,'list_friends'=>$list_friends,'list_config'=>$list_config]);
    }

    /**
     * Update the specified resource in storage.
     *修改用户个人信息
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

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
               
            }
        }else{
            $picpath = DB::table('users')->select()->where('uid',$id)->get()->first();
            $picname = $picpath->pic;
            // dd($picname);
        }
        $data = $request->except('_token','_method');
        $data['pic'] = $picname;
        // var_dump($data['pic']);die;

        // --------------------------------------------------------
        // 把下拉表的日期拼接起来，作为一个生日
        $data['birth'] = $data['birth'].'.'.$data['birth1'].'.'.$data['birth2'];
        //释放掉不需要的birth1和birth2
        unset($data['birth1']);
        unset($data['birth2']);
        // var_dump($data);die;
        $row = DB::table('users')->where('uid',$id)->update($data);
        // var_dump($data);die;
        $uid = session('users')->uid;
        if($row > 0){
            return redirect("/home/per_infmt/{$uid}/edit")->with('msg','修改成功，正在为您跳转');
        }else{
            return redirect("/home/per_infmt/{$uid}/edit")->with('error','修改失败');
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
        //
    }
}
