@extends("Admin.AdminPublic.public")
@section("title","用户信息")
@section("main")
 <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="float: left;">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">用户信息</font>
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
                                兴趣
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                性别
                            </font></font></th>      
                </tr>
                </thead>
                <tbody>
                
                <tr class="table-info">
                   
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$info->id or ""}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$info->hobby or ""}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$info->sex or ""}}
                            </font></font></td>  
                        </font>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection