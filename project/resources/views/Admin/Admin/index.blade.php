@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">管理员信息列表</h3>
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
        	<form action='admin' method='post' name='myform'>
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}
        	</form>
        	<form action='admin' method='get'>
        		<div class='medio-body'>
    				姓名：<input type='text' class='form-control input-sm m-b-10' name='name'>
    			</div>
        		<div>
        			权限：<select name='gid' class='form-control input-sm m-b-10'>
        				<option value=''>--请选择--</option>
        				<option value='0'>普通管理员</option>
                        <option value='1'>高级管理员</option>
                        <option value='2'>超级管理员</option>
        			</select>
        		</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>访问时间</th>
                        <th>访问次数</th>
                        <th>权限</th>

                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->id }}</td>
	                        <td>{{ $v->name }}</td>
	                        <td>{{ date('Y-m-d H:i:s',$v->time) }}</td>
                            <td>{{ $v->num }}</td>
                            <td>@if($v->gid == 0) {{ '普通管理员' }}@elseif($v->gid == 1){{ '高级管理员' }} @else ($v->gid == 2){{ '超级管理员' }}@endif</td>
	                     
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='admin/{{ $v->id }}/edit'>修改</a>
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
        		form.action = 'admin/'+id;
        		form.submit();
        }
    </script>
@endsection