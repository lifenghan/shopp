@extends("Home.Public.personal")
@section("title","收货地址")
@section("main")
<style>
  .cur{
    border:1px solid red;
  }
</style>
<div class="m_right">
<div class="mem_tit"><a href="/personaladdress/create">新增收货地址</a></div>
 @foreach ($address as $row)
 @if($row->default ==1)
<div class="address cur">
@else
<div class="address">
@endif
              <div class="a_close"><a href="#"><img src="/static/Home/images/a_close.png"></a></div>
              <form action="/personaladdress/{{$row->id}}/edit" method="post">
              <table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                  </tr>
                  <tr>
                    <td align="right" width="80">收货人姓名：</td>
                    <td name="name" class="edit">{{$row->name}}</td>
                  </tr>
                  <tr>
                    <td align="right">收货人电话：</td>
                    <td name="phone" class="edit">{{$row->phone}}</td>
                  </tr>
                  <tr>
                    <td align="right">详细地址：</td>
                    <td name="huo" class="edit">{{$row->huo}}</td>
                  </tr>
                  <tr>
                    <td align="right">详细地址：</td>
                    <td name="city" class="edit">{{$row->city}}</td>
                  </tr>
                </tbody></table>
                
                <p align="right">
                @if($row->default ==1)
                <a href="javascript:;" style="color:#ff4e00;" uid="{{$row->id}}" class="default">已默认</a>
                @else
                <a href="javascript:;" style="color:#ff4e00;" uid="{{$row->id}}" class="default">设为默认</a>
                @endif
                 <!--  <a href="javascript:;" style="color:#ff4e00;" uid="{{$row->id}}" class="default">设为默认</a> -->
                  &nbsp; &nbsp; &nbsp; &nbsp; <a href="/personaladdress/{{$row->id}}/edit" style="color:#ff4e00;">修改</a>&nbsp; &nbsp; &nbsp; &nbsp; 
                </p>
              </form>
                <form action="/personaladdress/{{$row->id}}" method="post">
                    <button type="submit" style="color:black">删除</button>&nbsp; &nbsp; &nbsp; &nbsp;
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                  </form>              
            </div>
            @endforeach
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
        alert("Ajax响应失败");
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

 //选择收货地址
    $(".default").click(function(){
      //获取选中的收货地址id
      address_id=$(this).attr('uid');
      add = $(this);
      // alert(address_id);
      //Ajax
      $.get("/change",{address_id:address_id},function(data){
        // var last=JSON.stringify(data);
        // alert(last);
        if (data == 1) {
           add.parents('.address').addClass('cur');
           add.html('已默认');
         }
          location.href='';
      },'json');
    });
</script>
@endsection