@extends("Home.Public.personal")
@section("title","新增收货地址")
@section("main")
		<div class="m_right">
            <form action="/personaladdress" method="post">
            	<div class="address">
            <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
              <tr>
                <td width="135" align="right">配送地区</td>
                <td colspan="3" style="font-family:'宋体';">
                  <select id="cid" style="background-color:#f6f6f6;">
                      <option value="" class="ss">请选择...</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td align="right">收货人姓名</td>
                <td style="font-family:'宋体';"><input type="text" value="" class="add_ipt" name="name" />（必填）</td>
              </tr>
              <tr>
                <td align="right">详细地址</td>
                <td style="font-family:'宋体';"><input type="text" value="" class="add_ipt" name="huo" />（必填）</td>
              </tr>
              <tr>
                <td align="right">电话</td>
                <td style="font-family:'宋体';"><input type="text" value="" class="add_ipt" name="phone" /></td>
              </tr>
            </table>
             <input type="hidden" name="city" value="">
             <input type="hidden" name="default" value="0">
            {{csrf_field()}}
            <p align="right">
              &nbsp; &nbsp; <a href="#" class="add_b">取消</a><button type="submit" class="add_b" id="buttonid">确认添加</button>
            </p>           
           </form>
       		</div>
        </div>    
<script type="text/javascript">

  //第一级数据
    $.ajax({
      url:'/address',//url地址
      type:'get',//请求方式
      data:{upid:0},
      async:true,//异步处理
      dataType:'json',//返回响应数据类型
      //Ajax 响应成功匿名函数
      success:
      function(data){
        // alert(data);
        //遍历
        for(var i=0;i<data.length;i++){
          $(".ss").attr("disabled",true);
          // alert(data[i].name);
          //存储在option
          option='<option value="'+data[i].id+'">'+data[i].name+'</option>';
          // alert(option);
          //把带有数据的option内部插入到第一个select
          $("#cid").append(option);
        }
      },
      //Ajax 响应失败的匿名函数
      error:
      function(){
        alert("Ajax响应失败1");
      }
    });

    //获取其他几级数据 
    //事件委派 live(事件,事件处理器函数)
    $("select").live("change",function(){
      //移除元素
      $(this).nextAll("select").remove();
      // alert($(this).val());
      o=$(this);
      //获取子级的upid
      upid=$(this).val();
      // alert(upid);
      $.ajax({
      url:'/address',//url地址
      type:'get',//请求方式
      data:{upid:upid},
      async:true,//异步处理
      dataType:'json',//返回响应数据类型
      //Ajax 响应成功匿名函数
      success:
      function(data){
        //创建select
        select=$("<select></select>");
        //内部插入option
        select.append('<option value="" class="mm">--请选择--</option>');
        // alert(data);
        //判断
        if(data.length>0){
          //遍历
          for(var i=0;i<data.length;i++){
            // alert(data[i].name);
            //存储在option
            option='<option value="'+data[i].id+'">'+data[i].name+'</option>';
            // alert(option);
            // 把带有数据的option内部插入到创建好的select
            select.append(option);
          }
          //把创建好的select 追加到前一个select后
          o.after(select);
          //禁用其他级别 请选择
          $(".mm").attr("disabled",true);
        }

      },
      //Ajax 响应失败的匿名函数
      error:
      function(){
        alert("Ajax响应失败");
      }
    });
    });

     arr=[];
     //获取选中的收货地址 赋值给隐藏域
    $("#buttonid").click(function(){
      // alert('id');
      // 遍历
      $("select").each(function(){
        v=$(this).find("option:selected").html();
        // alert(v);
        arr.push(v);
      });
      // alert(arr);
      //给隐藏域赋值
      $("input[name='city']").val(arr);

    });

</script>
@endsection