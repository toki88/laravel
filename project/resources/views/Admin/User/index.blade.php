@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">用户信息列表</h3>
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
        	<form action='/admin/user' method="post" name='myform'>
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}
        	</form>

        	<form action='/admin/user' method='get'>
        		<div class='medio-body'>
    				姓名：<input type='text' class='form-control input-sm m-b-10' name='name'>
    			</div>
        		<div>
        			性别：<select name='sex' class='form-control input-sm m-b-10'>
        				<option value=''>--请选择--</option>
        				<option value='1'>--男--</option>
        				<option value='2'>--女--</option>
        			</select>
        		</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>用户编号</th>
                        <th>用户名</th>
                        <th>性别</th>
                        <th>ip</th>
                        <th>电话</th>
                        <th>邮箱</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->uid }}</td>
	                        <td>{{ $v->name }}</td>
	                        <td>{{ ($v->sex == 1)?'男':'女' }}</td>
	                        <td>{{ ($_SERVER['REMOTE_ADDR'] == '::1')?$_SERVER['REMOTE_ADDR']='127.0.0.1':$_SERVER['REMOTE_ADDR'] }}</td>
	                        <td>{{ $v->tel }}</td>
	                        <td>{{ $v->email }}</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->uid }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href="/admin/user/{{ $v->uid }}/edit">修改</a>
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
        	if(confirm('确定删除吗？')){
        		var form = document.myform;
        		form.action = '/admin/user/'+id;
        		form.submit();
        	}
        }
    </script>
@endsection