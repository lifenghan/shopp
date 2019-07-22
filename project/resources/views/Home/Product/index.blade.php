@extends("Home.Public.public")
@section("main")

    <div class="i_bg">
        <div class="postion">
            <span class="fl">全部 > {{$cate->name or ''}} > {{$cates->name or ''}} > {{$catess->name or ''}} > {{$product->name or ''}}</span>
        </div>
        <div class="content">

            <div id="tsShopContainer">
                <div id="tsImgS"><a href="/static/Public/images/{{$product->main_img}}" title="Images" class="MagicZoom" id="MagicZoom"><img src="/static/Public/images/{{$product->main_img}}" width="390" height="390" /></a></div>
                <div id="tsPicContainer">
                    <div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
                    <div id="tsImgSCon">
                        <ul>
                            <li onclick="showPic(0)" rel="MagicZoom" class="tsSelectImg"><img src="/static/Public/images/{{$product->main_img}}" tsImgS="/static/Public/images/{{$product->main_img}}" width="79" height="79" /></li>
                            @foreach($images as $value)
                                @if(empty($value->delete_time))
                            <li onclick="showPic(0)" rel="MagicZoom" class="tsSelectImg"><img src="/static/Public/images/{{$value->url}}" tsImgS="/static/Public/images/{{$value->url}}" width="79" height="79" /></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
                </div>
                <img class="MagicZoomLoading" width="16" height="16" src="/static/Public/images/{{$product->main_img}}" alt="Loading..." />
            </div>

            <div class="pro_des">
                <div class="des_name">
                    <p>{{$product->name}}</p>
                    {{$product->summary}}
                </div>
                <div class="des_price">
                    本店价格：<b>￥{{$product->price}}</b><br />
                    消费积分：<span>28R</span>
                </div>

                <div class="des_choice">
                    @foreach($info as $value)
                    <span class="fl">{{$value->name}}:</span>
                    <ul>
                        @foreach(explode(" ", $value->detail) as $key=>$val)
                        <li @if($key == 0) class="checked" @endif>{{$val}}<div class="ch_img"></div></li>

                        @endforeach
                    </ul>
                        <br>
                    @endforeach
                </div>

                <script>
                    $(".des_choice").find("li").click(function () {
                        $(this).each(function () {
                            $(this).prop("class","checked");
                            $(this).siblings().removeProp("class");
                        })}
                    )
                </script>
                <div class="des_share">
                    <div class="d_sh">
                        分享
                        <div class="d_sh_bg">
                            <a href="#"><img src="/static/Home/images/sh_1.gif" /></a>
                            <a href="#"><img src="/static/Home/images/sh_2.gif" /></a>
                            <a href="#"><img src="/static/Home/images/sh_3.gif" /></a>
                            <a href="#"><img src="/static/Home/images/sh_4.gif" /></a>
                            <a href="#"><img src="/static/Home/images/sh_5.gif" /></a>
                        </div>
                    </div>
                    <div class="d_care"><a onclick="ShowDiv('MyDiv','fade')">关注商品</a></div>
                </div>
                <div class="des_join">
                    <div class="j_nums">
                        <input type="text" value="1" name="" class="n_ipt" />
                        <input type="button" value="" onclick="addUpdate(jq(this));" class="n_btn_1" />
                        <input type="button" value="" onclick="jianUpdate(jq(this));" class="n_btn_2" />
                    </div>
                    <span class="fl"><a ><img src="/static/Home/images/j_car.png" /></a></span>
                </div>
            </div>
            <script>
                var name = "";
                var detail="";
                var id = {{$product->id}}
                $(".des_join").find("span").click(function () {
                    $(".des_choice").find("span").each(function () {
                        name += $(this).html();
                    });
                    $(".des_choice").find("li").each(function () {
                        // console.log($(this).text());
                        if(  $(this).attr('class') =='checked'){
                            detail += $(this).text()+":";
                        }
                    });
                    var stock =$(this).siblings("div").children("input").first().val();
                    $.get("/shoppingcart/create",{product_id:id,name:name,detail:detail,number:stock},function (data) {
                        if(data ==1){
                            ShowDiv_1('MyDiv1','fade1')
                        }else{
                            ShowDiv_1('MyDiv2','fade2')
                        }
                    })
                });
            </script>
            <div class="s_brand">
                <div class="s_brand_img"><img src="/static/Home/images/sbrand.jpg" width="188" height="132" /></div>
                <div class="s_brand_c"><a href="#">进入品牌专区</a></div>
            </div>


        </div>
        <div class="content mar_20">
            <div class="l_history">
                <div class="fav_t">用户还喜欢</div>
                <ul>
                    <li>
                        <div class="img"><a href="#"><img src="/static/Home/images/his_1.jpg" width="185" height="162" /></a></div>
                        <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                        <div class="price">
                            <font>￥<span>368.00</span></font> &nbsp; 18R
                        </div>
                    </li>
                    <li>
                        <div class="img"><a href="#"><img src="/static/Home/images/his_2.jpg" width="185" height="162" /></a></div>
                        <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                        <div class="price">
                            <font>￥<span>768.00</span></font> &nbsp; 18R
                        </div>
                    </li>
                    <li>
                        <div class="img"><a href="#"><img src="/static/Home/images/his_3.jpg" width="185" height="162" /></a></div>
                        <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                        <div class="price">
                            <font>￥<span>680.00</span></font> &nbsp; 18R
                        </div>
                    </li>
                    <li>
                        <div class="img"><a href="#"><img src="/static/Home/images/his_4.jpg" width="185" height="162" /></a></div>
                        <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                        <div class="price">
                            <font>￥<span>368.00</span></font> &nbsp; 18R
                        </div>
                    </li>
                    <li>
                        <div class="img"><a href="#"><img src="/static/Home/images/his_5.jpg" width="185" height="162" /></a></div>
                        <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                        <div class="price">
                            <font>￥<span>368.00</span></font> &nbsp; 18R
                        </div>
                    </li>
                </ul>
            </div>
            <div class="l_list">
                <div class="des_border">
                    <div class="des_tit">
                        <ul>
                            <li class="current">推荐搭配</li>
                        </ul>
                    </div>
                    <div class="team_list">
                        <div class="img"><a href="#"><img src="/static/Home/images/mat_1.jpg" width="160" height="140" /></a></div>
                        <div class="name"><a href="#">倩碧补水组合套装8折促销</a></div>
                        <div class="price">
                            <div class="checkbox"><input type="checkbox" name="zuhe" checked="checked" /></div>
                            <font>￥<span>768.00</span></font> &nbsp; 18R
                        </div>
                    </div>
                    <div class="team_icon"><img src="/static/Home/images/jia_b.gif" /></div>
                    <div class="team_list">
                        <div class="img"><a href="#"><img src="/static/Home/images/mat_2.jpg" width="160" height="140" /></a></div>
                        <div class="name"><a href="#">香奈儿邂逅清新淡香水50ml</a></div>
                        <div class="price">
                            <div class="checkbox"><input type="checkbox" name="zuhe" /></div>
                            <font>￥<span>749.00</span></font> &nbsp; 18R
                        </div>
                    </div>
                    <div class="team_icon"><img src="/static/Home/images/jia_b.gif" /></div>
                    <div class="team_list">
                        <div class="img"><a href="#"><img src="/static/Home/images/mat_3.jpg" width="160" height="140" /></a></div>
                        <div class="name"><a href="#">香奈儿邂逅清新淡香水50ml</a></div>
                        <div class="price">
                            <div class="checkbox"><input type="checkbox" name="zuhe" checked="checked" /></div>
                            <font>￥<span>749.00</span></font> &nbsp; 18R
                        </div>
                    </div>
                    <div class="team_icon"><img src="/static/Home/images/equl.gif" /></div>
                    <div class="team_sum">
                        套餐价：￥<span>1517</span><br />
                        <input type="text" value="1" class="sum_ipt" /><br />
                        <a href="#"><img src="/static/Home/images/z_buy.gif" /></a>
                    </div>

                </div>
                <div class="des_border">
                    <div class="des_tit">
                        <ul>
                            <li class="current"><a href="#p_attribute">商品属性</a></li>
                            <li><a href="#p_details">商品详情</a></li>
                            <li><a href="#p_comment">商品评论</a></li>
                        </ul>
                    </div>
                    <div class="des_con" id="p_attribute">

                        <table border="0" align="center" style="width:100%; font-family:'宋体'; margin:10px auto;" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>商品名称：{{$product->name}}</td>
                            </tr>
                            @foreach($info as $value)
                            <tr>
                                <td>{{$value->name}}:{{$value->detail}}</td>
                            </tr>
                            @endforeach
                        </table>


                    </div>
                </div>

                <div class="des_border" id="p_details">
                    <div class="des_t">商品详情</div>
                    <div class="des_con">
                        <table border="0" align="center" style="width:745px; font-size:14px; font-family:'宋体';" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="265"><img src="/static/Public/images/{{$product->main_img}}" width="206" height="412" /></td>
                                <td>
                                    <b>{{$product->name}}</b><br />
                                    @foreach($info as $value)
                                    【{{$value->name}}】：{{$value->detail}}<br />
                                    @endforeach
                                </td>
                            </tr>
                        </table>

                        <p align="center">
                            @foreach($images as $value)
                            <img src="/static/Public/images/{{$value->url}}" width="746" height="425" /><br /><br />
                            @endforeach
                        </p>

                    </div>
                </div>

                <div class="des_border" id="p_comment">
                    <div class="des_t">商品评论</div>

                    <table border="0" class="jud_tab" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="175" class="jud_per">
                                <p>80.0%</p>好评度
                            </td>
                            <td width="300">
                                <table border="0" style="width:100%;" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="90">好评<font color="#999999">（80%）</font></td>
                                        <td><img src="/static/Home/images/pl.gif" align="absmiddle" /></td>
                                    </tr>
                                    <tr>
                                        <td>中评<font color="#999999">（20%）</font></td>
                                        <td><img src="/static/Home/images/pl.gif" align="absmiddle" /></td>
                                    </tr>
                                    <tr>
                                        <td>差评<font color="#999999">（0%）</font></td>
                                        <td><img src="/static/Home/images/pl.gif" align="absmiddle" /></td>
                                    </tr>
                                </table>
                            </td>
                            <td width="185" class="jud_bg">
                                购买过雅诗兰黛第六代特润精华露50ml的顾客，在收到商品才可以对该商品发表评论
                            </td>
                            <td class="jud_bg">您可对已购买商品进行评价<br /><a href="#"><img src="/static/Home/images/btn_jud.gif" /></a></td>
                        </tr>
                    </table>


                    <table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
                        @foreach ($com as $row)
                            <tr valign="top">
                                <td width="160"><img src="/static/Home/images/peo1.jpg" width="20" height="20" align="absmiddle" />&nbsp;{{$row->uname}}</td>
                                <td>
                                    {{$row->content}}<br />
                                    <font color="#999999">{{$row->time}}</font>
                                </td>
                            </tr>
                        @endforeach
                    </table>


                    <div class="pages">
                        <a href="#" class="p_pre">上一页</a><a href="#" class="cur">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">20</a><a href="#" class="p_pre">下一页</a>
                    </div>

                </div>


            </div>
        </div>


        <!--Begin 弹出层-收藏成功 Begin-->
        <div id="fade" class="black_overlay"></div>
        <div id="MyDiv" class="white_content">
            <div class="white_d">
                <div class="notice_t">
                    <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="/static/Home/images/close.gif" /></span>
                </div>
                <div class="notice_c">

                    <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td width="40"><img src="/static/Home/images/suc.png" /></td>
                            <td>
                                <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">您已成功收藏该商品</span><br />
                                <a href="#">查看我的关注 >></a>
                            </td>
                        </tr>
                        <tr height="50" valign="bottom">
                            <td>&nbsp;</td>
                            <td><a href="#" class="b_sure">确定</a></td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        <!--End 弹出层-收藏成功 End-->


        <!--Begin 弹出层-加入购物车 Begin-->
        <div id="fade1" class="black_overlay"></div>
        <div id="MyDiv1" class="white_content">
            <div class="white_d">
                <div class="notice_t">
                    <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv_1('MyDiv1','fade1')"><img src="/static/Home/images/close.gif" /></span>
                </div>
                <div class="notice_c">

                    <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td width="40"><img src="/static/Home/images/suc.png" /></td>
                            <td>
                                <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">宝贝已成功添加到购物车</span><br />
                            </td>
                        </tr>
                        <tr height="50" valign="bottom">
                            <td>&nbsp;</td>
                            <td><a href="/shoppingcart" class="b_sure">去购物车结算</a>
                                <span onclick="CloseDiv_1('MyDiv1','fade1')"><a href="#" class="b_buy">继续购物</a></span>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        <!--End 弹出层-加入购物车 End-->

        <!--Begin 弹出层-加入购物车 Begin-->
        <div id="fade2" class="black_overlay"></div>
        <div id="MyDiv2" class="white_content">
            <div class="white_d">
                <div class="notice_t">
                    <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv_1('MyDiv1','fade1')"><img src="/static/Home/images/close.gif" /></span>
                </div>
                <div class="notice_c">

                    <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td width="40"><img src="/static/Home/images/suc.png" /></td>
                            <td>
                                <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">添加到购物车失败</span><br />
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        <!--End 弹出层-加入购物车 End-->



@endsection