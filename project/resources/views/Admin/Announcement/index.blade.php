@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">评价管理</h3>
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
        	<form action='/admin/announcement' method="post" name='myform'>
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}
        	</form>


            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>公告编号</th>
                        <th>公告标题</th>
                        <th>链接地址</th>
                        <th>位置</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->aid }}</td>
	                        <td>{{ $v->content }}</td>
                            <td>{{ $v->url }}</td>
	                        <td>{{ ($v->order == 1)?'上':'下' }}</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->aid }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href="/admin/announcement/{{ $v->aid }}/edit">修改</a>
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
        		form.action = '/admin/announcement'+id;
        		form.submit();
        	}
        }
    </script>
@endsection