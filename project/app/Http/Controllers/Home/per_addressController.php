<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class per_addressController extends Controller
{
    /**
     * Display a listing of the resource.
     *返回收货地址的视图
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();
        $id = session('users')->uid;
        $data = DB::table('address')->where('uid',$id)->select()->get()->all();
        // dd($data);
        return view('Home.person.address',['list_friends'=>$list_friends,'list_config'=>$list_config,'data'=>$data]);
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
        $data = $request->except('_token');
        $city = '';
        foreach($data['city'] as $k => $v){
            //获取提交的城市名
            $db = DB::table('district')->select()->where('id',$v)->get()->all();
            if(isset($db[0])){
                 // 拼接城市信息
                 $city .= $db[0]->name;
            }
           
        }
        $data['city'] = $city;
        // 判断是否是默认地址
        if(!isset($data['default'])){
            $data['default'] = 0;
        }
        //查询改用户的所有收货地址
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();
        $address = DB::table('address')
                        ->join('users','address.uid','users.uid')
                        ->select()
                        ->where('address.uid',$data['uid'])
                        ->get()->all();
        // dd($address);
        // 执行添加收货地址
        $id = DB::table('address')->insertGetId($data);
        if($id > 0){
            // dd($address);
            return redirect('/home/per_address')->with(['address'=>$address,'list_friends'=>$list_friends,'list_config'=>$list_config])->with('msg','添加成功');
        }else{
            return redirect('/home/per_address')->with('error','添加失败');

        }
    }

    /**
     * Display the specified resource.
     *删除收货地址
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = DB::table('address')->where('id',$id)->delete();
        if($row > 0){
            return redirect('/home/per_address')->with('msg','删除成功');
        }else{
            return redirect('/home/per_address')->with('error','删除失败');
        }

        // dd($id);
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
        $data = DB::table('address')->where('id',$id)->select()->get()->first();
        // dd($data);
        return view('Home.person.editadd',['data'=>$data,'list_friends'=>$list_friends,'list_config'=>$list_config]);
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
        // dd(333333);
        $data = $request->except('_token','_method');
        $city = '';
        foreach($data['city'] as $k => $v){
            //获取提交的城市名
            $db = DB::table('district')->select()->where('id',$v)->get()->all();
            if(isset($db[0])){
                 // 拼接城市信息
                 $city .= $db[0]->name;
            }
           
        }
        $data['city'] = $city;
        $row = DB::table('address')->where('id',$id)->update($data);
        if($row > 0){
            return redirect('/home/per_address');
        }else{
            return redirect('/home/per_address/'.$id.'/edit');
        }
        // dd($data);
    }

    /**
     * Remove the specified resource from storage.
     *删除地址
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
    //设置默认收货地址
    public function addr($id){
        // dd($id);
        $dat['default'] = 1;
        $uid = session('users')->uid;
        $default['default'] = 0;
        $data = DB::table('address')->where('uid',$uid)->update($default);
        $data = DB::table('address')->where('id',$id)->update($dat);
        if($data > 0){
            return redirect('/home/per_address')->with('msg','选择默认地址成功');
        }else{
            return redirect('/home/per_address')->with('error','选择默认地址成功');
        }
    }
}
