@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加轮播图</h3>
        <p>添加轮播图</p>
        <div class="row">
            <form action='/admin/imgloop' method='post' enctype='multipart/form-data'>
                {{ csrf_field() }}
                上传轮播图：<input type='file' name='img'>
                <span><br></span>
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入URL地址" name='url'>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
@endsection