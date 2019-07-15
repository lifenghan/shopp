<div class="card">
        <div class="card-body">
            <h4 class="card-title" style="float: left;">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">用户列表</font>
                </font>
            </h4>
            <div style="clear:both"></div>
            <div id="uid">
            <table class="table table-bordered">
                <thead>
                <tr class="table-success">
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                ID
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                用户名
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                邮箱
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                状态
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                电话
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                添加时间
                            </font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                修改时间
                            </font></font></th>        
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                操作
                            </font></font></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                <tr class="table-info">
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$row->id}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                               {{$row->username}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$row->email}}
                            </font></font></td>                
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                               {{$row->status}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                               {{$row->phone}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$row->created_at}}
                            </font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$row->updated_at}}
                            </font></font></td>
                    <td>
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <form action="adminuser/id" method="post">
                                    {{method_field("DELETE")}}
                                    {{csrf_field()}}
                                <button type="submit" class="badge badge-info">
                                        <font style="vertical-align: inherit;">
                                            删除
                                        </font>
                                </button>
                                 </form>
                                <a href="/adminuser/id"><label class="badge badge-info">会员详情</label></a>
                                <a href="/adminuser/id/edit"><label class="badge badge-info">修改</label></a>
                                <a href="/adminaddress/id"><label class="badge badge-info">收货地址</label></a>
                               
                            </font>
                        </font>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>