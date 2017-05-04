<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Org\Image;
use DB;

class GoodsController extends Controller
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
        $ob = DB::table('goods')->join('columns','goods.cid', '=', 'columns.cid')->select('goods.*','columns.name');
        if($request->has('gname')){
            //获取搜索的条件
            $gname = $request->input('gname');
            //添加到将要携带到分页中的数组中
            $where['gname'] = $gname;
            //给查询添加where条件
            $ob->where('gname','like',"%{$gname}%");
        }
        //执行分页查询
        $list = $ob->paginate(5);

        return view('Admin.Goods.index',['list'=>$list,'where'=>$where]);
        
        
        


        
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

        //移除获得的值中的令牌信息
        $data = $request->except('_token');
        //把获得的值添加到数据库
        $id = DB::table('goods')->insertGetId($data);
        //如果添加的条数有ID,返回视图
        if($id>0){
            return redirect('/admin/goods')->with('msg','添加成功');
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
        //
        //返回视图
        return view('Admin.Goods.add',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //查询要修改的商品数据,并返回修改视图
        $data = DB::table('goods')->join('columns','goods.cid', '=', 'columns.cid')->select('goods.*','columns.name')->where('gid',$id)->first();
        return view('Admin.Goods.edit',['ob'=>$data]);
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

        //如果有图片上传,另存图片并获取图片的名称
        if ($request->hasFile('pic')) {

            $data = $request->file('pic');
            for ($i=0; $i < count($data); $i++) { 
                $ext = $data[$i]->getClientOriginalExtension();
                $filename = time().rand('1000','9999').'.'.$ext;
                $data[$i]->move('./admin/upload',$filename);
                // var_dump($data[$i]);

                if($data[$i]->getError()>0){
                    echo "{$i}下标的图片上传失败";
                }else{
                    // echo "<img src='/admin/upload/{$filename}' width='200' height='200'>";
                    $img = new Image();
                    $img->open('./admin/upload/'.$filename);
                    $img->thumb(100,100)->save('./admin/upload/'.$filename);
                    $p=$filename;
                    var_dump($filename);
                }
            }
        }else{
            $data = DB::table('goods')->where('gid',$id)->select('goods.showpic')->get()->first();
            $p = $data->showpic;
        }

        
        //从获取的数据中取出要提交给数据库的数据(移除令牌和一些不用修改的数据)
        $data = $request->only('gname','cid','title','price','oprice','stock');
        $data['showpic']=$p;
        //执行修改语句
        $row = DB::table('goods')->where('gid',$id)->update($data);
        //判断是否修改成功,并返回视图
        if($row>0){
            return redirect('/admin/goods')->with('msg','修改成功');
        }else{
            return redirect('/admin/goods')->with('error','修改失败');
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
        //删除商品方法
        $row = DB::table('goods')->where('gid',$id)->delete();
        if($row>0){
            return redirect('/admin/goods')->with('msg','删除成功');
        }else{
            return redirect('/admin/goods')->with('error','删除失败');
        }
    }

    public function selgoods($id)
    {
        //从数据库中查找要修改的商品
        $ob = DB::table('goods')->select('goods.*')->where('gid',$id)->get()->all();
        //格式化数据,用^^分割多条数据
        $pic = $ob[0]->pic;
        $pic = explode('^^',$pic);
        array_pop($pic);

        $data = $ob[0]->data;
        $data = explode('^^',$data);
        array_pop($data);

        $check = $ob[0]->check;
        $check = explode('^^',$check);
        array_pop($check);
        
        $spec = $ob[0]->spec;
        $spec = explode('^^',$spec);
        array_pop($spec);

        $keyword = $ob[0]->keyword;
        $keyword = explode('^^',$keyword);
        array_pop($keyword);
        //返回视图,并把数据给页面
        return view('Admin.Goods.slegood',['ob'=>$ob,'pic'=>$pic,'data'=>$data,'check'=>$check,'spec'=>$spec,'keyword'=>$keyword]);

    }
    public function updgoods(Request $request, $id)
    {   
        
        //修改详情信息的方法,获取图片并缩放,
        $p = '';
        if ($request->hasFile('pic')) {
            $data = $request->file('pic');
            for ($i=0; $i < count($data); $i++) { 
                $ext = $data[$i]->getClientOriginalExtension();
                $filename = time().rand('1000','9999').'.'.$ext;
                $data[$i]->move('./admin/upload',$filename);
                // var_dump($data[$i]);

                if($data[$i]->getError()>0){
                    echo "{$i}下标的图片上传失败";
                }else{
                    // echo "<img src='/admin/upload/{$filename}' width='200' height='200'>";
                    $img = new Image();
                    $img->open('./admin/upload/'.$filename);
                    $img->thumb(800,800)->save('./admin/upload/a_'.$filename);
                    $img->thumb(400,400)->save('./admin/upload/s_'.$filename);
                    $img->thumb(100,100)->save('./admin/upload/ss_'.$filename);
                    $p=$p.$filename.'^^';
                }
            }
        }else{
            $data = DB::table('goods')->where('gid',$id)->select('goods.pic')->get()->first();
            $p = $data->pic;
        }
        //获取详情信息的图片
        $s = '';
        if ($request->hasFile('spec')) {
            $data = $request->file('spec');
            for ($i=0; $i < count($data); $i++) { 
                $ext = $data[$i]->getClientOriginalExtension();
                $filename = time().rand('1000','9999').'.'.$ext;
                $data[$i]->move('./admin/upload',$filename);
                // var_dump($data[$i]);

                if($data[$i]->getError()>0){
                    echo "{$i}下标的图片上传失败";
                }else{
                    // echo "<img src='/admin/upload/{$filename}' width='200' height='200'>";
                    $s=$s.$filename.'^^';
                }
            }
        }else{
            $data = DB::table('goods')->where('gid',$id)->select('goods.spec')->get()->first();
            $s = $data->spec;
        }

        //把获取的信息格式化为想要的数组
        $data = $request->except('_token');

        $data['pic'] = rtrim($p,'^^').'^^';
        $data['data'] = rtrim(implode('^^',$data['data']),'^^').'^^';
        $data['spec'] = rtrim($s,'^^').'^^';
        $data['check'] = rtrim(implode('^^',$data['check']),'^^').'^^';
        $data['keyword'] = rtrim(implode('^^',$data['keyword']),'^^').'^^';
        //执行修改
        $row = DB::table('goods')->where('gid',$id)->update($data);

        if($row>0){
            return redirect('/admin/selgoods/'.$id)->with('msg','修改成功');
        }else{
            return redirect('/admin/selgoods/'.$id)->with('error','修改失败');        
        }
    }

    public function addgoods($id,$path)
    {
        //获取要添加商品的父级,并返回到添加视图
        $newpath=$path.','.$id;
        // var_dump($newpath);
        return view('Admin.Goods.add',['id'=>$id,'path'=>$newpath]);
    }
}
