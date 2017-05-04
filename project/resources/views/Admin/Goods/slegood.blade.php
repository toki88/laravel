@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="tableHover">
        <h4 class="block-title">用户信息列表</h4>
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
                <input class="btn btn-sm" type='submit' class='btn' value='搜索'>
            </form>
            <table class="table table-bordered table-hover tile" >

                @foreach($ob as $v)
                    <form action='/admin/updgoods/{{ $v->gid }}' method='post' enctype='multipart/form-data'>
                        {{ csrf_field() }}
                        
                        <h4>ID</h4>
                        <input disabled="" class="form-control" type="text" value="{{ $v->gid }}">
                        <h4>商品名</h4>
                        <input disabled="" class="form-control" type="text" value="{{ $v->gname }}">
                        <div class="col-lg-8"><h4>详情图</h4>
                            @foreach($pic as $ka => $va)
                                <!-- <input class='form-control m-b-6' type='text' name='pic[]' value="{{ $va }}"> -->
                                <img src="/admin/upload/{{ $va }}" height='60'>
                                <input type='file' name='pic[]'>
                            @endforeach
                            <!-- <div ><input class='form-control m-b-6' type='text' name='pic[]' ></div> -->
                            <div>
                                <input type='file' name='pic[]'>
                                <input type='file' name='pic[]'>
                                <input type='file' name='pic[]'>
                                <input type='file' name='pic[]'>
                                <input type='file' name='pic[]'>
                                <input type='file' name='pic[]'>
                            </div>
                        </div>
                                    
                        <div class="col-lg-8"><h4>详情参数 </h4>       @foreach($data as $ka => $va)
                                <input class='form-control m-b-6' type='text' name='data[]' value="{{ $va }}">
                            @endforeach
                            <div >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                                <input class='form-control m-b-6' type='text' name='data[]' >
                            </div>

                        </div>
                        <div class="col-lg-8"><h4>详情选项 格式:(名称~~值1``值2``值3``)</h4>        @foreach($check as $ka => $va)
                                <input class='form-control m-b-6' type='text' name='check[]' value="{{ $va }}">
                            @endforeach
                            <div >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                                <input class='form-control m-b-6' type='text' name='check[]' >
                            </div>
                        </div>
                        <div class="col-lg-8"><h4>详情细节图 </h4>       @foreach($spec as $ka => $va)
                                <!-- <input class='form-control m-b-6' type='text' name='spec[]' value="{{ $va }}"> -->
                                <img src="/admin/upload/{{ $va }}" height='60'>
                                <input type='file' name='spec[]'>
                            @endforeach
                            <div >
                                <!-- <input class='form-control m-b-6' type='text' name='spec[]' > -->
                                <input type='file' name='spec[]'>
                                <input type='file' name='spec[]'>
                                <input type='file' name='spec[]'>
                                <input type='file' name='spec[]'>
                                <input type='file' name='spec[]'>
                                <input type='file' name='spec[]'>
                                <input type='file' name='spec[]'>
                            </div>
                        </div>
                        <div class="col-lg-8"><h4>搜索关键字</h4>        @foreach($keyword as $ka => $va)
                                <input class='form-control m-b-6' type='text' name='keyword[]' value="{{ $va }}">
                            @endforeach
                            <div >
                                <input class='form-control m-b-6' type='text' name='keyword[]' >
                                <input class='form-control m-b-6' type='text' name='keyword[]' >
                                <input class='form-control m-b-6' type='text' name='keyword[]' >
                                <input class='form-control m-b-6' type='text' name='keyword[]' >
                                <input class='form-control m-b-6' type='text' name='keyword[]' >
                                <input class='form-control m-b-6' type='text' name='keyword[]' >
                            </div>
                        </div>
                                
                        <div class="col-lg-8"><h4>操作</h4>
                            <a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->gid }})'>删除</a>
                            <a class="btn btn-sm btn-alt m-r-5" href='/admin/goods/{{ $v->gid }}/edit'>修改基本商品资料</a>
                            <input class="btn btn-sm" type='submit' class='btn' value='提交'>
                        </div>
                    </form>
                @endforeach
            </table>
            
        </div>
    </div>
    <script type="text/javascript" src='/js/jquery-1.8.3.min.js'></script>
    <script type="text/javascript">
        function doDel(id){
                var form = document.myform;
                form.action = '/admin/goods/'+id;
                form.submit();
        }


        

@endsection