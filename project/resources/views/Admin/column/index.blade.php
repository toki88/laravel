@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">分类信息列表</h3>
        @if(session('msg'))
        	<div class="alert alert-success alert-icon">
			{{ session('msg') }}
			<i class="icon"></i>
			</div>
        @endif
        @if(session('error'))
        	<div class="alert alert-warning alert-icon">
			{{ session('error') }}
			<i class="icon"></i>
			</div>
		@endif
        <div class="table-responsive overflow">
        	<form action='column' method='post' name='myform'>
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}
        	</form>
        	<form action='column' method='get'>
        		<div class='medio-body'>
    				分类名称：<input type='text' class='form-control input-sm m-b-10' name='name'>
    			</div>
        		<div>
        			
        		</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>分类名称</th>
                        <th>路径</th>
                        <th>上级ID</th>
                        <th>是否在主页推荐</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->cid }}</td>
	                        <td>{{ $v->name }}</td>
	                        <td>{{ $v->path }}</td>
	                        <td>{{ $v->upid}}</td>
                            <td>@if($v->display==1)是@endif @if($v->display==0)否@endif</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->cid }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='column/{{ $v->cid }}/edit'>修改</a>
                                <a class="btn btn-sm btn-alt m-r-5" href='addSon/{{ $v->cid }}'>添加子类</a>
                                <a class="btn btn-sm btn-alt m-r-5" href='/admin/addgoods/{{ $v->cid }}/{{ $v->path }}'>添加商品</a>


	                        </td>
	                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $list->appends($where)->links() }}
        </div>
    </div>
    <script type="text/javascript">
        function doDel(id){
        		var form = document.myform;
        		form.action = 'column/'+id;
        		form.submit();
        }
    </script>
@endsection

