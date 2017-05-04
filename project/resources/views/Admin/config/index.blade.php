@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">网站配置管理</h3>
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
        	<form action='user' method='post' name='myform'>
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}
        	</form>
        	<form action='config' method='get'>

        		<div>
        			网站标题：<input type='text' class='form-control input-sm m-b-10' name='name'>
        		</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>网站标题</th>
                        <th>网站关键字</th>
                        <th>描述</th>
                        <th>网站状态</th>
                        <th>网站名称</th>
                        <th>网站LOGO</th>
                        <th>网站版权</th>
                        <th>开启配置</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->id }}</td>
	                        <td>{{ $v->title }}</td>
	                        <td>{{ $v->key }}</td>
                            <td>{{ $v->desn }}</td>
	                        <td>{{ ($v->state == 0)?'维护':'开放' }}</td>
                            <td>{{ $v->name }}</td>
                            <td><img src="/admin/upload/{{ $v->logo }}" style='width:50px;'></td>
                            <td>{{ $v->copyright }}</td>
                            <td>{{ ($v->display == 1)?'开启':'关闭' }}</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='config/{{ $v->id }}/edit'>修改</a>
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
        		form.action = 'config/'+id;
        		form.submit();
        }
    </script>
@endsection