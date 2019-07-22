@extends("Home.Public.public")
@section("main")
    <div class="i_bg">
        <div class="postion">
            <span class="fl">{{$cate->name}}</span>
{{--            <span class="n_ch">--}}
{{--            <span class="fl">品牌：<font>香奈儿</font></span>--}}
{{--            <a href="#"><img src="/static/Home/images/s_close.gif" /></a>--}}
{{--        </span>--}}
        </div>
        <!--Begin 筛选条件 Begin-->
        <div class="content mar_10">
            <table border="0" class="choice" style="width:100%; font-family:'宋体'; margin:0 auto;" cellspacing="0" cellpadding="0">
                <tr valign="top">
                    <td width="70">&nbsp; 品牌：</td>
                    <td class="td_a"><a href="#" class="now">香奈儿（Chanel）</a></td>
                </tr>
                <tr valign="top">
                    <td>&nbsp; 价格：</td>
                    <td class="td_a"><a href="#">0-199</a><a href="#" class="now">200-399</a><a href="#">400-599</a><a href="#">600-899</a><a href="#">900-1299</a><a href="#">1300-1399</a><a href="#">1400以上</a></td>
                </tr>
                <tr>
                    <td>&nbsp; 类型：</td>
                    <td class="td_a">
                        @foreach($cates as $value)
                        <a href="/homecates/{{$value->id}}">{{$value->name}}</a>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>&nbsp; 香型：</td>
                    <td class="td_a"><a href="#">浓香水</a><a href="#">香精Parfum香水</a><a href="#">淡香精EDP淡香水</a><a href="#">香露EDT</a><a href="#">古龙水</a><a href="#">其它</a></td>
                </tr>
            </table>
        </div>
        <!--End 筛选条件 End-->

        <div class="content mar_20">
            <div class="l_history">
                <div class="his_t">
                    <span class="fl">浏览历史</span>
                    <span class="fr"><a href="#">清空</a></span>
                </div>
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
                <div class="list_t">
            	<span class="fl list_or">
                	<a href="#" class="now">默认</a>
                    <a href="#">
                    	<span class="fl">销量</span>
                        <span class="i_up">销量从低到高显示</span>
                        <span class="i_down">销量从高到低显示</span>
                    </a>
                    <a href="#">
                    	<span class="fl">价格</span>
                        <span class="i_up">价格从低到高显示</span>
                        <span class="i_down">价格从高到低显示</span>
                    </a>
                    <a href="#">新品</a>
                </span>
                    <span class="fr">共发现{{count($product)}}件</span>
                </div>
                <div class="list_c">

                    <ul class="cate_list">
                        @foreach($product as $value)
                            @if(in_array($value->cates_id,$arr))
                        <li>
                            <div class="img"><a href="/homeproduct/{{$value->id}}"><img src="/static/Public/images/{{$value->main_img}}" width="210" height="185" /></a></div>
                            <div class="price">
                                <font>￥<span>{{$value->price}}</span></font> &nbsp; 26R
                            </div>
                            <div class="name"><a href="#">{{$value->name}}</a></div>
                            <div class="carbg">
                                <a href="#" class="ss">收藏</a>
                                <a href="#" class="j_car">加入购物车</a>
                            </div>
                        </li>
                            @endif
                        @endforeach
                    </ul>

                    <div class="pages">
                        <a href="#" class="p_pre">上一页</a><a href="#" class="cur">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">20</a><a href="#" class="p_pre">下一页</a>
                    </div>
                </div>
            </div>
        </div>
@endsection