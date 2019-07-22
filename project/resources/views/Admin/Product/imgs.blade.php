@extends("Admin.AdminPublic.public")
@section("title","商品信息添加")
@section("main")
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">信息添加</font></font></h4>
                <form class="forms-sample" action="/adminimgs" method="post" enctype="multipart/form-data">

                    <div class="custom-file">
                        <input type="hidden" name="id" value="{{$id}}">
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