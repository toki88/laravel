@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改评价</h3>
        <p>修改评价</p>
        <div class="row">
            <form action='/demo4/{{ $ob->id }}' method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-4">
                    用户ID
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户ID" name='uid' value='{{ $ob->uid}}'>
                </div>
                <div class="col-lg-4">
                    购买商品名称
                    <input type="text" class="form-control m-b-10" placeholder="请输入购买商品名称" name='name' value='{{ $ob->name}}'>
                </div>
                <div class="col-lg-4">
                    购买商品ID
                    <input type="text" class="form-control m-b-10" placeholder="请输入购买商品id" name='gid' value='{{ $ob->gid}}'>
                </div>

                <div class="col-lg-4">
                    文字评价
                    <input type="text" class="form-control m-b-10" placeholder="请输入文字评价" name='content' value='{{ $ob->content}}'>
                </div>
                <div class="col-lg-4">
                    <select class="form-control m-b-10" name='type'>
                        <option value='1'>好评</option>
                        <option value='0'>中评</option>
                        <option value='-1'>差评</option>
                    </select>

                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
@endsection