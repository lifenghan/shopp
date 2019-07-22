@extends("Admin.AdminPublic.public")
@section("title","管理员添加")
@section("main")
<html>
 <head></head>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title">管理员添加</h4> 
    <form class="forms-sample" action="/adminusers" method="post"> 
     <div class="form-group"> 
      <label for="exampleInputName1">管理员名字</label> 
      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" /> 
     </div> 
     <div class="form-group"> 
      <label for="exampleInputPassword4">密码</label> 
      <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" name="password" /> 
     </div>
     {{csrf_field()}}
     <button type="submit" class="btn btn-gradient-primary mr-2">提交</button> 
    </form> 
    <a href="/admin"><button class="btn btn-light">取消</button> </a>
   </div> 
  </div>
 </body>
</html>
@endsection
