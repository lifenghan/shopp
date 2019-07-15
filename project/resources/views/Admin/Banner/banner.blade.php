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
                @foreach($data as $value)
                    @if(empty($value->delete_time))
                        <tr >
                            <td class="table-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        {{$i++}}
                                    </font></font></td>
                            <td class="table-info">
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        @foreach($image as $val)
                                            @if($val->id == $value->img_id)
                                        <img src="/static/Public/images/{{$val->url}}" style="width:100px;height:100px;border-radius:0;" alt="">
                                            @endif
                                        @endforeach
                                    </font></font>
                            </td>

                            <td class="table-warning">
                                <div class="ckbx-style-13">
                                    <input type="checkbox" id="ckbx-style-13-{{$a}}"  id1="{{$value->id}}"   @if($value->status ==1) checked @endif >
                                    <label for="ckbx-style-13-{{$a++}}"></label>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(":checkbox").click(function(){
            id = $(this).attr("id1");
            if($(this).prop("checked")){
                //置顶
                $.get("/bannertop1",{id},function (data) {
                    if(data ==1){

                        alert("已置顶");
                    }else{
                        alert("失败")
                    }
                })
            }else{
                //取消置顶
                $.get("/bannernotop",{id},function (data) {
                    if(data == 1){
                        alert("已取消置顶")
                    }else{
                        alert("失败")
                    }
                })
            }
        });
    </script>
@endsection