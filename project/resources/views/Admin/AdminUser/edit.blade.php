@extends("Admin.AdminPublic.public")
@section("title","管理员修改")
@section("main")
<html>
 <head></head>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title">管理员修改</h4> 
    <form class="forms-sample" action="/adminusers/{{$data->id}}" method="post"> 
    	
     <div class="form-group"> 
      <label for="exampleInputName1">管理员名字</label> 
      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" value="{{$data->name}}" /> 
     </div>
      <div class="form-group"> 
      <label for="exampleInputName1">管理员密码</label> 
      <input type="text" class="form-control" id="exampleInputName1" placeholder="Password" name="password" value="" /> 
     </div>
     {{method_field("PUT")}}
     {{csrf_field()}}
     <button type="submit" class="btn btn-gradient-primary mr-2">修改</button>
    </form>
    <form action="/adminusers"> 
     <button class="btn btn-light">取消</button>
     </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
