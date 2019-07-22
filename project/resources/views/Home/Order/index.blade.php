@extends("Home.Public.public")
@section("main")

    <div class="i_bg">
        <div class="content mar_20">
            <img src="/static/Home/images/img2.jpg" />
        </div>

        <!--Begin 第二步：确认订单信息 Begin -->
        <div class="content mar_20">
            <div class="two_bg">
                <div class="two_t">
                    <span class="fr"></span>商品列表
                </div>
                <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="car_th" width="550">商品名称</td>
                        <td class="car_th" width="140">属性</td>
                        <td class="car_th" width="150">购买数量</td>
                        <td class="car_th" width="130">小计</td>
                        <td class="car_th" width="140">返还积分</td>
                    </tr>
                    @foreach($a as $value)
                    <tr class="tr">
                        <td>
                            <div class="c_s_img"><img src="/static/Public/images/{{$value['main_img']}}" width="73" height="73" /></div>
                            {{$value['name']}}
                        </td>
                        <td align="center">{{$value['detail']}}</td>
                        <td align="center">{{$value['num']}}</td>
                        <td align="center" class="tot" style="color:#ff4e00;">￥<span>{{$value['tot']}}</span></td>
                        <td align="center">26R</td>
                    </tr>
                    @endforeach
                    <tr class="zong">
                        <td colspan="5" align="right" style="font-family:'Microsoft YaHei';">
                            商品总价：￥<span></span>  返还积分 56R
                        </td>
                    </tr>
                </table>

                <div class="two_t">
                    <span class="fr"><a href="/order/{{session("username")->id}}">修改</a></span>收货人信息
                </div>
                <table border="0" class="peo_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="p_td" width="160">名称</td>
                        <td width="395">{{$address->name or ""}}</td>
                        <td class="p_td" width="160">电子邮件</td>
                        <td width="395">{{session("username")->email}}</td>
                    </tr>
                    <tr>
                        <td class="p_td">地址</td>
                        <td>{{$address->huo or ""}}</td>
                        <td class="p_td">详细地址</td>
                        <td>{{$address->city or ""}}</td>
                    </tr>
                    <tr>
                        <td class="p_td">电话</td>
                        <td></td>
                        <td class="p_td">手机</td>
                        <td>{{$address->phone or ""}}</td>
                    </tr>
                </table>
                <div class="two_t">
                    支付方式
                </div>
                <ul class="pay">
                    <li class="checked">余额支付<div class="ch_img"></div></li>
                    <li>银行亏款/转账<div class="ch_img"></div></li>
                    <li>货到付款<div class="ch_img"></div></li>
                    <li>支付宝<div class="ch_img"></div></li>
                </ul>

                <div class="two_t">
                    其他信息
                </div>
                <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
                    <tr valign="top">
                        <td align="right" style="padding-right:0;"><b style="font-size:14px;">订单附言：</b></td>
                        <td style="padding-left:0;"><textarea class="add_txt" style="width:860px; height:50px;"></textarea></td>
                    </tr>
                </table>
                <table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
                    <tr height="70" class="shifu">
                        <td align="right">
                            <b style="font-size:14px;">应付款金额：<span style="font-size:22px; color:#ff4e00;">￥2899</span></b>
                        </td>
                    </tr>
                    <tr height="70">
                        <td align="right">
                            <form action="/addorder" method="post">
                                <input  type="hidden" name="address_id" value="{{$address->id}}">
                                <input class="money" type="hidden" name="tot" value="">
                                {{csrf_field()}}
                            <button type="submit"><img src="/static/Home/images/btn_sure.gif" /></button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <script>
            var a = 0;
            $(".tr").each(function () {
                tot = parseFloat($(this).find(".tot").find("span").html());
                a += tot;
            });
            b = parseFloat(a.toFixed(2))
            $(".zong").find("span").html(b);
            $(".shifu").find("span").html("￥"+b);
            $(".money").val(b);
        </script>
        <!--End 第二步：确认订单信息 End-->
@endsection