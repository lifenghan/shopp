@extends("Home.Public.personal")
@section("title","会员信息")
@section("main")
    <div class="m_right">
            <!--头像上传-->
            <form action="/personal/{{$aa->id}}" method="post" enctype="multipart/form-data">
          <div class="m_des">
              <table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="115"><img src="/statigc/Public/images/{{$aa->face}}" width="90" height="90" /></td>
                    <td>

                      <div class="m_user">{{session('username')->username}}</div>
                        <p>
                            等级：普通会员 <br />

                           <!--  <font color="#ff4e00">您还差 270 积分达到 分红100</font><br />
                            上一次登录时间: 2015-09-28 18:19:47<br />
                            您还没有通过邮件认证 <a href="#" style="color:#ff4e00;">点此发送认证邮件</a> -->
                        </p>
                        <input type="file" name="face" />
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <button type="submit">修改</button>
                        <div class="m_notice">
                          用户中心公告！
                        </div>

                    </td>
                  </tr>
                </table>  
            </div>
            </form>
            <!--end  face-->





            <div class="mem_t">资产信息</div>
            <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="33%">用户等级：<span style="color:#555555;">普通会员</span></td>
                <td width="33%">消费金额：<span>￥200元</span></td>
                <td width="33%">返还积分：<span>99R</span></td>
              </tr>
              <tr>
                <td>账户余额：<span>￥200元</span></td></td>
                <td>红包个数：<span style="color:#555555;">3个</span></td></td>
                <td>红包价值：<span>￥50元</span></td></td>
              </tr>
              <tr>
                <td colspan="3">订单提醒：
                  <font style="font-family:'宋体';">待付款(<span>0</span>) &nbsp; &nbsp; &nbsp; &nbsp; 待收货(<span>2</span>) &nbsp; &nbsp; &nbsp; &nbsp; 待评论(<span>1</span>)</font>
                </td>
              </tr>
            </table>
      <form action="/personal" method="post" id="ff">
            <div class="mem_t">账号信息</div>
            
            <table border="0" class="acc_tab" style="width:870px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="td_l">用户姓名： </td>
                <td><input type="text" value="{{$aa->username}}" class="lls" name="username"reminder="请输入用户名"><span></span></td>
              </tr>
                <tr>
                <td class="td_l b_none">密  码：</td>
                <td><input type="password" value="******" class="ll" name="password" id="password" placeholder="设置密码" reminder="请输入正确的密码"><span></span></td>
              </tr>
              <tr>
                <td class="td_l b_none">手  机：</td>
                <td><input type="text" value="{{$aa->phone}}" placeholder="请输入手机号" class="ll" name="phone" id="phone" reminder="请输入正确的手机号" /><span></span></td>
              </tr>
              <tr>
                <td class="td_l">邮   箱： </td>
                <td><input type="text" value="{{$aa->email}}" class="ll" name="email" placeholder="请输入邮箱账号" reminder="请输入邮箱"><span></span></td>
              </tr>
              <tr>
                <td class="td_l b_none">注册时间：</td>
                <td>{{session('username')->created_at}}</td>
              </tr>
              <tr>
                <td class="td_l">完成订单：</td>
                <td>0</td>
              </tr>
              <tr>
                {{csrf_field()}}
                <td><button type="submit">修改</button></td>
                <td><button type="submit">取消</button></td>
              </tr>
            </table>
      </form>  

<script type="text/javascript">
    //获取焦点做校验
  $(".ll").focus(function(){

    //获取reminder
    // alert $(this);
    reminder=$(this).attr("reminder");
    //直接给下一个span元素赋值
    $(this).next("span").css("color","red").html(reminder);
    //addClass 添加样式
    $(this).addClass("cur");
  });

//用户名校验
// $("input[name='username']").blur(function(){

//   aa=$(this);
//   bb=aa.val();
//   //获取用户名
//   username=$(this).val();
//   // alert(username);
//   if(username.match(/\w{6,18}/)==null){
//     $(this).next("span").css("color","red").html("用户名不能小于6位或不能为空");
//     $(this).addClass("cur");
//     PHONES=false;
//   }else{
//     //ajax判断用户名是否已经被注册
//     $.get("/checkname",{bb:username},function(data){
//       // alert(data);      
//       if(data==1){
//         aa.next("span").css("color","red").html("用户名已经被注册");
//         aa.addClass("cur");
//         PHONES=false;
//       }else{
//         aa.next("span").css("color","green").html("用户名可用");
//         aa.addClass("curs");
//         PHONES=true;
//       }
//     });

//   }
// });

//密码校验
$("input[name='password']").blur(function(){
  qq=$(this);
  ww=qq.val();
  //获取密码
  password=$(this).val();
  // alert(password);
  if(password.match(/\w{6,18}/)==null){
    $(this).next("span").css("color","red").html("密码不能小于6位或不能为空");
    $(this).addClass("cur");
    PHONES=false;
  }else{
    qq.next("span").css("color","green").html("密码符合规则");
    qq.addClass("curs");
    PHONES=true;
  }
});


//邮箱验证
$("input[name='email']").blur(function(){
  yy=$(this);
  uu=yy.val();
  //获取邮箱
  email=$(this).val();
  if(email.match(/[\w!#$%&'*+/=?^_`{|}~-]+(?:\.[\w!#$%&'*+/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?/)==null){
    $(this).next("span").css("color","red").html("邮箱不符合规则或为空");
    $(this).addClass("cur");
    PHONES=false;
  }else{
    //ajax判断邮箱是否已经被注册
    $.get("/checkemail",{uu:email},function(data){

      if(data==1){
        yy.next("span").css("color","red").html("邮箱地址已经被注册");
        yy.addClass("cur");
        PHONES=false;
      }else{
        yy.next("span").css("color","green").html("邮箱地址可以使用");
        yy.addClass("curs");
        PHONES=true;
      }

    });
  }

});


//手机号校验
$("input[name='phone']").blur(function(){
  //获取手机号
  phone=$(this).val();
  ob=$(this);
  p=ob.val();
  //检测是否符合正则规则 match没有匹配到正则返回值为null
  if(phone.match(/^\d{11}$/)==null){
    // alert("手机号不符合规则");
    $(this).next("span").css("color","red").html("手机号不合法");
    $(this).addClass("cur");
    PHONES=false;
  }else{
    // alert("ok");
    //Ajax 判断手机号是否已经被注册
    $.get("/checkphone",{p:p},function(data){
      if(data==1){
        ob.next("span").css("color","red").html("手机号已经被注册");
        ob.addClass("cur");
        //禁用获取按钮
        $("#ss").attr("disabled",true);
        PHONES=false;
      }else{
        ob.next("span").css("color","green").html("手机号可用");
        ob.addClass("curs");
        //把获取的按钮启用
        $("#ss").attr("disabled",false);
        PHONES=true;
      }
    });
  }
});


  //表单提交或者阻止提交
$("#ff").submit(function(){
  //让元素触发失去焦点事件 trigger 让元素触发事件
  $("input").trigger("blur");
  if(PHONES && CODE){
    return true;
  }else{
    return false;
  }
});
</script>
@endsection