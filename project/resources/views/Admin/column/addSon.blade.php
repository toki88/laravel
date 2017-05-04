@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加分类</h3>
        <p>填空添加分类</p>
        <div class="row">
            <form action='/admin/addSon' method='post'>
                {{ csrf_field() }}
                 <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" disabled="" value="{{ $list->name }}">
                </div>
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入分类名" name='name'>
                </div>
                <div class="col-lg-4">
                    <input type="hidden" class="form-control m-b-10" name='upid' value='{{ $list->cid }}'>
                </div>

                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
@endsection