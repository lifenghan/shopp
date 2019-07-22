@extends("Home.Public.personal")
@section("title","订单详情")
@section("main")

<div class="m_right">
            <p></p>
            <div class="mem_tit">订单详情</div>
            <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tbody><tr>                                                                                                                                                    
                <td width="5%">ID</td>
                <td width="20%">下单商品</td>
                <td width="10%">商品数量</td>
                <td width="15%">商品金额</td>
                <td width="40%">商品详细信息</td>
                <td width="10%">操作</td>
              </tr>
              @foreach ($data1 as $row)
              <tr>
                <td>{{$row->oid}}</td>
                <td>{{$row->pname}}</td>
                <td>{{$row->onum}}</td>
                <td>{{$row->otot}}</td>
                <td>{{$row->ode}}</td>
                <td><a href="/comment/{{$row->pid}}/edit">商品评价</a></td>
              </tr>
              @endforeach
            </tbody></table>


<!--             <div class="mem_tit">合并订单</div>
            <table border="0" class="order_tab" style="width:930px;" cellspacing="0" cellpadding="0">
              <tbody><tr>
                <td width="135" align="right">主订单</td>
                <td width="220">
                	<input type="hidden" name="order1"><div class="jslct" style="z-index: 0;"><div class="jslct_t"><em>请选择...</em></div><dl style="width: 180px; overflow: hidden auto; display: none;"><dd val="0" class="noborder jslcted" style="width: 197px;">请选择...</dd><dd val="1" style="width: 197px;">2015092626589</dd><dd val="2" style="width: 197px;">2015092626589</dd><dd val="3" style="width: 197px;">2015092626589</dd><dd val="4" style="width: 197px;">2015092626589</dd></dl></div>
                </td>
                <td width="135" align="right">从订单</td>
                <td width="220">
                	<input type="hidden" name="order2"><div class="jslct" style="z-index: 0;"><div class="jslct_t"><em>请选择...</em></div><dl style="width: 180px; overflow: hidden auto; display: none;"><dd val="0" class="noborder jslcted" style="width: 197px;">请选择...</dd><dd val="1" style="width: 197px;">2015092626589</dd><dd val="2" style="width: 197px;">2015092626589</dd><dd val="3" style="width: 197px;">2015092626589</dd><dd val="4" style="width: 197px;">2015092626589</dd></dl></div>
                </td>
                <td><div class="btn_u"><a href="#">合并订单</a></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="4" style="font-family:'宋体'; padding:20px 10px 50px 10px;">
                	订单合并是在发货前将相同状态的订单合并成一新的订单。 <br>
                    收货地址，送货方式等以主定单为准。
                </td>
              </tr>
            </tbody></table>

            
        </div> -->
@endsection