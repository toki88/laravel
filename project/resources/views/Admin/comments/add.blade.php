@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加评价</h3>
        <p>填空添加评价</p>
        <div class="row">
            <form action='/admin/comments' method='post'>
                {{ csrf_field() }}
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户ID" name='uid'>
                </div>
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入购买商品名称" name='name'>
                </div>
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入购买商品id" name='gid'>
                </div>
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入物品属性" name='ctype'>
                </div>
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入文字评价" name='content'>
                </div>
                <div class="col-lg-4">
                    <select class="form-control m-b-10" name='type'>
                        <option>--请选择评价--</option>
                        <option value='1'>好评</option>
                        <option value='0'>中评</option>
                        <option value='-1'>差评</option>
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