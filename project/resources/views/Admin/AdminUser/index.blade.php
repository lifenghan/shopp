@extends("Admin.AdminPublic.public")
@section("title","管理员列表")
@section("main")
 <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="float: left;">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">管理员列表</font>
                </font>
            </h4>
            <div style="clear:both"></div>
            <table class="table table-bordered">
                <thead>
                <tr class="table-success">
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                ID
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                管理员账号
                            </font></font></th>       
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                操作
                            </font></font></th>
                </tr>
                </thead>
                <tbody>
                
                <tr class="table-info">
                    @foreach($data as $row)

                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$row->id}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$row->name}}
                            </font></font></td>
                            
                    <td>
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <form action="adminusers/{{$row->id}}" method="post">
                                    {{method_field("DELETE")}}
                                    {{csrf_field()}}
                                <button type="submit" class="badge badge-info">
                                        <font style="vertical-align: inherit;">
                                            删除
                                        </font>
                                </button>
                                 </form>

                              
                                <a href="/adminusers/{{$row->id}}/edit"><label class="badge badge-info">修改</label></a>
                                <a href="/adminrole/{{$row->id}}"><label class="badge badge-info">分配角色</label></a>
                               
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