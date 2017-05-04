@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="tableHover">
        <h3 class="block-title">用户信息列表</h3>
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
            <form action='goods' method='get'>
                <div class='medio-body'>
                    商品名：<input type='text' class='form-control input-sm m-b-10' name='gname'>
                </div>
                <input type='submit' class='btn' value='搜索'>
            </form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品名</th>
                        <th>标题</th>
                        <th>上级分类</th>
                        <th>已售出</th>
                        <th>库存</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)

                        <tr>
                            <td>{{ $v->gid }}</td>
                            <td>{{ $v->gname }}</td>
                            <td>{{ $v->title }}</td>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->sell }}</td>
                            <td>{{ $v->stock }}</td>
                            <td>
                                <a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->gid }})'>删除</a>
                                <a class="btn btn-sm btn-alt m-r-5" href='goods/{{ $v->gid }}/edit'>修改</a>
                                <a class="btn btn-sm btn-alt m-r-5" href='selgoods/{{ $v->gid }}'>详情</a>
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
                form.action = 'goods/'+id;
                form.submit();
        }
    </script>
@endsection