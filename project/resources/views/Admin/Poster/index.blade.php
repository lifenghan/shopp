@extends("Admin.AdminPublic.public")
@section("title","广告管理")
@section("main")
<style type="text/css">
    #box {
        /* 父容器设置宽度, 并超出部分不显示 */
        width: 350px;
        height: 170px;
        overflow: hidden;
    }
    #box > div {
        /* 子容器比父容器的宽度多 17 px, 经测正好是滚动条的默认宽度 */
        width: 367px;
        height: 170px;
        line-height: 30px;
        text-align: center;
        overflow-y: scroll;
    }
</style>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="float: left;">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">广告显示</font>
                </font>
            </h4>
            <div style="clear:both"></div>
            <table class="table table-bordered">
                <thead>
                <tr class="table-success">
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                PID
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                图片
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                操作
                            </font></font></th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $value)
                <tr class="table-info">
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$value->name}}
                            </font></font></td>
                    <td class="table-info">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <img src="{{$value->img}}" style="width:300px;height:25px;border-radius:0;" alt="">
                            </font></font>
                    </td>
                    <td>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                <form action="/adminposter/{{$value->pid}}" method="post">
                                    {{method_field("DELETE")}}
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-gradient-danger btn-icon-text">
                                    <i class="mdi mdi-delete-forever"></i>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            删除
                                        </font>
                                    </font>
                                </button>
                                    <a href="/adminposter/{{$value->pid}}/edit">
                                    <button type="button" class="btn btn-gradient-success btn-icon-text">
                                        <i class="mdi mdi-wrench"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">
                                                修改
                                            </font>
                                        </font>
                                    </button>
                                    </a>
                                </form>

                            </font>
                        </font>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection