@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">退货订单列表</h3>
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
        	<form action='/admin/refund' method='post' name='myform'>
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}
        	</form>

        	<form action='/admin/refund' method='get'>
        		<div class='medio-body'>
    				退货订单名称：<input type='text' class='form-control input-sm m-b-10' name='name'>
    			</div>
        		
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>退货编号</th>
                        <th>退货产品</th>
                        <th>退货时间</th>
                        <th>退货图片</th>
                        <th>退货/换货</th>
                        <th>退货原因</th>
                        <th>其他说明</th>
                        <th>退款状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $v)
                    	<tr>
	                        <td>{{ $v->lid }}</td>
	                        <td>{{ $v->name }}</td>
                            <td>{{ $v->ltime }}</td>
                            <td>@if($v->refund_pic)<img src="/Admin/upload/{{ $v->refund_pic }}" width="50">@endif</td>
                            <td>@if($v->refund_type == 0)退款@elseif($v->refund_type == 1)换货@endif</td>
                            <td>{{ $v->refund_reason }}</td>
	                        <td>{{ $v->refund_other_reason }}</td>
                            <td>@if($v->state==4)退款审核@endif @if($v->state==5)已退款@endif</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->lid }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href="/admin/refund/{{ $v->lid }}/edit">修改</a>
                                <a class="btn btn-sm btn-alt m-r-5" href="/admin/torefund/{{ $v->lid }}">确定退货</a>
	                        </td>
	                    </tr>
                        @endforeach
                </tbody>
            </table>
            {{ $data->appends($where)->links() }}
        </div>
    </div>
    <script type="text/javascript">
        function doDel(id){
        	if(confirm('确定删除吗？')){
        		var form = document.myform;
        		form.action = '/admin/refund/'+id;
        		form.submit();
        	}
        }

    </script>
@endsection