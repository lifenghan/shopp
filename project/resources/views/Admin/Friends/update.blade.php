@extends("Admin.AdminPublic.public")
@section("title","修改友情链接")
@section("main")
    <div class="card-body">
      <h4 class="card-title">友情链接修改</h4>
      <form class="forms-sample" action="/adminfriends/{{$data->id}}" method="post" enctype="multipart/form-data">
        <div class="form-group row">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">名字</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="exampleInputUsername2" name="name" value="{{$data->name}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">描述</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="exampleInputEmail2" name="miaoshu" value="{{$data->miaoshu}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="exampleInputMobile" class="col-sm-3 col-form-label">链接</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="exampleInputMobile" name="href" value="{{$data->href}}">
          </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">logo</font></font></label>
            <input type="file" name="img" class="form-control" id="exampleInputPassword4" placeholder="图片" value="{{$data->img}}">
        </div>
        <!-- <input type="radio" name="radio" value="0" >关闭<br>
        <input type="radio" name="radio" value="1" >开启<br> -->
        <div class="form-check form-check-primary">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="status" id="ExampleRadio1" value="0" @if(($data->status)==0) checked @endif>
              关闭
            <i class="input-helper"></i></label>
        </div>
        <div class="form-check form-check-primary">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="status" id="ExampleRadio1" value="1" @if(($data->status)==1) checked @endif>
              开启
            <i class="input-helper"></i></label>
        </div>
        {{method_field('PUT')}}
        {{csrf_field()}}
        <button type="submit" class="btn btn-gradient-primary mr-2">提交</button>
      </form>
    </div>
@endsection