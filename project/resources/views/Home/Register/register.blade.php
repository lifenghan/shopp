<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="/static/Home/css/style.css" />
    <!--[if IE 6]>
    <script src="/static/Home/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="/static/Home/js/jquery-1.11.1.min_044d0927.js"></script>
	<script type="text/javascript" src="/static/Home/js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="/static/Home/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/static/Home/js/menu.js"></script>    
        
	<script type="text/javascript" src="/static/Home/js/select.js"></script>
    
	<script type="text/javascript" src="/static/Home/js/lrscroll.js"></script>
    
    <script type="text/javascript" src="/static/Home/js/iban.js"></script>
    <script type="text/javascript" src="/static/Home/js/fban.js"></script>
    <script type="text/javascript" src="/static/Home/js/f_ban.js"></script>
    <script type="text/javascript" src="/static/Home/js/mban.js"></script>
    <script type="text/javascript" src="/static/Home/js/bban.js"></script>
    <script type="text/javascript" src="/static/Home/js/hban.js"></script>
    <script type="text/javascript" src="/static/Home/js/tban.js"></script>
    
	<script type="text/javascript" src="/static/Home/js/lrscroll_1.js"></script>
    
    
<title>尤洪</title>
</head>
<style type="text/css">
    .cur{
      border:1px solid red;
    }

     .curs{
      border:1px solid green;
    }
  </style>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
	<div class="sou">
        <span class="fr">

        	
        	<span class="fl">
            请登录
            &nbsp; <a href="Regist.html" style="color:#ff4e00;">免费注册</a>&nbsp; </span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/static/Home/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<!--End Header End--> 
<!--Begin Login Begin-->
<div class="log_bg">	
    <div class="top">
        <div class="logo"><a href="Index.html"><img src="/static/Home/images/logo.png" /></a></div>
    </div>
	<div class="regist">
    	<div class="log_img"><img src="/static/Home/images/l_img.png" width="611" height="425" /></div>
		<div class="reg_c">
        	<form action="/homeregister" method="post" id="ff">
            @if(session('error'))
            {{session('error')}}
            @elseif(session('success'))
            {{session('success')}}
            @endif
            <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
            	 @if (count($errors) > 0)
				    <!-- <div class="alert alert-danger"> -->
				        <!-- <ul> -->
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
              				
				        <!-- </ul> -->
				    <!-- </div> -->
				    @endif
              <tr height="50" valign="top">
              	<td width="95">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:24px;">注册</span>
                    <span class="fr">已有商城账号，<a href="/homelogin" style="color:#ff4e00;">我要登录</a></span>
                </td>
              </tr>
 <!--              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;用户名 &nbsp;</td>
                <td><input type="text" value="" class="l_user ll" name="username"reminder="请输入用户名"><span></span></td>
              </tr> -->
               <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;手机 &nbsp;</td>
                <td><input type="text" value="" placeholder="请输入手机号" class="l_tel ll" name="phone" id="phone" reminder="请输入正确的手机号" /><span></span></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
                <td><input type="password" value="" class="l_pwd ll" name="password" id="password" placeholder="设置密码" reminder="请输入正确的密码"><span></span></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
                <td><input type="password" value="" class="l_pwd ll" name="repassword" id="repassword" placeholder="确认密码"reminder="请再次重复密码"><span></span></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;邮箱 &nbsp;</td>
                <td><input type="text" value="" class="l_email ll" name="email" placeholder="请输入邮箱账号" reminder="请输入邮箱"><span></span></td>
              </tr>
             <!--  <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;手机 &nbsp;</td>
                <td><input type="text" value="" placeholder="请输入手机号" class="l_tel ll" name="phone" id="phone" reminder="请输入正确的手机号" /><span></span></td>
              </tr> -->
              <tr height="50">
                <td align="right"> <font color="#ff4e00">*</font>&nbsp;手机验证码 &nbsp;</td>
                <td>
                     <a  href="javascript:void(0);"class="btn btn-info" style="float:right" id="ss">获取</a>
                    <input type="text" value="" class="l_ipt ll" name="code" placeholder="请输入验证码" reminder="请输入验证码"><span></span>
                </td>
              </tr>
              <tr height="50">
                <td align="right"> <font color="#ff4e00">*</font>&nbsp;校验码 &nbsp;</td>
                <td>
                    <input type="text" value="" class="l_ipt ll" name="code1" placeholder="请输入验证码"reminder="请输入校验码"><span></span>
                    <img src="/code" onclick="this.src=this.src+'?a=1'" style="float:right">
                </td>
              </tr>
              <tr height="60">
              	<td>&nbsp;</td>
              	{{csrf_field()}}
                <td><input type="submit" value="立即注册" class="log_btn" /></td>
              </tr>

            </table>
            </form>
        </div>
    </div>
