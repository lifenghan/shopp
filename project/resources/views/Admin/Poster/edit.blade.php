@extends("Admin.AdminPublic.public")
@section("title","广告修改")
@section("main")
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广告修改</font></font></h4>
                <form class="forms-sample" action="/adminposter/{{$info->pid}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleSelectGender"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广告商品</font></font></label>
                        <select class="form-control" id="exampleSelectGender" name="pid" >
                            <option value="{{$info->pid}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$info->name}}</font></font></option>
                            @foreach($data as $value)
                            <option value="{{$value->id}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value->name}}</font></font></option>
                            @endforeach
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">图片 12:1</font></font></label>
                        <input type="file" name="img" class="form-control" id="exampleInputPassword4" placeholder="图片" value="{{$info->img}}">
                    </div>
                    {{method_field("PUT")}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button>
                    <button class="btn btn-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">取消</font></font></button>
                </form>
            </div>
        </div>
    </div>
@endsection
    
            