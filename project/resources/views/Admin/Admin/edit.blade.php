@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改管理员</h3>
        <p>修改管理员</p>
        <div class="row">
            <form action='/admin/admin/{{ $ob->id }}' method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='name' value="{{ $ob->name }}">
                </div>
                <div class="col-lg-4">
                    <input type="password" class="form-control m-b-10" placeholder="请输入新密码" name='password' value="{{ $ob->password }}">
                </div>
                <div class="col-lg-4">
                    <select class="form-control m-b-10" name='gid'>
                        <option value='0' @if($ob->gid ==0)selected @endif>普通管理员</option>
                        <option value='1' @if($ob->gid ==1)selected @endif>高级管理员</option>
                        <option value='2' @if($ob->gid ==2)selected @endif>超级管理员</option>
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