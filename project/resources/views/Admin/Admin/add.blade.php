@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加管理员</h3>
        <p>添加管理员</p>
        <div class="row">
            <form action='/admin/admin' method='post'>
                {{ csrf_field() }}
                <div class="col-lg-4">
                    <input type='hidden' name='time' value="0"> 
                    <input type='hidden' name='num' value='1'> 
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='name'>
                </div>
                <div class="col-lg-4">
                    <input type="password" class="form-control m-b-10" placeholder="请输入密码" name='password'>
                </div>
                <div class="col-lg-4">
                    <select class="form-control m-b-10" name='gid'>
                        <option>--请选择--</option>
                        <option value='0'>普通管理员</option>
                        <option value='1'>高级管理员</option>
                        <option value='2'>超级管理员</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
@endsection