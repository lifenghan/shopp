@extends("Home.Public.public")
@section("title","友情链接")
@section("main")
<!-- <style type="text/css">
    .cur{
      border:1px solid red;
    }

     .curs{
      border:1px solid green;
    }
</style> -->



<div class="" align="center">
    <div class="mem_tit">
        友情链接申请
    </div>
    <form action="/friends" method="post" enctype="multipart/form-data">
        <table border="0" class="mem_tab" style="width:930px; margin-bottom:30px;" cellspacing="0" cellpadding="0">
          <tr>                                                         
            <td width="150" class="tx_l">链接名字</td>
            <td width="680"><input type="text" placeholder="网站名字" class="tx_ipt" name="name" /></td>
          </tr>
          <tr>
            <td class="tx_l">链接地址</td>
            <td><input type="text" placeholder="网站地址" class="tx_ipt" name="href" reminder="请输入正确的链接地址"/><span></span></td>
          </tr>
          <tr>
            <td class="tx_l">图片</td>
            <td><input type="file" name="img" placeholder="图片"><span></span></td>
          </tr>
          <tr>
            <td class="tx_l">链接备注</td>
            <td><input type="text" placeholder="填写备注" class="tx_ipt" name="miaoshu" /></td>
          </tr>
          @if(session("success"))
          <h1>{{session("success")}}</h1>
          @endif
          <tr height="70">
            <td colspan="2" align="center">
                {{csrf_field()}}
                <input type="submit" value="提交表单" class="btn_tj" />&nbsp;&nbsp;&nbsp;
                <a href="/home"><input type="text" class="btn_tj" value="返回首页"></a>
            </td>
          </tr>
        </table>
    </form>
</div>
<!-- <script type="text/javascript">
    $("input[name='href']").focus(function(){
        reminder = $(this).attr("reminder");
        $(this).next("span").css("color","red").html(reminder);
        //addClass 添加样式
        $(this).addClass("cur");
    })
</script> -->

@endsection