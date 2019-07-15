@extends("Admin.AdminPublic.public")
@section("title","分类显示")
@section("main")
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="float: left;">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">分类显示</font>
                </font>
            </h4>
            <div style="clear:both"></div>
            <table class="table table-bordered">
                <thead>
                <tr class="table-success">
                    <th>
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                编号
                            </font></font>
                    </th>
                    <th>
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                名称
                            </font></font>
                    </th>
                    <th>
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                等级
                            </font></font>
                    </th>
                    <th>
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                               权限
                            </font></font>
                    </th>
                    <th>
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                操作
                            </font></font>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $value)
                    <tr class="table-info">
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    {{$i++}}
                                </font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    {{$value->name}}
                                </font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">

                                </font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">

                                </font></font></td>
                        <td>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    <form action="/admincates/{{$value->id}}" method="post">
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
                                        <a href="/admincates/{{$value->id}}/edit">
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