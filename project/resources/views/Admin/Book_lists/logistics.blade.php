@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="tableHover">
        <h3 class="block-title">物流公司列表</h3>
       <!--  @if(session('msg'))
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
        @endif -->
        <div class="table-responsive overflow">
           <!--  <form action='/admin/book_lists_l' method='post' name='myform'>
                {{ csrf_field() }}
            </form> -->

            <form action='/admin/book_lists_l' method='post'>
                {{ csrf_field() }}
                <div class='medio-body'>
                    订单编号：<input type='text' class='form-control input-sm m-b-10' name='lid' value='{{ $lid }}'>
                </div>
                <div class='medio-body'>
                    物流公司：<input type='text' class='form-control input-sm m-b-10' name='loname'>
                </div>
                <div class='medio-body'>
                    物流编号：<input type='text' class='form-control input-sm m-b-10' name='loid'>
                </div>
                <div class='medio-body'>
                    <input type='hidden' class='form-control input-sm m-b-10' name='state' value='1'>
                </div>
                <input type='submit' class='btn' value='提交'>
            </form>
        </div>
    </div>
@endsection