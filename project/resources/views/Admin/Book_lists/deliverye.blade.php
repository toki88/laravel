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
            <i class="icon"></i>
            </div>
        @endif
        <div class="row">
            @foreach($ob as $v)
            <form action='/admin/book_lists_f/{{ $v->lid }}' method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div>
                    商品数量：
                    <input type="text" class="form-control m-b-10" placeholder="请填写商品数量" name='num' value="{{ $v->num }}">
                </div>
               <div>
                    商品单价：
                    <input type="text" class="form-control m-b-10" placeholder="请填写商品单价" name='price' value="{{ $v->price }}">

                </div>
                    <input type='hidden' name='state' value='{{ $v->state }}'>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
            @endforeach
            {{ $ob->links() }}

        </div>
        <p></p>
    </div>
@endsection