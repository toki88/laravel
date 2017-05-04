@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改友情链接</h3>
        <p>修改友情链接</p>
        <div class="row">
            <form action='/admin/flink/{{ $ob->id }}' method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div>
                    友情链接名：
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='name' value="{{ $ob->name }}">
                </div>
               <div>
                    url：
                    <input type="text" class="form-control m-b-10" placeholder="请输入url地址" name='url' value="{{ $ob->url }}">
                </div>
                <div>
                    显示状态：
                <div> 
                    <div class="col-lg-1">
                         <input type="radio" name="display"value="1" {{ ($ob->display == 1)?'checked' : '' }}>显示链接
                    </div>
                    <div>
                         <input type="radio" name="display"value="0" {{ ($ob->display == 0)?'checked' : '' }}>屏蔽链接
                    </div>
                </div>
                </div>
                
                <br>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
@endsection