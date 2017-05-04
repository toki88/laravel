@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改用户</h3>
        <p>修改用户</p>
        <div class="row">
            <form action='/admin/user/{{ $ob->uid }}' method='post' enctype='multipart/form-data'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div>
                    用户名：
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='name' value="{{ $ob->name }}">
                </div>
                <div>
                    密码：
                    <input type="password" class="form-control m-b-10" placeholder="请输入密码" name='password' value="{{ $ob->password }}">
                </div>
                <div class="col-lg-12">
                    更换头像：
                    <img src="/admin/upload/{{ $ob->pic }}" width="30">
                    <br>
                    <input type="file" class="form-control m-b-8" placeholder="请输入头像" name='pic'>
                </div>
                <br>
                 请选择用户性别：
                <div> 
                    <div class="col-lg-1">
                         <input type="radio" name="sex"value="1" {{ ($ob->sex ==1)?'checked':'' }}>男
                    </div>
                    <div>
                         <input type="radio" name="sex"value="2" {{ ($ob->sex ==2)?'checked':'' }}>女
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