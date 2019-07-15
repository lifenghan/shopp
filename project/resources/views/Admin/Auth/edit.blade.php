@extends("Admin.AdminPublic.public")
@section("title","权限修改")
@section("main")
<html>
 <head></head>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title">权限修改</h4> 
    <form class="forms-sample" action="/auth/{{$data->id}}" method="post"> 
    	
     <div class="form-group"> 
      <label for="exampleInputName1">权限名字</label> 
      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" value="{{$data->name}}" /> 
     </div>
      <div class="form-group"> 
      <label for="exampleInputEmail3">控制器名字</label> 
      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="控制器名字" name="mname" value="{{$data->mname}}" /> 
     </div> 
      <div class="form-group"> 
      <label for="exampleInputEmail3">控制器方法</label> 
      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="控制器方法" name="aname" value="{{$data->aname}}" /> 
     </div> 
     {{method_field("PUT")}}
     {{csrf_field()}}
     <button type="submit" class="btn btn-gradient-primary mr-2">修改</button>
    </form>
    <form action="/auth"> 
     <button class="btn btn-light">取消</button>
     </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
