<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class per_safetyController extends Controller
{
    /**
     * Display a listing of the resource.
     *跳转到安全设置页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();


       return view('Home.person.safety',['list_friends'=>$list_friends,'list_config'=>$list_config]);
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
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();

        $ob = DB::table('users')->where('uid',session('users')->uid)->get()->first();
        // dd($ob);
        if($id == 1){
            return view('Home.person.password',['list_friends'=>$list_friends,'list_config'=>$list_config]);
        }elseif($id == 2){
            return view('Home.person.setpay',['list_friends'=>$list_friends,'list_config'=>$list_config]);
        }elseif($id == 3){
            return view('Home.person.idcard',['ob'=>$ob, 'list_friends'=>$list_friends,'list_config'=>$list_config]);
        }elseif($id == 4){
            return view('Home.person.question',['list_friends'=>$list_friends,'list_config'=>$list_config]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(3333333);
    }

    /**
     * Update the specified resource in storage.
     *修改密码
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();

        $data = $request->except('_token','_method');

        // dd($data);
        // var_dump($data);die;
        $db = DB::table('users')->where('uid',$id);
        $dbs = $db->get()->first();
        // var_dump($dbs);die;
        if(isset($data['password'])){
            if($data['password'] != $dbs->password){
            return redirect('home/per_safety/1')->with('error','原密码不正确');
            }
            // dd($data);
            // 判断用户重置密码是否两次一致
            if(!empty($data['newpass'])){
                if(isset($data['repass'])){
                    // dd(222222);
                    if(($data['newpass'] != $data['repass'])){
                        return redirect('home/per_safety/1')->with('error','两次输入的密码不一致');
                    } 
                $data['password'] = $data['newpass'];
                    unset($data['newpass']);
                    unset($data['repass']);

                    // $dbs->password=$data['newpass'];
                }else{
                    // dd(11111);
                    return redirect('home/per_safety/1')->with('error','请输入确认密码');
                }
            
        }else{
                    return redirect('home/per_safety/1')->with('error','请输入修改密码');
                }
        }
        
        if(isset($data['paypass'])){
            if($data['paypass'] != $dbs->paypass){
            return redirect('home/per_safety/2')->with('error','原支付密码不正确');
            }
            // dd($data);
            // 判断用户重置密码是否两次一致
            if(!empty($data['paypa'])){
                if(isset($data['repaypass'])){
                    if(($data['paypa'] != $data['repaypass'])){
                        return redirect('home/per_safety/2')->with('error','两次输入的支付密码不一致');
                    } 
                $data['paypass'] = $data['paypa'];
                    unset($data['paypa']);
                    unset($data['repaypass']);

                }else{
                    return redirect('home/per_safety/2')->with('error','请输入确认支付密码');
                }
            
        }else{
                    return redirect('home/per_safety/2')->with('error','请输入修改支付密码');
                }
        }

        // dd($data);
        $row = $db->update($data);
        if($row > 0){
             return redirect('home/per_safety')->with('msg','修改成功');
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
