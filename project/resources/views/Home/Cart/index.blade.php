@extends("Home.Public.public")
@section("main")
    <div class="i_bg">
        <div class="content mar_20">
            <img src="/static/Home/images/img1.jpg" />
        </div>

        <!--Begin 第一步：查看购物车 Begin -->
        <div class="content mar_20">
            <table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="car_th" width="490">商品名称</td>
                    <td class="car_th" width="140">属性</td>
                    <td class="car_th" width="150">购买数量</td>
                    <td class="car_th" width="130">小计</td>
                    <td class="car_th" width="140">返还积分</td>
                    <td class="car_th" width="150">操作</td>
                </tr>
                @foreach($data as $value)
                <tr class="tr">

                    <td>
                        <div class="c_s_img"> <input type="checkbox" id={{$value->sid}} pid={{$value->pid}} class="xuanze"/><img src="/static/Public/images/{{$value->main_img}}" width="73" height="73" /></div>
                        <div>{{$value->pname}}</div>
                    </td>
                    <td align="center">@foreach($value->attr as $k=>$v) {{$k}}:{{$v}} @endforeach</td>
                    <td align="center">
                        <div class="c_num">
                            <input type="button" disabled value="" onclick="jianUpdate1(jq(this));" class="car_btn_1" />
                            <input type="text" value="{{$value->number}}" max="{{$value->stock}}" name="" class="car_ipt" />
                            <input type="hidden"  value="{{$value->price}}" class="price"/>
                            <input type="hidden" value="{{$value->stock}}" class="stock"/>
                            <input type="button" value="" onclick="addUpdate1(jq(this));" class="car_btn_2" />
                        </div>
                    </td>
                    <td align="center" class="money" id="money" style="color:#ff4e00;">￥<span>{{$value->price}}</span></td>
                    <td id="price" align="center">26R</td>
                    <td align="center" class="delete"><a class="dele" onclick="ShowDiv('MyDiv','fade')" type="{{$value->sid}}">删除</a>&nbsp; &nbsp;<a href="#">加入收藏</a></td>
                </tr>
                @endforeach
                <tr height="70" class="totalprice">
                    <td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
                        <label class="r_rad"></label><a class="r_txt">全选</a>
                        <span class="fr">商品总价：￥<b style="font-size:22px; color:#ff4e00;">0</b></span>
                    </td>
                </tr>
                <script>
                    var a = 0;
                    $('.tr').each(function(){
                        a += parseFloat($(this).children('.money').find('span').text());
                        b= $(this).find(".price").val();
                        c=$(this).find(".car_ipt").val();
                        d = b*c;
                        // alert(d);
                        $(this).find(".money").find("span").html(d);
                    });
                    var stock;
                    var num;
                    var price;
                    $(".car_btn_2").click(function () {
                            $(this).prev().prev().prev().prev().attr("disabled", false);
                            //商品库存
                            stock = $(this).prev().val();
                            //商品价格
                            price = parseFloat($(this).prev().prev().val());
                            //购买个数
                            num = parseInt($(this).prev().prev().prev().val());
                            //商品总计
                            he = parseFloat((price * num).toFixed(2));
                            $(this).parents("td").next().find("span").html(he);
                            //购物车总计
                            money = parseFloat($(this).parents("tr").siblings(".totalprice").find("b").html());
                            moneys = parseFloat((money + price).toFixed(2));
                            $(this).parents("tr").siblings(".totalprice").find("b").html(moneys);
                            if (num >= stock) {
                                $(this).attr("disabled", true);
                                ShowDiv('MyDiv_1', 'fade_1')
                            }
                    });
                    $(".car_btn_1").click(function () {
                        $(this).next().next().next().next().attr("disabled",false);
                        //购买个数
                        num = $(this).next().val();
                        //商品价格
                        price = $(this).next().next().val();
                        //商品总计
                        he = parseFloat((price*num).toFixed(2));
                        $(this).parents("td").next().find("span").html(he);
                        //购物车总计
                        money=parseFloat($(this).parents("tr").siblings(".totalprice").find("b").html());
                        moneys=parseFloat((money-price).toFixed(2));
                        $(this).parents("tr").siblings(".totalprice").find("b").html(moneys);
                        if(num <=1){
                            $(this).attr("disabled",true);
                        }
                    });
                    $('.xuanze').click(function(){
                        if(!$(this).attr("checked")){
                            $(this).attr("checked",true);
                            //获取商品小计
                          money =parseFloat($(this).parents("td").siblings(".money").find("span").html());
                            //加总数
                          moneys =parseFloat($(this).parents("tr").siblings(".totalprice").find("b").html());
                            zong = parseFloat((money+moneys).toFixed(2));
                            $(this).parents("tr").siblings(".totalprice").find("b").html(zong);
                        }else{
                            $(this).attr("checked",false);
                            //获取商品小计
                            money =parseFloat($(this).parents("td").siblings(".money").find("span").html());
                            //减总数
                            moneys =parseFloat($(this).parents("tr").siblings(".totalprice").find("b").html());
                            zong = parseFloat((moneys-money).toFixed(2));
                            $(this).parents("tr").siblings(".totalprice").find("b").html(zong);
                        }
                        });
                    //全选
                    $(".r_txt").click(function () {
                        var num = 0;
                        $(".tr").each(function () {
                            //总数等于总数加未选中的商品价格
                            if(!$(this).find(".xuanze").attr("checked")){
                                //商品小计
                               xiaoji = parseFloat($(this).find(".money").find("span").html());
                               num += xiaoji;
                            }
                            //全部选中
                            $(this).find(".xuanze").attr("checked",true);
                        })
                       zong = parseFloat($(this).siblings("span").find("b").html());
                        zongs = parseFloat((num+zong).toFixed(2));
                        $(this).siblings("span").find("b").html(zongs);
                    });
                </script>
                <tr valign="top" height="150">
                    <td colspan="6" align="right">
                        <a href="/home"><img src="/static/Home/images/buy1.gif" /></a>&nbsp; &nbsp; <a href="#" class="order"><img src="/static/Home/images/buy2.gif" /></a>
                    </td>
                </tr>
            </table>
        </div>
        <script>
            var num;
            var product_id;
            var tot;
            var v = "";
            var a = "";

            $(".order").click(function () {
                if(!$("input").attr("checked")==undefined){
                    alert(1);
                }
                $("input:checked").each(function () {
                    id = $(this).attr("id");
                    product_id = $(this).attr("pid");
                    num = $(this).parents("td").next().next().find(".car_ipt").val();
                    tot =$(this).parents("td").siblings(".money").find("span").html();
                    detail = product_id +","+$(this).parents("td").next().html();
                    a += (detail+"|");
                    $.get("/order",{id:id,product_id:product_id,num:num,tot:tot},function (data) {
                            v += (data+"|");
                    })
                },JSON);
                if(a){
                    setTimeout(function () { test(); }, 4000);
                    function test(){
                        console.log(v);
                        window.location.href="/order/info/"+v+"/"+a;
                    }
                }else{
                    //提示选择商品
                    ShowDiv('MyDiv_4','fade_4');
                }

            });
        </script>
        <!--End 第一步：查看购物车 End-->

        <!--Begin 弹出层-删除商品 Begin-->
        <div id="fade" class="black_overlay"></div>
        <div id="MyDiv" class="white_content">
            <div class="white_d">
                <div class="notice_t">
                    <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="/static/Home/images/close.gif" /></span>
                </div>
                <div class="notice_c">

                    <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td>您确定要把该商品移除购物车吗？</td>
                        </tr>
                        <tr height="50" valign="bottom">
                            <td><a href="#"  class="b_sure">确定</a><a href="#" onclick="CloseDiv('MyDiv','fade')" class="b_buy">取消</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <script>
            $(".dele").click(function () {
                $(".b_sure").attr("type",$(this).attr("type"));
            });
            $(".b_sure").click(function () {
                id = $(this).attr("type");
                $.get("/shoppingcart/"+id,{},function (data) {
                    if(data == 1){
                        //成功
                        //关闭删除弹框
                        CloseDiv('MyDiv','fade');
                        //弹出提示弹框
                        ShowDiv('MyDiv_2','fade_2');
                        //调用方法删除页面对应数据
                        text(id);
                    }else{
                        //失败
                        //关闭删除弹框
                        CloseDiv('MyDiv','fade');
                        //弹出提示弹框
                        ShowDiv('MyDiv_3','fade_3');
                    }
                })
            });
            function text(id){
                $(".tr").each(function () {
                   if($(this).find(".dele").attr("type") == id){
                     $(this).remove();
                   }
                });
            }
        </script>
        <!--End 弹出层-删除商品 End-->
        <!--Begin 弹出层-商品最大库存 Begin-->
        <div id="fade_1" class="black_overlay"></div>
        <div id="MyDiv_1" class="white_content">
            <div class="white_d">
                <div class="notice_t">
                    <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv_1','fade_1')"><img src="/static/Home/images/close.gif" /></span>
                </div>
                <div class="notice_c">

                    <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td>已到商品最大库存</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!--End 弹出层-商品最大库存 End-->
        <!--Begin 弹出层-删除商品成功 Begin-->
        <div id="fade_2" class="black_overlay"></div>
        <div id="MyDiv_2" class="white_content">
            <div class="white_d">
                <div class="notice_t">
                    <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv_2','fade_2')"><img src="/static/Home/images/close.gif" /></span>
                </div>
                <div class="notice_c">

                    <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td>移出成功</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!--End 弹出层-删除商品成功 End-->
        <!--Begin 弹出层-删除商品失败 Begin-->
        <div id="fade_3" class="black_overlay"></div>
        <div id="MyDiv_3" class="white_content">
            <div class="white_d">
                <div class="notice_t">
                    <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv_3','fade_3')"><img src="/static/Home/images/close.gif" /></span>
                </div>
                <div class="notice_c">

                    <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td>移除失败</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!--End 弹出层-删除商品失败 End-->

        <!--Begin 弹出层-选择商品 Begin-->
        <div id="fade_4" class="black_overlay"></div>
        <div id="MyDiv_4" class="white_content">
            <div class="white_d">
                <div class="notice_t">
                    <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv_4','fade_4')"><img src="/static/Home/images/close.gif" /></span>
                </div>
                <div class="notice_c">

                    <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td>请选择商品</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!--End 弹出层-选择商品 End-->
@endsection