@extends("Admin.AdminPublic.public")
@section("title","角色添加")
@section("main")
<html>
 <head></head>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title">角色添加</h4> 
    <form class="forms-sample" action="/adminroles" method="post"> 
     <div class="form-group"> 
      <label for="exampleInputName1">角色名字</label> 
      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" /> 
     </div>
     {{csrf_field()}}
     <button type="submit" class="btn btn-gradient-primary mr-2">添加</button> 
    </form> 
    <a href="/admin"><button class="btn btn-light">取消</button> </a>
   </div> 
  </div>
 </body>
</html>
@endsection
