@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加友情链接</h3>
        <p>请填写友情链接信息</p>
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
            <form action='/admin/flink' method='post'>
                {{ csrf_field() }}
                <div>
                    友情链接名：
                    <input type="text" class="form-control m-b-10" placeholder="请输入链接名称" name='name'>
                </div>
                <div>
                    url地址：
                    <input type="text" class="form-control m-b-10" placeholder="请输入url" name='url'>
                </div>
                  <div>
                    显示状态：
                <div> 
                    <div class="col-lg-1">
                         <input type="radio" name="display"value="1">显示链接
                    </div>
                    <div>
                         <input type="radio" name="display"value="0">屏蔽链接
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