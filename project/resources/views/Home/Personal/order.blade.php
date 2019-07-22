@extends("Home.Public.personal")
@section("title","订单列表")
@section("main")

<div class="m_right">
            <p></p>
            <div class="mem_tit">我的订单</div>
            <div class="mem_tit" style="color:#EE2C2C;">未付款订单</div>
            <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tbody><tr>                                                                                                                                                    
                <td width="10%">ID</td>
                <td width="20%">订单号</td>
                <td width="25%">下单时间</td>
                <td width="15%">订单总金额</td>
                <!-- <td width="15%">订单状态</td> -->
                <!-- <td width="35%">操作</td> -->
              </tr>
              @foreach ($data as $row)
              <tr>
                <td>{{$row->id}}</td>
                <td><a href="#">{{$row->order_code}}</a></td>
                <td>{{$row->create_time}}</td>
                <td>{{$row->tot}}</td>
                <!-- <td>//{{$row->status}}</td> -->
                <!-- <td>取消订单</td> -->
              </tr>
              @endforeach
            </tbody></table>
          <!--已付款订单-->
           <div class="mem_tit" style="color:#458B00">已付款订单&nbsp;&nbsp;(点击订单号获取详情信息)</div>
            <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tbody><tr>                                                                                                                                                    
                <td width="10%">ID</td>
                <td width="20%">订单号</td>
                <td width="25%">下单时间</td>
                <td width="15%">订单总金额</td>
                <!-- <td width="15%">订单状态</td> -->
                <!-- <td width="35%">操作</td> -->
              </tr>
              @foreach ($data1 as $row)
              <tr>
                <td>{{$row->id}}</td>
                <td><a href="/orderinfo/{{$row->id}}">{{$row->order_code}}</a></td>
                <td>{{$row->create_time}}</td>
                <td>{{$row->tot}}</td>
                <!-- <td>//{{$row->status}}</td> -->
                <!-- <td>取消订单</td> -->
              </tr>
              @endforeach
            </tbody></table>


           <div class="mem_tit" style="color:#EE7600">已发货订单&nbsp;&nbsp;(如收到货物可点击确认收货)</div>
            <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tbody><tr>                                                                                                                                                    
                <td width="10%">ID</td>
                <td width="20%">订单号</td>
                <td width="25%">下单时间</td>
                <td width="15%">订单总金额</td>
                <!-- <td width="15%">订单状态</td> -->
                <td width="35%">操作</td>
              </tr>
              @foreach ($data2 as $row)
              <tr>
                <td>{{$row->id}}</td>
                <td><a href="/orderinfo/{{$row->id}}">{{$row->order_code}}</a></td>
                <td>{{$row->create_time}}</td>
                <td>{{$row->tot}}</td>
                <!-- <td>{{$row->status}}</td> -->
                <td><a href="/personalorder/{{$row->id}}">确认收货</a></td>
              </tr>
              @endforeach
            </tbody></table>

            <div class="mem_tit" style="color:#912CEE">确认收货订单&nbsp;&nbsp;(商品评价可在订单详情中操作)</div>
            <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tbody><tr>                                                                                                                                                    
                <td width="10%">ID</td>
                <td width="20%">订单号</td>
                <td width="25%">下单时间</td>
                <td width="15%">订单总金额</td>
                <!-- <td width="15%">订单状态</td> -->
                <!-- <td width="35%">操作</td> -->
              </tr>
              @foreach ($data3 as $row)
              <tr>
                <td>{{$row->id}}</td>
                <td><a href="/orderinfo/{{$row->id}}">{{$row->order_code}}</a></td>
                <td>{{$row->create_time}}</td>
                <td>{{$row->tot}}</td>
                <!-- <td>//{{$row->status}}</td> -->
                <!-- <td><a href="/comment/{{$row->id}}/edit">评价商品</a></td> -->
              </tr>
              @endforeach
            </tbody></table>

@endsection