<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ImgloopController extends Controller
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
        $ob = DB::table('imgloop');
        //判断是否有搜索条件
        if($request->has('url')){
            //获取搜索的条件
            $url = $request->input('url');
            //添加到将要携带到分页中的数组中
            $where['url'] = $url;
            //给查询添加where条件
            $ob->where('url',$url);
        }
        //执行分页查询
        $list = $ob->paginate(5);
        return view('Admin.Imgloop.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Imgloop.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('img')){
            // 判断上传的文件是否有效
            if($request->file('img')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('img');
                // dd($data);
                // 获取上传的文件的后缀
                $ext = $data->getClientOriginalExtension();
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
                $data->move('./admin/upload',$picname);
                if($data->getError()>0){
                    echo '上传失败';
                }else{
                    echo '上传成功';
                    echo "<img src='/admin/upload/{$picname}' width='200' height='200'>";
                }
            }
        }
        // 限制url的最大长度，如果超过长度则返回信息
        $this->validate($request, [
            'url' => 'required|max:254',
        ],$this->messages());
        // 获取前台返回的数据（除了令牌的Token）
        $data = $request->except('_token');
        // 将新上传的图片赋予$data中的img
        $data['img'] = $picname;
        // dd($data);
        // 将获取的信息上传数据库
        $id = DB::table('imgloop')->insertGetId($data);
        // 如果受影响行数大于一则成功
        if($id>0){
            return redirect('admin/imgloop')->with('msg','添加成功');
        }
    }

    public function messages()
    {
        return [
            'url.required' => 'url地址超出数据库允许长度',
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
        //获取轮播图表在数据库中的信息
        $data = DB::table('imgloop')->where('id',$id)->first();
        // 带值返回页面
        return view('Admin.Imgloop.edit',['ob'=>$data]);
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
        //文件上传
        //判断是否有文件上传
        if($request->hasFile('img')){
            // 判断上传的文件是否有效
            if($request->file('img')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('img');
                // 获取上传的文件的后缀
                $ext = $data->getClientOriginalExtension();
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
                $data->move('./admin/upload',$picname);
                if($data->getError()>0){
                    echo '上传失败';
                }else{
                    echo '上传成功';
                    echo "<img src='/admin/upload/{$picname}' width='200' height='200'>";
                }
            }

        }else{
            // 如果没有上传新的头像则使用上次上传的的头像
            $picname = DB::select('select img from imgloop where id ='.$id);
            
            $picname = $picname['0']->img;
        }

        // 字段上传
        $data = $request->only('img','url');  
        // 将新上传的图片赋予$data中的img
        $data['img'] = $picname;    
        // 更新数据库中的数据
        $row = DB::table('imgloop')->where('id',$id)->update($data);
        // 如果受影响行数大于一则成功
        if($row>0){
            return redirect('admin/imgloop/')->with('msg','修改成功');
        }else{
            return redirect('admin/imgloop/')->with('error','修改失败');
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
            //删除所选id的那条在数据库中数据
            $row = DB::table('imgloop')->where('id',$id)->delete();
            // 如果受影响行数大于一则成功
            if($row>0){
                return redirect('admin/imgloop')->with('msg','删除成功');
            }else{
                return redirect('admin/imgloop')->with('error','删除失败');
            }
    }
}
