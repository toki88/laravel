@extends('Home.base.parent')
@section('content')

<link rel="stylesheet"  type="text/css" href="/Home/AmazeUI-2.4.2/assets/css/amazeui.css"/>
<link href="/Home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/Home/basic/css/demo.css" rel="stylesheet" type="text/css" />

<link href="/Home/css/sustyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Home/basic/js/jquery-1.7.min.js"></script>
</div>
<div class="clear"></div>



<div class="take-delivery">
 <div class="status">
   <h2>您已成功付款</h2>
   <div class="successInfo">
     <ul>
       <li>付款金额<em>¥{{ $p }}</em></li>
       <div class="user-info">
         <p>收货人：{{ $name }}</p>
         @foreach($list_address as $v)
         <p>联系电话：{{ $v->phone }}</p>
         <p>收货地址：{{ $v->address }}</p>
         @endforeach
       </div>
             请认真核对您的收货信息，如有错误请联系客服
                               
     </ul>
     <div class="option">
       <span class="info">您可以</span>
        <a href="/home/per_order" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
        <a href="/Home/per_loorder/" class="J_MakePoint">查看<span>交易详情</span></a>
     </div>
    </div>
  </div>
</div>

@endsection