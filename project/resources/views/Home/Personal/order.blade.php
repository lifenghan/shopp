@extends("Home.Public.personal")
@section("title","订单列表")
@section("main")

<div class="m_right">
            <p></p>
            <div class="mem_tit">我的订单</div>
            <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tbody><tr>                                                                                                                                                    
                <td width="20%">订单号</td>
                <td width="25%">下单时间</td>
                <td width="15%">订单总金额</td>
                <td width="25%">订单状态</td>
                <td width="15%">操作</td>
              </tr>
              <tr>
                <td><font color="#ff4e00">2015092823056</font></td>
                <td>2015-09-26   16:45:20</td>
                <td>￥456.00</td>
                <td>未确认，未付款，未发货</td>
                <td>取消订单</td>
              </tr>
              <tr>
                <td><font color="#ff4e00">2015092823056</font></td>
                <td>2015-09-26   16:45:20</td>
                <td>￥456.00</td>
                <td>已确认，已付款，已发货</td>
                <td><font color="#ff4e00">已确认</font></td>
              </tr>
              <tr>
                <td><font color="#ff4e00">2015092823056</font></td>
                <td>2015-09-26   16:45:20</td>
                <td>￥456.00</td>
                <td>未确认，未付款，未发货</td>
                <td>取消订单</td>
              </tr>
              <tr>
                <td><font color="#ff4e00">2015092823056</font></td>
                <td>2015-09-26   16:45:20</td>
                <td>￥456.00</td>
                <td>已确认，已付款，已发货</td>
                <td><font color="#ff4e00">已确认</font></td>
              </tr>
              <tr>
                <td><font color="#ff4e00">2015092823056</font></td>
                <td>2015-09-26   16:45:20</td>
                <td>￥456.00</td>
                <td>未确认，未付款，未发货</td>
                <td>取消订单</td>
              </tr>
              <tr>
                <td><font color="#ff4e00">2015092823056</font></td>
                <td>2015-09-26   16:45:20</td>
                <td>￥456.00</td>
                <td>已确认，已付款，已发货</td>
                <td><font color="#ff4e00">已确认</font></td>
              </tr>
              <tr>
                <td><font color="#ff4e00">2015092823056</font></td>
                <td>2015-09-26   16:45:20</td>
                <td>￥456.00</td>
                <td>未确认，未付款，未发货</td>
                <td>取消订单</td>
              </tr>
            </tbody></table>


            <div class="mem_tit">合并订单</div>
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

            
        </div>
@endsection