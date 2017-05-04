@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改订单信息</h3>
         @if(session('msg'))
            <div class="alert alert-success alert-icon">
            {{ session('msg') }}
            <i class="icon"></i>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-warning alert-icon">
            {{ session('error') }}
            <i class="icon"></i>
            </div>
        @endif
        <div class="row">
            <form action='/admin/book_lists/{{ $ob->lid }}' method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div>
                    商品数量：
                    <input type="text" class="form-control m-b-10" placeholder="请填写商品数量" name='num' value="{{ $ob->num }}" @if($ob->state == 2 || $ob->state == 1) disabled @endif>
                </div>
               <div>
                    商品单价：
                    <input type="text" class="form-control m-b-10" placeholder="请填写商品单价" name='price' value="{{ $ob->price }}" @if(($ob->state == 2) || ($ob->state ==1)) disabled @endif>

                </div>
                    <input type='hidden' name='state' value='{{ $ob->state }}'>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
@endsection