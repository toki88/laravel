@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加用户</h3>
        <p>填空添加用户</p>
        <div class="row">
            <form action='/admin/goods' method='post'>
                {{ csrf_field() }}

                <input type="hidden" name='cid' value='{{ $id }}'>
                <input type="hidden" name='path' value='{{ $path }}'>
                <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品名" name='gname'>
                </div>
                <div class="col-lg-8">  
                    <input type="text" class="form-control m-b-10" placeholder="请输入标题" name='title'>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入现价" name='price'>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入原价" name='oprice'>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入库存量" name='stock'>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
@endsection