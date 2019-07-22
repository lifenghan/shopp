@extends("Admin.AdminPublic.public")
@section("title","分类显示")
@section("main")
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="float: left;">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">订单显示</font>
                </font>
            </h4>
            <form class="form-inline" action="/admincates" method="git" style="float: right;">

                <input type="text" name="name" value="" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="name">
                <button type="submit" class="btn btn-gradient-primary mb-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button>
            </form>
            <div style="clear:both"></div>
            <table class="table table-bordered">
                <thead>
                <tr class="table-success">
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                编号
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                订单编号
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                用户id
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                总金额
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                收获人
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                送货地址
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                联系方式
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                下单时间
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                订单状态
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                操作
                            </font></font></th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $key=>$value)
                <tr class="table-info">
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            {{$i++}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            {{$value->order_code}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            {{$value->user_id}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$value->tot}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            {{$value->name}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            {{$value->city}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            {{$value->phone}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            {{$value->create_time}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            {{$value->status}}
                            </font></font></td>
                    <td>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">

                                    <a href="/adminorder/{{$value->id}}">
                                        <button type="button" class="btn btn-gradient-info btn-sm">
                                            <i class="mdi mdi-wrench"></i>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    详情
                                                </font>
                                            </font>
                                        </button>
                                    </a>


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