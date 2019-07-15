@extends("Admin.AdminPublic.public")
@section("title","商品信息添加")
@section("main")
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">信息添加</font></font></h4>
                <form class="forms-sample" action="/admindoaddproduct/{{$id}}" method="post" >

                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品属性</font></font></label>
                        <input type="text" name="name" value="{{old("name")}}" class="form-control" id="exampleInputPassword4" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">属性详情</font></font></label>
                        <input type="text" name="detail" value="{{old("price")}}" class="form-control" id="exampleInputPassword4" placeholder="商品价格">
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button>
                    <button class="btn btn-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">取消</font></font></button>
                </form>
            </div>
        </div>
    </div>
@endsection