@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">订单信息列表</h3>
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
        <div class="table-responsive overflow">
        	<form action='/admin/book_lists/{{ $state }}' method='get'>
                <!-- <input type='hidden' class='form-control input-sm m-b-10' name='state' value="-1"> -->
        		<div class='medio-body'>
    				订单号：<input type='text' class='form-control input-sm m-b-10' name='lid'>
    			</div>
                <div class='medio-body'>
                    商品编号：<input type='text' class='form-control input-sm m-b-10' name='gid'>
                </div>
                <div class='medio-body'>
                    用户ID：<input type='text' class='form-control input-sm m-b-10' name='uid'>
                </div>
                <div class='medio-body'>
                    商品名称：<input type='text' class='form-control input-sm m-b-10' name='name'>
                </div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>订单编号</th>
                        <th>商品编号</th>
                        <th>用户ID</th>
                        <th>商品数量</th>
                        <th>商品图片</th>
                        <th>单价</th>
                        <th>商品名称</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->lid }}</td>
	                        <td>{{ $v->gid }}</td>
	                        <td>{{ $v->uid }}</td>
	                        <td>{{ $v->num }}</td>
	                        <td><img src="/Admin/upload/{{ $v->pic }}"></td>
	                        <td>{{ $v->price }}</td>
	                        <td>{{ $v->name }}</td>
	                        <td>
                                <a class="btn btn-sm btn-alt m-r-5" href="/admin/book_lists/{{ $v->lid }}/edit">修改</a>
	                        </td>
	                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $list->appends($where)->links() }}

        </div>
    </div>
@endsection