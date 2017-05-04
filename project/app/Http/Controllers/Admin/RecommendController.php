<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
class RecommendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //保存搜索条件
        $where = '';
        //实例化操作表
        $ob = DB::table('recommend');

        if($request->has('f_words')){
            //获取搜索的条件
            $f_words = $request->input('f_words');
            //添加到将要携带到分页中的数组中
            $where['f_words'] = $f_words;
            //给查询添加where条件
            $ob->where('f_words','like',"%{$f_words}%");
        }
        //执行分页查询
        $list = $ob->paginate(4);
        return view('Admin.Recom.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Recom.add');
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
        // 限制活动宣传词的最大长度，如果超过长度则返回信息
        $this->validate($request, [
            't_words' => 'required|max:100',
            'f_words' => 'required|max:100',
        ],$this->messages());
        // 获取前台返回的数据（除了令牌的Token）
        $data = $request->except('_token');
        // 将获取的信息上传数据库
        $id = DB::table('recommend')->insertGetId($data);
        // 如果受影响行数大于一则成功
        if($id>0){
            return redirect('admin/recom')->with('msg','添加成功');
        }
    }

    public function messages()
    {
        return [
            't_words.required' => '用户名必须填写',
            'f_words.required' => '未满18周岁禁止注册',
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
        //获取推送活动表在数据库中的信息
        $data = DB::table('recommend')->where('id',$id)->first();
        // 带值返回页面
        return view('Admin.Recom.edit',['ob'=>$data]);
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
        //
        //文件上传
                //判断是否有文件上传
                if($request->hasFile('image')){
                    // 判断上传的文件是否有效
                    if($request->file('image')->isValid()){
                        // 获取上传的文件对象
                        $data = $request->file('image');
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

                }else{
                    // 如果没有上传新的头像则使用上次上传的的头像
                    $picname = DB::select('select image from recommend where id ='.$id);
                    $picname = $picname['0']->image;
                }

                // 字段上传
                // 添加字段
                $data = $request->only('image','t_words','f_words');  
                // 将新上传的图片赋予$data中的img
                $data['image'] = $picname;    
                // 更新数据库中的数据
                $row = DB::table('recommend')->where('id',$id)->update($data);
                // 如果受影响行数大于一则成功
                if($row>0){
                    return redirect('admin/recom/')->with('msg','修改成功');
                }else{
                    return redirect('admin/recom/')->with('error','修改失败');
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
        $row = DB::table('recommend')->where('id',$id)->delete();
        // 如果受影响行数大于一则成功
        if($row>0){
            return redirect('admin/recom/')->with('msg','删除成功');
        }else{
            return redirect('admin/recom/')->with('error','删除失败');
        }
    }
}
