@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加用户</h3>
        <p>请填写用户信息</p>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <form action='/admin/announcement' method='post'>
                {{ csrf_field() }}
                <div>
                    公告标题：
                    <input type="text" class="form-control m-b-10" placeholder="请输入标题" name='content'>
                </div>
                <div>
                    链接地址：
                    <input type="text" class="form-control m-b-10" placeholder="请输入链接地址" name='url'>
                </div>
                    请选择标题类型(位置)：
                <div> 
                    <div>
                         <input type="radio" name="order"value="1">上
                    </div>
                    <div>
                         <input type="radio" name="order"value="2">下
                    </div>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
@endsection