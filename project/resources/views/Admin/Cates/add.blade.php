@extends("Admin.AdminPublic.public")
@section("title","后台分类添加")
@section("main")
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分类添加</font></font></h4>
                <form class="forms-sample" action="/admincates" method="post">

                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分类名字</font></font></label>
                        <input type="text" name="name" class="form-control" id="exampleInputPassword4" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">父级</font></font></label>
                        <select class="form-control" id="exampleSelectGender" name="pid">
                            <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">--请选择--</font></font></option>
                            @foreach($cates as $value)
                            <option value="{{$value->id}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value->name}}</font></font></option>
                            @endforeach
                        </select>
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button>
                    <button class="btn btn-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">取消</font></font></button>
                </form>
            </div>
        </div>
    </div>
@endsection