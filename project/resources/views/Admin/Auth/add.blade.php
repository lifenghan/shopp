@extends("Admin.AdminPublic.public")
@section("title","权限添加")
@section("main")
<html>
 <head></head>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title">权限添加</h4> 
    <form class="forms-sample" action="/auth" method="post"> 
    <div class="form-group"> 
      <label for="exampleInputName1">权限名字</label> 
      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" /> 
     </div>
     <div class="form-group"> 
      <label for="exampleInputName1">控制器名字</label> 
      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="mname" /> 
     </div> 
     <div class="form-group"> 
      <label for="exampleInputPassword4">控制器方法</label> 
      <input type="text" class="form-control" id="exampleInputPassword4" placeholder="name" name="aname" /> 
     </div>
     {{csrf_field()}}
     <button type="submit" class="btn btn-gradient-primary mr-2">提交</button> 
    </form> 
    <a href="/auth"><button class="btn btn-light">取消</button> </a>
   </div> 
  </div>
 </body>
</html>
@endsection
