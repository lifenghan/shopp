@extends("Home.Public.public")
@section("main")
<div class="i_bg">
    <div class="content mar_20">
        <img src="/static/Home/images/img3.jpg" />
    </div>

    <!--Begin 第三步：提交订单 Begin -->
    <div class="content mar_20">
        <div class="warning">
            <table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
                <tbody><tr height="35">
                    <td style="font-size:18px;">
                        感谢您在本店购物！您的订单已提交成功，请记住您的订单号: <font color="#ff4e00">{{session("order_info")['order_code']}}</font>
                    </td>
                </tr>
                <tr>
                    <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                        您选定的配送方式为: <font color="#ff4e00">申通快递</font>； &nbsp; &nbsp;您选定的支付方式为: <font color="#ff4e00">支付宝</font>； &nbsp; &nbsp;您的应付款金额为: <font color="#ff4e00">￥{{session("order_info")["tot"]}}</font>
                    </td>
                </tr>
                <tr>
                    <td style="padding:20px 0 30px 0; font-family:'宋体';">
                         收货人名称：{{$address->name}} ；手机： {{$address->phone}} ；收获地址：{{$address->huo}} ;收获信息：{{$address->city}} <br>
                        注意事项：办理电汇时，请在电汇单“汇款用途”一栏处注明您的订单号。
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="/home">首页</a> &nbsp; &nbsp; <a href="/personal">用户中心</a>
                    </td>
                </tr>
                </tbody></table>
        </div>
    </div>
</div>
@endsection
