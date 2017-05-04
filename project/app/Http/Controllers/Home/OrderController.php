<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *显示订单管理的视图
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->except('_token','_method'));
        $where = '';
        
        //获取session中的用户id
        $uid = session('users')->uid;
        // dd($uid);
        $list_friends = DB::table('flinks')->get();
        
        $list_config = DB::table('config')->where('display', '1')->get()->first();
        //查询所有订单
        $data = DB::table('book_lists')->where([
            ['uid',$uid],
            // ['lid','like',"%{$lid}%"],
            ])->orderby('lid','desc');
        if($request->has('lid')){
            $lid = $request->input('lid');
            //获取要查询的Name关键字
            $where['lid'] = $lid;
            $data = $data->where('lid','like',"%{$lid}%");
        }
        // 查询待付款订单
        $data1 = DB::table('book_lists')
                    ->where([
                        ['state',-1],
                        ['uid',$uid],
                        ])->select()
                    ->get()->all();
        // 查询待发货订单
        $data2 = DB::table('book_lists')
                    ->where([
                        ['state',0],
                        ['uid',$uid],
                        ])
                    ->select()
                    ->get()->all();

        // dd($data2);
        // 查询待收货订单
        $data3 = DB::table('book_lists')
                    ->where([
                        ['state',1],
                        ['uid',$uid],
                        ])->select()
                    ->get()->all();
        // 查询待评价订单
        $data4 = DB::table('book_lists')
                    ->where([
                        ['state',2],
                        ['uid',$uid],
                        ])
                    ->get()->all();
                    // dd($data3);

        //获取用户列表信息
        // $data = $data->paginate(2);
        $data = $data->paginate(2);
        // var_dump($list);
        
        // dd($data);

        return view('Home.person.order',['where'=>$where,'data'=>$data,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4,'list_friends'=>$list_friends,'list_config'=>$list_config]);
    }

    /**
     * Show the form for creating a new resource.
     *退款订单添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *评价订单
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $row = $request->except('_token');
        $row['time'] = time();
        $bl['state'] = 10;
        DB::table('book_lists')->where('lid',$row['lid'])->update($bl);
        // dd($data);
        $id = DB::table('comments')->insertGetId($row);
        if($id > 0){
            return redirect('/home/per_order');
        }else{
            return redirect('/home/per_commentlist/{{ $v->lid }}')->with(['msg','添加评价失败，请重新添加']);
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
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();
        $data = DB::table('book_lists')
                    ->where('lid',$id)
                    ->select()
                    ->get()
                    ->first();
        $add = DB::table('address')->where([
            ['uid',session('users')->uid],
            ['default',1],
            ])->get()->first();
        // dd($add);
        return view('Home.person.orderinfo',['add'=>$add,'data'=>$data,'list_friends'=>$list_friends,'list_config'=>$list_config]);
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
     *判断是哪个订单状态
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request);
         //判断是否有文件上传
        if($request->hasFile('refund_pic')){
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
            $picname = '';
        }
        $data = $request->except('_token','_method');
        $data['refund_pic'] = $picname;
        $data['state'] = 4;
        $row = DB::table('book_lists')->where('lid',$id)->update($data);
        if($row > 0){
            return redirect('/home/per_order')->with('msg','提交成功，正在为您跳转');
        }else{
            return redirect('/home/per_reorder/{{id}}')->with('error','提交失败，请重新提交');

        }
    }

    /**
     * Remove the specified resource from storage.
     *删除订单
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
    }
    public function confirm($id)
    {

        // dd(3333333);
        $data = DB::table('book_lists')->where('lid',$id);
        $dat['state']=2;
        $row = $data->update($dat);
        // dd($row);
        $list = $data->select()->get()->first();
        // dd($list);
        if($row > 0){
            return redirect('home/per_order')->with('msg','确认收货成功，正在为您跳转');
        }
    }

    public function reorder($id){
        // $time = Carbon::now('PRC');
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();
        // dd($id);
        $data = DB::table('book_lists')->where('lid',$id)->select()->get()->first();
        // dd(date('Y-m-d H:i:s',$data->ltime));
        return view('Home.person.refund',['data'=>$data,'list_friends'=>$list_friends,'list_config'=>$list_config]);
    }
    public function qx($id){

        // dd($id);
        $dd['state'] = 7;
        $data = DB::table('book_lists')->where('lid',$id)->update($dd);
        // dd($data);
        if($data > 0){
            return redirect('home/per_order')->with('msg','取消订单成功，正在为您跳转');

        }
    }
    public function lo($id){
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();
        $data = DB::table('book_lists')->where('lid',$id)->select()->get()->first();
        // dd($data);
        // if($data > 0){
            return view('Home.person.logistics',['data'=>$data,'list_friends'=>$list_friends,'list_config'=>$list_config]);

        // }
    }
    //删除订单
    public function delorder($id){

        $row = DB::table('book_lists')->where('lid',$id)->delete();
        if($row > 0){
            return redirect('/home/per_order')->with('msg','删除成功');
        }else{
            return redirect('/home/per_order')->with('error','删除失败');
        }
    }
    // 评价订单
    public function pj($id){
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();
        $data = DB::table('book_lists')->where('lid',$id)->select()->get()->first();
        return view('Home.person.commentlist',['data'=>$data,'list_friends'=>$list_friends,'list_config'=>$list_config]);
    }
    public function per(){
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();
        $uid = session('users')->uid;
        // dd($uid);
        $data = DB::table('book_lists')->where('uid',$uid)->select()->orderBy('lid', 'desc')->limit(5)->get()->all();
        // dd($data);
        return view('Home.person.indexorder',['data'=>$data,'list_friends'=>$list_friends,'list_config'=>$list_config]);
    }
    

}
