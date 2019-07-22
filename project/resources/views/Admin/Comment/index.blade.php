@extends("Admin.AdminPublic.public")
@section("title","评论显示")
@section("main")
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="float: left;">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">评论显示</font>
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
                                ID
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                会员名称
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                商品名称
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                内容
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                时间
                            </font></font></th>
                   <!--  <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                操作
                            </font></font></th> -->
                </tr>
                </thead>
                <tbody>
               @foreach ($comment as $row)
                <tr class="table-info">
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                               {{$row->id}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$row->uname}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$row->pname}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                               {{$row->content}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                               {{$row->time}}
                            </font></font></td>
                   <!--  <td>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                <form action="/admincates/" method="post">
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
                                    <a href="/admincates//edit">
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
                    </td> -->
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection