@extends("Home.Public.public")
@section("nav")
    <div class="leftNav">
        <ul>
            @foreach($cates as $value)
                <li>
                    <div class="fj">
                        <span class="n_img"><span></span><img src="/static/Home/images/nav1.png" /></span>
                        <span class="fl">{{$value->name}}</span>
                    </div>
                    @if(count($value->suv))
                        <div class="zj">
                            <div class="zj_l">
                                @foreach($value->suv as $val)
                                    <div class="zj_l_c">
                                        <h2>{{$val->name}}</h2>
                                        @foreach($val->suv as $v)
                                            <a href="/homecates/{{$v->id}}">{{$v->name}}</a>|
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            <div class="zj_r">
                                <a href="#"><img src="/static/Home/images/n_img1.jpg" width="236" height="200" /></a>
                                <a href="#"><img src="/static/Home/images/n_img2.jpg" width="236" height="200" /></a>
                            </div>
                        </div>
                    @endif
                </li>
            @endforeach

        </ul>
    </div>
@endsection
@section("main")
    <!--End Menu End-->
    <div class="i_bg bg_color">
        <div class="i_ban_bg">
            <!--Begin Banner Begin-->
            <div class="banner">
                <div class="top_slide_wrap">
                    <ul class="slide_box bxslider">
                        @foreach($image as $value)
                            <a href="/homeproduct/{{$value->product_id}}"> <li><img src="/static/Public/images/{{$value->url}}" width="740" height="401" /></li></a>
                        @endforeach
                    </ul>
                    <div class="op_btns clearfix">
                        <a href="#" class="op_btn op_prev"><span></span></a>
                        <a href="#" class="op_btn op_next"><span></span></a>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                //var jq = jQuery.noConflict();
                (function(){
                    $(".bxslider").bxSlider({
                        auto:true,
                        prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
                    });
                })();
            </script>
            <!--End Banner End-->
            <div class="inews">
                <div class="news_t">
                    <span class="fr"><a href="#">更多 ></a></span>新闻资讯
                </div>
                <ul>
                    <li><span>[ 特惠 ]</span><a href="#">掬一轮明月 表无尽惦念</a></li>
                    <li><span>[ 公告 ]</span><a href="#">好奇金装成长裤新品上市</a></li>
                    <li><span>[ 特惠 ]</span><a href="#">大牌闪购 · 抢！</a></li>
                    <li><span>[ 公告 ]</span><a href="#">发福利 买车就抢千元油卡</a></li>
                    <li><span>[ 公告 ]</span><a href="#">家电低至五折</a></li>
                </ul>
                <div class="charge_t">
                    话费充值<div class="ch_t_icon"></div>
                </div>
                <form>
                    <table border="0" style="width:205px; margin-top:10px;" cellspacing="0" cellpadding="0">
                        <tr height="35">
                            <td width="33">号码</td>
                            <td><input type="text" value="" class="c_ipt" /></td>
                        </tr>
                        <tr height="35">
                            <td>面值</td>
                            <td>
                                <select class="jj" name="city">
                                    <option value="0" selected="selected">100元</option>
                                    <option value="1">50元</option>
                                    <option value="2">30元</option>
                                    <option value="3">20元</option>
                                    <option value="4">10元</option>
                                </select>
                                <span style="color:#ff4e00; font-size:14px;">￥99.5</span>
                            </td>
                        </tr>
                        <tr height="35">
                            <td colspan="2"><input type="submit" value="立即充值" class="c_btn" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <!--Begin 热门商品 Begin-->
        <div class="content mar_10">
            <div class="h_l_img">
                <div class="img"><img src="/static/Home/images/l_img.jpg" width="188" height="188" /></div>
                <div class="pri_bg">
                    <span class="price fl">￥53.00</span>
                    <span class="fr">16R</span>
                </div>
            </div>
            <div class="hot_pro">
                <div id="featureContainer">
                    <div id="feature">
                        <div id="block">
                            <div id="botton-scroll">
                                <ul class="featureUL">
                                    <li class="featureBox">
                                        <div class="box">
                                            <div class="h_icon"><img src="/static/Home/images/hot.png" width="50" height="50" /></div>
                                            <div class="imgbg">
                                                <a href="#"><img src="/static/Home/images/hot1.jpg" width="160" height="136" /></a>
                                            </div>
                                            <div class="name">
                                                <a href="#">
                                                    <h2>德国进口</h2>
                                                    德亚全脂纯牛奶200ml*48盒
                                                </a>
                                            </div>
                                            <div class="price">
                                                <font>￥<span>189</span></font> &nbsp; 26R
                                            </div>
                                        </div>
                                    </li>
                                    <li class="featureBox">
                                        <div class="box">
                                            <div class="h_icon"><img src="/static/Home/images/hot.png" width="50" height="50" /></div>
                                            <div class="imgbg">
                                                <a href="#"><img src="/static/Home/images/hot2.jpg" width="160" height="136" /></a>
                                            </div>
                                            <div class="name">
                                                <a href="#">
                                                    <h2>iphone 6S</h2>
                                                    Apple/苹果 iPhone 6s Plus公开版
                                                </a>
                                            </div>
                                            <div class="price">
                                                <font>￥<span>5288</span></font> &nbsp; 25R
                                            </div>
                                        </div>
                                    </li>
                                    <li class="featureBox">
                                        <div class="box">
                                            <div class="h_icon"><img src="/static/Home/images/hot.png" width="50" height="50" /></div>
                                            <div class="imgbg">
                                                <a href="#"><img src="/static/Home/images/hot3.jpg" width="160" height="136" /></a>
                                            </div>
                                            <div class="name">
                                                <a href="#">
                                                    <h2>倩碧特惠组合套装</h2>
                                                    倩碧补水组合套装8折促销
                                                </a>
                                            </div>
                                            <div class="price">
                                                <font>￥<span>368</span></font> &nbsp; 18R
                                            </div>
                                        </div>
                                    </li>
                                    <li class="featureBox">
                                        <div class="box">
                                            <div class="h_icon"><img src="/static/Home/images/hot.png" width="50" height="50" /></div>
                                            <div class="imgbg">
                                                <a href="#"><img src="/static/Home/images/hot4.jpg" width="160" height="136" /></a>
                                            </div>
                                            <div class="name">
                                                <a href="#">
                                                    <h2>品利特级橄榄油</h2>
                                                    750ml*4瓶装组合 西班牙原装进口
                                                </a>
                                            </div>
                                            <div class="price">
                                                <font>￥<span>280</span></font> &nbsp; 30R
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a class="h_prev" href="javascript:void();">Previous</a>
                        <a class="h_next" href="javascript:void();">Next</a>
                    </div>
                </div>
            </div>
        </div>
        <!--Begin 限时特卖 Begin-->
        <div class="i_t mar_10">
            <span class="fl">限时特卖</span>
            <span class="i_mores fr"><a href="#">更多</a></span>
        </div>
        <div class="content">
            <div class="i_sell">
                <div id="imgPlay">
                    <ul class="imgs" id="actor">
                        <li><a href="#"><img src="/static/Home/images/tm_r.jpg" width="211" height="357" /></a></li>
                        <li><a href="#"><img src="/static/Home/images/tm_r.jpg" width="211" height="357" /></a></li>
                        <li><a href="#"><img src="/static/Home/images/tm_r.jpg" width="211" height="357" /></a></li>
                    </ul>
                    <div class="previ">上一张</div>
                    <div class="nexti">下一张</div>
                </div>
            </div>
            <div class="sell_right">
                <div class="sell_1">
                    <div class="s_img"><a href="#"><img src="/static/Home/images/tm_1.jpg" width="185" height="155" /></a></div>
                    <div class="s_price">￥<span>89</span></div>
                    <div class="s_name">
                        <h2><a href="#">沙宣洗发水</a></h2>
                        倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                    </div>
                </div>
                <div class="sell_2">
                    <div class="s_img"><a href="#"><img src="/static/Home/images/tm_2.jpg" width="185" height="155" /></a></div>
                    <div class="s_price">￥<span>289</span></div>
                    <div class="s_name">
                        <h2><a href="#">德芙巧克力</a></h2>
                        倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                    </div>
                </div>
                <div class="sell_b1">
                    <div class="sb_img"><a href="#"><img src="/static/Home/images/tm_b1.jpg" width="242" height="356" /></a></div>
                    <div class="s_price">￥<span>289</span></div>
                    <div class="s_name">
                        <h2><a href="#">东北大米</a></h2>
                        倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                    </div>
                </div>
                <div class="sell_3">
                    <div class="s_img"><a href="#"><img src="/static/Home/images/tm_3.jpg" width="185" height="155" /></a></div>
                    <div class="s_price">￥<span>289</span></div>
                    <div class="s_name">
                        <h2><a href="#">迪奥香水</a></h2>
                        倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                    </div>
                </div>
                <div class="sell_4">
                    <div class="s_img"><a href="#"><img src="/static/Home/images/tm_4.jpg" width="185" height="155" /></a></div>
                    <div class="s_price">￥<span>289</span></div>
                    <div class="s_name">
                        <h2><a href="#">美妆</a></h2>
                        倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                    </div>
                </div>
                <div class="sell_b2">
                    <div class="sb_img"><a href="#"><img src="/static/Home/images/tm_b2.jpg" width="242" height="356" /></a></div>
                    <div class="s_price">￥<span>289</span></div>
                    <div class="s_name">
                        <h2><a href="#">美妆</a></h2>
                        倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                    </div>
                </div>
            </div>
        </div>
        <!--End 限时特卖 End-->

        <div class="content mar_20">
            <img src="/static/Home/images/mban_1.jpg" width="1200" height="110" />
        </div>
        <!--Begin 进口 生鲜 Begin-->
        @foreach($cates as $value)
            <div class="i_t mar_10">
                <span class="floor_num">{{$i++}}F</span>
                <span class="fl">{{$value->name}}</span>
            </div>
            <div class="content">
                <div class="fresh_left">
                    <div class="fre_ban">
                        <div id="imgPlay1">
                            <ul class="imgs" id="actor1">
                                @foreach($images as $val)
                                    @if($val->type == $value->id)
                                <li><a href="/homeproduct/{{$val->product_id}}"><img src="/static/Public/images/{{$val->url}}" width="211" height="286" /></a></li>
                                    @endif
                                @endforeach
                            </ul>
                            <div class="prevf">上一张</div>
                            <div class="nextf">下一张</div>
                        </div>
                    </div>
                    <div class="fresh_txt">
                        <div class="fresh_txt_c">
                            @foreach($value->suv as $val)
                                <a href="/homecate/{{$val->id}}">{{$val->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="fresh_mid">
                    <ul>
                        @foreach($product as $p)
                                @if($p->path['1'] == $value->id )
                        <li>
                            <div class="name"><a href="/homeproduct/{{$p->id}}">{{$p->name}}</a></div>
                            <div class="price">
                                <font>￥<span>{{$p->price}}</span></font> &nbsp; 26R
                            </div>
                            <div class="img"><a href="/homeproduct/{{$p->id}}"><img src="/static/Public/images/{{$p->main_img}}" width="185" height="155" /></a></div>
                        </li>
                                    @endif
                        @endforeach
                    </ul>
                </div>
                <div class="fresh_right">
                    <ul>
                        <li><a href="#"><img src="/static/Home/images/fre_b1.jpg" width="260" height="220" /></a></li>
                        <li><a href="#"><img src="/static/Home/images/fre_b2.jpg" width="260" height="220" /></a></li>
                    </ul>
                </div>
            </div>
    @endforeach
    <!--End 进口 生鲜 End-->

        <!--Begin 猜你喜欢 Begin-->
        <div class="i_t mar_10">
            <span class="fl">猜你喜欢</span>
        </div>
        <div class="like">
            <div id="featureContainer1">
                <div id="feature1">
                    <div id="block1">
                        <div id="botton-scroll1">
                            <ul class="featureUL">
                                <li class="featureBox">
                                    <div class="box">
                                        <div class="imgbg">
                                            <a href="#"><img src="/static/Home/images/hot1.jpg" width="160" height="136" /></a>
                                        </div>
                                        <div class="name">
                                            <a href="#">
                                                <h2>德国进口</h2>
                                                德亚全脂纯牛奶200ml*48盒
                                            </a>
                                        </div>
                                        <div class="price">
                                            <font>￥<span>189</span></font> &nbsp; 26R
                                        </div>
                                    </div>
                                </li>
                                <li class="featureBox">
                                    <div class="box">
                                        <div class="imgbg">
                                            <a href="#"><img src="/static/Home/images/hot2.jpg" width="160" height="136" /></a>
                                        </div>
                                        <div class="name">
                                            <a href="#">
                                                <h2>iphone 6S</h2>
                                                Apple/苹果 iPhone 6s Plus公开版
                                            </a>
                                        </div>
                                        <div class="price">
                                            <font>￥<span>5288</span></font> &nbsp; 25R
                                        </div>
                                    </div>
                                </li>
                                <li class="featureBox">
                                    <div class="box">
                                        <div class="imgbg">
                                            <a href="#"><img src="/static/Home/images/hot3.jpg" width="160" height="136" /></a>
                                        </div>
                                        <div class="name">
                                            <a href="#">
                                                <h2>倩碧特惠组合套装</h2>
                                                倩碧补水组合套装8折促销
                                            </a>
                                        </div>
                                        <div class="price">
                                            <font>￥<span>368</span></font> &nbsp; 18R
                                        </div>
                                    </div>
                                </li>
                                <li class="featureBox">
                                    <div class="box">
                                        <div class="imgbg">
                                            <a href="#"><img src="/static/Home/images/hot4.jpg" width="160" height="136" /></a>
                                        </div>
                                        <div class="name">
                                            <a href="#">
                                                <h2>品利特级橄榄油</h2>
                                                750ml*4瓶装组合 西班牙原装进口
                                            </a>
                                        </div>
                                        <div class="price">
                                            <font>￥<span>280</span></font> &nbsp; 30R
                                        </div>
                                    </div>
                                </li>
                                <li class="featureBox">
                                    <div class="box">
                                        <div class="imgbg">
                                            <a href="#"><img src="/static/Home/images/hot4.jpg" width="160" height="136" /></a>
                                        </div>
                                        <div class="name">
                                            <a href="#">
                                                <h2>品利特级橄榄油</h2>
                                                750ml*4瓶装组合 西班牙原装进口
                                            </a>
                                        </div>
                                        <div class="price">
                                            <font>￥<span>280</span></font> &nbsp; 30R
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a class="l_prev" href="javascript:void();">Previous</a>
                    <a class="l_next" href="javascript:void();">Next</a>
                </div>
            </div>
        </div>
        <!--End 猜你喜欢 End-->
@endsection