@extends("Admin.AdminPublic.public")
@section("title","分类显示")
@section("main")
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="float: left;">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">商品详情</font>
                </font>
            </h4>
            <div style="clear:both"></div>
            <table class="table table-bordered">
                <tbody>
                <tr >
                    <td class="table-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                商品名称:
                            </font></font></td>
                    <td class="table-info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$product->name}}
                            </font></font></td>
                    <td class="table-warning">

                    </td>
                </tr>
                <tr >
                    <td class="table-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                商品价格:
                            </font></font></td>
                    <td class="table-info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$product->price}}
                            </font></font></td>
                    <td class="table-warning">

                    </td>
                </tr>
                <tr >
                    <td class="table-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                商品库存:
                            </font></font></td>
                    <td class="table-info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$product->stock}}
                            </font></font></td>
                    </td>
                    <td class="table-warning">

                    </td>
                </tr>
                <tr >
                    <td class="table-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                商品描述:
                            </font></font></td>
                    <td class="table-info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$product->summary}}
                            </font></font></td>
                    </td>
                    <td class="table-warning">

                    </td>
                </tr>
                <tr >
                    <td class="table-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                商品主要图片:
                            </font></font></td>
                    <td class="table-info">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <img src="/static/Public/images/{{$product->main_img}}" style="width:100px;height:100px;border-radius:0;" alt="">
                            </font></font>
                    </td>

                    <td class="table-warning">

                    </td>
                </tr>
                <tr >
                    <td class="table-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                商品参考图片:
                            </font></font></td>
                    <td class="table-info">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                @foreach($imgs as $value)
                                    @if(empty($value->delete_time))
                                        <img src="/static/Public/images/{{$value->url}}" style="width:100px;height:100px;border-radius:0;" alt="">
                                    @endif
                                @endforeach
                            </font></font>
                    </td>

                    <td class="table-warning">
                        <form action="/adminimgs/create" method="get">
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <a href=""><button type="submit" class="btn btn-gradient-primary btn-sm">添加</button></a>
                        </form>
                        <form action="/adminimgs/{{$product->id}}" method="post">
                            {{method_field("DELETE")}}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-gradient-primary btn-sm">删除</button>
                        </form>
                    </td>
                </tr>
                @foreach($info as $value)
                    @if(empty($value->delete_time))
                <tr >
                    <td class="table-success "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$value->name}}:
                            </font></font></td>
                    <td class="table-info">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                {{$value->detail}}
                            </font></font>
                    </td>
                    <td class="table-warning ">
                        <form action="/deleteproductinfo/{{$product->id}}" method="post">
                            <input type="hidden" name="id" value="{{$value->id}}">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-gradient-primary btn-sm">删除</button>
                        </form>
                    </td>
                </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection