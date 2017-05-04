@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改用户</h3>
        <p>修改用户</p>
        <div class="row">
            <form action='/admin/announcement/{{ $ob->aid }}' method='post' enctype='multipart/form-data'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div>
                    公告标题：
                    <input type="text" class="form-control m-b-10" placeholder="请输入标题" name='content' value="{{ $ob->content }}">
                </div>
                <div>
                    链接地址：
                    <input type="text" class="form-control m-b-10" placeholder="请输入链接地址" name='url' value="{{ $ob->url }}">
                </div>

                 请选择标题类型(位置)：
                <div> 
                    <div class="col-lg-1">
                         <input type="radio" name="order" value="1" {{ ($ob->order ==1)?'checked':'' }}>上
                    </div>
                    <div>
                         <input type="radio" name="order" value="0" {{ ($ob->order ==0)?'checked':'' }}>下
                    </div>
                </div>
                <br>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
@endsection