</div>
<!--End Login End--> 
<!--Begin Footer Begin-->
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
        <img src="/static/Home/images/b_1.gif" width="98" height="33" /><img src="/static/Home/images/b_2.gif" width="98" height="33" /><img src="/static/Home/images/b_3.gif" width="98" height="33" /><img src="/static/Home/images/b_4.gif" width="98" height="33" /><img src="/static/Home/images/b_5.gif" width="98" height="33" /><img src="/static/Home/images/b_6.gif" width="98" height="33" />
    </div>    	
</div>
<!--End Footer End -->    

</body>
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
$("input[name='username']").blur(function(){

  aa=$(this);
  bb=aa.val();
  //获取用户名
  username=$(this).val();
  // alert(username);
  if(username.match(/\w{6,18}/)==null){
    $(this).next("span").css("color","red").html("用户名不能小于6位或不能为空");
    $(this).addClass("cur");
    PHONES=false;
  }else{
    //ajax判断用户名是否已经被注册
    $.get("/checkname",{bb:username},function(data){
      // alert(data);      
      if(data==1){
        aa.next("span").css("color","red").html("用户名已经被注册");
        aa.addClass("cur");
        PHONES=false;
      }else{
        aa.next("span").css("color","green").html("用户名可用");
        aa.addClass("curs");
        PHONES=true;
      }
    });

  }
});

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

//确认密码校验
$("input[name='repassword']").blur(function(){
  ee=$(this);
  rr=ee.val();
  //获取确认密码
  rpwd=$(this).val();
  //密码
  if(!ww==rpwd){
    $(this).next("span").css("color","red").html("两次输入密码不一致");
    $(this).addClass("cur");
    PHONES=false;
  }else{
    ee.next("span").css("color","green").html("确认密码成功");
    ee.addClass("curs");
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

  //获取手机验证码
  $("#ss").click(function(){
    oo=$(this);
    //获取手机号
    pp=$("input[name='phone']").val();
    //ajax
    $.get("/sendphone",{pp:pp},function(data){
      // alert(data.code);
      if(data.code==000000){
        m=60;
        mytime=setInterval(function(){
          m--;
          //赋值
          oo.html(m);
          oo.attr("disabled","true");
          //判断
          if(m<0){
            //清除
            clearInterval(mytime);
            oo.html("获取");
            oo.attr("disabled",false);
          }
        },1000);
      }
    },'json');
  });

  //手机验证输入框
  $("input[name='code']").blur(function(){
    cc=$(this);
    //获取输入的验证码
    code=$(this).val();
    //ajax
    $.get("/checkcode",{code:code},function(data){
      if(data==1){
        cc.next("span").css("color","green").html("验证码正确");
        cc.addClass("curs");
        CODE=true;
      }else if(data==2){
        cc.next("span").css("color","red").html("验证码有误");
        cc.addClass("cur");
        CODE=false;
      }else if(data==3){
        cc.next("span").css("color","red").html("验证码为空");
        cc.addClass("cur");
        CODE=false;
      }else{
        cc.next("span").css("color","red").html("验证码过期");
        cc.addClass("cur");
        CODE=false;
      }
    });
  });


  //校验码检测
  $("input[name='code1']").blur(function(){
    ss=$(this);
    //获取输入的验证码
    code1=$(this).val();
    //ajax
    $.get("/checkcode1",{code1:code1},function(data){
      if(data==1){
        ss.next("span").css("color","green").html("校验码正确");
        ss.addClass("curs");
        CODE=true;
      }else if(data==2){
        ss.next("span").css("color","red").html("校验码有误");
        ss.addClass("cur");
        CODE=false;
      }else if(data==3){
        ss.next("span").css("color","red").html("校验码为空");
        ss.addClass("cur");
        CODE=false;
      }else{
        ss.next("span").css("color","red").html("校验码过期");
        ss.addClass("cur");
        CODE=false;
      }
      // alert(data);
    });
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
</html>
