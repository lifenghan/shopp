@extends("Admin.AdminPublic.public")
@section("title","分类显示")
@section("main")
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="float: left;">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">图片详情</font>
                </font>
            </h4>
            <div style="clear:both"></div>
            <table class="table table-bordered">
                <tbody>
                <tr >
                    <td class="table-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                编号
                            </font></font></td>
                    <td class="table-info">
                        图片
                    </td>
                    <td class="table-warning">
                        是否置顶
                    </td>
                </tr>
                @foreach($image as $value)
                    @if(empty($value->delete_time))
                <tr >
                    <td class="table-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                               {{$i++}}
                            </font></font></td>
                    <td class="table-info">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <img src="/static/Public/images/{{$value->url}}" style="width:100px;height:100px;border-radius:0;" alt="">
                            </font></font>
                    </td>

                    <td class="table-warning">
                        <button type="button" class="btn btn-gradient-info btn-sm tianjia" id1="{{$value->id}}" @if(in_array($value->id,$imgid)) disabled @endif>
                            <i class="mdi mdi-wrench"></i>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    @if(in_array($value->id,$imgid)) 已添加@else 添加 @endif
                                </font>
                            </font>
                        </button>
                    </td>
                </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(".tianjia").click(function(){
            img_id = $(this).attr("id1");//图片id
            banner_id = {{$bid}};//轮播图id
            type = {{$cid}};//商品主级id
            pid = {{$pid}}//商品id
                //添加
                $.get("/bannertop",{img_id,banner_id,type,pid},function (data) {
                        if(data ==1){
                            $(this).attr("disabled",true)
                            alert("已添加");
                        }else{
                            alert("失败")
                        }
                })
        });
    </script>
@endsection