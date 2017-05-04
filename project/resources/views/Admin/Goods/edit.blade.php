@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改用户</h3>
        <p>修改用户</p>
        <div class="row">
            <form action='/admin/goods/{{ $ob->gid }}' method='post' enctype='multipart/form-data'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                    <input type="hidden" name='cid' value='{{ $ob->cid }}'>

                <div class="col-lg-8">
                    商品名<input type="text" class="form-control m-b-10" placeholder="请输入商品名" name='gname' value='{{ $ob->gname }}'>
                </div>
                <div class="col-lg-8">
                    缩略图<br><img src='/Admin/upload/{{ $ob->showpic }}' width='100'>
                    <input type='file' name='pic[]'>
                </div>
                <div class="col-lg-8">
                    标题<input type="text" class="form-control m-b-10" placeholder="请输入标题" name='title' value='{{ $ob->title }}'>
                </div>
                <div class="col-lg-8">
                    现价<input type="text" class="form-control m-b-10" placeholder="请输入现价" name='price' value='{{ $ob->price }}'>
                </div>
                <div class="col-lg-8">
                    原价<input type="text" class="form-control m-b-10" placeholder="请输入原价" name='oprice' value='{{ $ob->oprice }}'>
                </div>
                <div class="col-lg-8">
                    库存量<input type="text" class="form-control m-b-10" placeholder="请输入库存量" name='stock' value='{{ $ob->stock }}'>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>

            </form>
        </div>
        <p></p>
    </div>
@endsection