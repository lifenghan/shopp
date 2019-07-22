@extends("Admin.AdminPublic.public")
@section("title","商品信息添加")
@section("main")
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品修改</font></font></h4>
                <form class="forms-sample" action="/adminproduct/{{$product->id}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品名称：</font></font></label>
                        <input type="text" name="name" value="{{$product->name}}" class="form-control" id="exampleInputPassword4" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品价格：</font></font></label>
                        <input type="text" name="price" value="{{$product->price}}" class="form-control" id="exampleInputPassword4" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品库存：</font></font></label>
                        <input type="text" name="stock" value="{{$product->stock}}" class="form-control" id="exampleInputPassword4" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品描述：</font></font></label>
                        <input type="text" name="summary" value="{{$product->summary}}" class="form-control" id="exampleInputPassword4" placeholder="name">
                    </div>
                    <div class="custom-file">
                        <label class="custom-file-label" for="inputGroupFile01">商品主图片</label>
                        <input type="file" name="main_img" value="{{$product->main_img}}" class="custom-file-input">
                    </div>
                    @foreach($info as $kay=>$value)
                        @if(empty($value->delete_time))
                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value->name}}</font></font></label>
                        <input type="text" name="{{$value->id}}" value="{{$value->detail}}" class="form-control" id="exampleInputPassword4" placeholder="name">
                    </div>
                        @endif
                    @endforeach
                    {{method_field("PUT")}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button>
                    <button class="btn btn-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">取消</font></font></button>
                </form>
            </div>
        </div>
    </div>
@endsection