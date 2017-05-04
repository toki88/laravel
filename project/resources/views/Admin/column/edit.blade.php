@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改分类</h3>
        <p>修改分类</p>
        <div class="row">
            <form action='/admin/column/{{ $ob->cid }}' method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入类名" name='name' value="{{ $ob->name }}">
                </div>
                <br><br><br>
                <div class="col-lg-4">
                    是否在主页推荐
                    <select class="form-control m-b-10" name='display'>
                        <option value='0' @if($ob->display ==0)selected @endif>否</option>
                        <option value='1' @if($ob->display ==1)selected @endif>是</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
@endsection

