@extends("Admin.AdminPublic.public")
@section("title","角色修改")
@section("main")
<html>
 <head></head>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title">角色修改</h4> 
    <form class="forms-sample" action="/adminroles/{{$data->id}}" method="post"> 
    	
     <div class="form-group"> 
      <label for="exampleInputName1">角色名字</label> 
      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" value="{{$data->name}}" /> 
     </div>
     {{method_field("PUT")}}
     {{csrf_field()}}
     <button type="submit" class="btn btn-gradient-primary mr-2">修改</button>
    </form>
    <form action="/adminroles"> 
     <button class="btn btn-light">取消</button>
     </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
