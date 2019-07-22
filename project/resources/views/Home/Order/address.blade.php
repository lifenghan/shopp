@extends("Home.Public.public")
@section("main")

    <div class="i_bg">
        <div class="content mar_20">
            <img src="/static/Home/images/img2.jpg" />
        </div>

        <!--Begin 第二步：确认订单信息 Begin -->
        <div class="content mar_20">
            @foreach($address as $value)
            <div class="two_bg">
                <div class="two_t">
                    <span class="fr"><a class="default" id="{{$value->id}}" >改为默认</a></span>收货人信息
                </div>
                <table border="0" class="peo_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="p_td" width="160">名称</td>
                        <td class="lll" width="395">{{$value->name}}</td>
                        <td class="p_td" width="160">电子邮件</td>
                        <td width="395">{{session("username")->email}}</td>
                    </tr>
                    <tr>
                        <td class="p_td">地址</td>
                        <td>{{$value->huo}}</td>
                        <td class="p_td">详细地址</td>
                        <td>{{$value->city}}</td>
                    </tr>
                    <tr>
                        <td class="p_td">电话</td>
                        <td></td>
                        <td class="p_td">手机</td>
                        <td>{{$value->phone}}</td>
                    </tr>
                </table>
            </div>
            @endforeach
        </div>
        <script>
            $(".two_bg").each(function () {
                $(this).find(".default").click(function () {
                   var id = $(this).attr("id");
                    $.get("/orderaddress",{id:id},function (data) {
                        if(data == 1){
                        self.location=document.referrer
                        }
                    })
                });
            })
        </script>
        <!--End 第二步：确认订单信息 End-->
        @endsection

