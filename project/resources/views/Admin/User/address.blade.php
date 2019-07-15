@extends("Admin.AdminPublic.public")
@section("title","收货地址")
@section("main")
 <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="float: left;">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">收货地址</font>
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
                                收货人
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                地址
                            </font></font></th>  
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                电话
                            </font></font></th>    
                </tr>
                </thead>
                <tbody>
                
                <tr class="table-info">
                   @foreach($address as $row)
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$row->id}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$row->name}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$row->phone}}
                            </font></font></td>  
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$row->huo}}
                            </font></font></td>     
                </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection