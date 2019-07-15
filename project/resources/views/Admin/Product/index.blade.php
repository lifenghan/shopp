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
                                商品名称
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                商品价格
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                商品库存
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                操作
                            </font></font></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $value)
                    @if(empty($value->delete_time))
                <tr class="table-info">
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$i++}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$value->name}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$value->price}}RMB
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$value->stock}}
                            </font></font></td>
                    <td>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                <form action="/adminproduct/{{$value->id}}" method="post">
                                    {{method_field("DELETE")}}
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-gradient-danger btn-sm">
                                    <i class="mdi mdi-delete-forever"></i>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            删除
                                        </font>
                                    </font>
                                </button>
                                    <a href="/adminproduct/{{$value->id}}/edit">
                                    <button type="button" class="btn btn-gradient-success btn-sm">
                                        <i class="mdi mdi-wrench"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">
                                                修改
                                            </font>
                                        </font>
                                    </button>
                                    </a>
                                    <a href="/adminaddproduct/{{$value->id}}">
                                        <button type="button" class="btn btn-gradient-info btn-sm">
                                            <i class="mdi mdi-wrench"></i>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    添加信息
                                                </font>
                                            </font>
                                        </button>
                                    </a>
                                    <a href="/adminproduct/{{$value->id}}">
                                        <button type="button" class="btn btn-gradient-info btn-sm">
                                            <i class="mdi mdi-wrench"></i>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    详情
                                                </font>
                                            </font>
                                        </button>
                                    </a>
                                </form>

                            </font>
                        </font>
                    </td>
                </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection