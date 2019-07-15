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
            <form class="form-inline" action="/admincates" method="git" style="float: right;">

                <input type="text" name="name" value="{{$name}}" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="name">
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
                                分类名称
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                pid
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                path
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                操作
                            </font></font></th>
                </tr>
                </thead>
                <tbody>
                @foreach($cates as $value)
                <tr class="table-info">
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$i++}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$value->name}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$value->pid}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$value->path}}
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