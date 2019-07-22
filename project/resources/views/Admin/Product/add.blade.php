@extends("Admin.AdminPublic.public")
@section("title","商品添加")
@section("main")
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品添加</font></font></h4>
                <form class="forms-sample" action="/adminproduct" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品名字</font></font></label>
                        <input type="text" name="name" value="{{old("name")}}" class="form-control" id="exampleInputPassword4" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">父级</font></font></label>
                        <select class="form-control" id="exampleSelectGender" name="cates_id">
                            <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">--请选择--</font></font></option>
                            @foreach($cates as $value)
                            <option value="{{$value->id}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value->name}}</font></font></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品价格</font></font></label>
                        <input type="text" name="price" value="{{old("price")}}" class="form-control" id="exampleInputPassword4" placeholder="商品价格">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品库存</font></font></label>
                        <input type="text" name="stock" value="{{old("stock")}}" class="form-control" id="exampleInputPassword4" placeholder="商品库存">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品描述</font></font></label>
                        <input type="text" name="summary" value="{{old("stock")}}" class="form-control" id="exampleInputPassword4" placeholder="商品描述">
                    </div>
                    <div class="custom-file">
                        <input type="file" name="main_img" class="custom-file-input">
                        <label class="custom-file-label" for="inputGroupFile01">选择商品主图片</label>
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button>
                    <button class="btn btn-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">取消</font></font></button>
                </form>
            </div>
        </div>
    </div>
@endsection