@extends("Admin.AdminPublic.public")
@section("title","分类显示")
@section("main")
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="float: left;">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">轮播图</font>
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
                                板块名称
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                操作
                            </font></font></th>
                </tr>
                </thead>
                <tbody>
                @foreach($banner as $value)
                    @if(empty($value->delete_time))
                        <tr class="table-info">
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        {{$i++}}
                                    </font></font></td>
                            <td>
                                <a href="/adminbanner/{{$value->id}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        {{$value->description}}
                                    </font></font></a></td>
                            <td>
                                <a href="/banneradd/{{$value->id}}">
                                    <button type="button" class="btn btn-gradient-info btn-sm">
                                        <i class="mdi mdi-wrench"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">
                                                添加
                                            </font>
                                        </font>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection