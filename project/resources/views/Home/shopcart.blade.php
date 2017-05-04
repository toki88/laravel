@extends('Home.base.parent')
@section('content')
    <link rel="stylesheet" href="/Home/css/shopcartstyle.css"/>
    <script type="text/javascript" src="/Home/js/shopcartscript.js"></script> 
    
    <link href="/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
    <link href="/Home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

    <link href="/Home/basic/css/demo.css" rel="stylesheet" type="text/css" />

    <link href="/Home/css/hmstyle.css" rel="stylesheet" type="text/css" />
    <script src="/Home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/Home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>          
</div>

    <hr>
<table id="cartTable"style="margin-left:19%; border:1px solid #cadeff;">
    <thead>
        <tr style='border:1px solid #cadeff;'>
            <!-- <th><label><input class="check-all check" type="checkbox"/>&nbsp;全选</label></th> -->
            <th>商品</th>
            <td>单价</th>
            <td>数量</th>
           <!--  <td>小计</th> -->
            <!-- <td>操作</th> -->
        </tr>
    </thead>

    <tbody>
        <tr  style='border:1px solid #cadeff;'>
            <!-- <td style='border:1px solid #cadeff;' class="checkbox"><input class="check-one check" type="checkbox"/></td> -->
            <td style='border:1px solid #cadeff;' class="goods"><img src="/admin/upload/{{ session('c')['pic'] }}" alt=""style="width:100px;height:100px;"/><span>{{ session('c')['name'] }}</span></td>
            <td style='border:1px solid #cadeff;' class="price">{{ session('c')['price'] }}</td>
            <td style='border:1px solid #cadeff;' class="count">
                <span>{{ session('c')['num'] }}</span>

        </tr>
    </tbody>
</table>



<div class="foot" id="foot" style="margin-left:19%">
    <!-- <label class="fl select-all"><input type="checkbox" class="check-all check"/>&nbsp;全选</label> -->
    <a class="fl delete" id="deleteAll" href="/home/clear">清空购物车</a>
    <form action='/home/do' method='post'>
                        {{ csrf_field() }}
     <input type='hidden' name='name' value='{{ session('c')['name'] }}'>
     <input type='hidden' name='price' value='{{ session('c')['price'] }}'>
     <input type='hidden' name='gid' value='{{ session('c')['gid'] }}'>
     <input type='hidden' name='pic' value='{{ session('c')['pic'] }}'>
     <input type='hidden' name='num' value='{{ session('c')['num'] }}'>
     <input type='hidden' name='check' value='{{ session('c')['check'] }}'>
     <input type='hidden' name='uid' value='{{ session('c')['uid'] }}'>


        <div class="fr closing"><input type='submit' value='结算'></div>

</form>
    <div class="fr total">合计：￥<span id="priceTotal">{{ session('c')['num']*session('c')['price']}}</span></div>
    <!-- <div class="fr selected" id="selected">已选商品 -->
        <!-- <span id="selectedTotal">0</span>件 -->
        <!-- <span class="arrow up">︽</span> -->
        <!-- <span class="arrow down">︾</span> -->
    </div>
    <div class="selected-view">
        <div id="selectedViewList" class="clearfix">
        </div>
        <span class="arrow"><span></span></span>
    </div>
</div>

@endsection