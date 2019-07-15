@extends("Admin.AdminPublic.public")
@section("title","后台角色列表")
@section("main")
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="float: left;">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">角色列表显示</font>
                </font>
            </h4>
           
            <div style="clear:both"></div>
            <table class="table table-bordered">
                <thead>
                <tr class="table-success">
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                编号
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                角色名称
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                状态
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                操作
                            </font></font></th>
                </tr>
                </thead>
                <tbody>
                @foreach($role as $value)
                <tr class="table-info">
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$value->id}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$value->name}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$value->status}}
                            </font></font></td>
                    <td>
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <form action="/adminroles/{{$value->id}}" method="post">
                                    {{method_field("DELETE")}}
                                    {{csrf_field()}}
                                <button type="submit" class="badge badge-info">
                                    <i class="mdi mdi-delete-forever"></i>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            删除
                                        </font>
                                    </font>
                                </button>
                                <a href="/adminroles/{{$value->id}}/edit"><label class="badge badge-info">修改</label></a>
                                </form>
                                <a href="/adminauth/{{$value->id}}"><button type="submit" class="badge badge-info">分配权限
                                </button></a>
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