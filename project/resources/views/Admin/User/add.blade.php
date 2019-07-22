@extends("Admin.AdminPublic.public")
@section("title","会员添加")
@section("main")
<html>
 <head></head>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title">用户添加</h4> 
    <form class="forms-sample" action="/adminuser" method="post"> 
     <div class="form-group"> 
      <label for="exampleInputName1">用户名</label> 
      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="username" /> 
     </div> 
     <div class="form-group"> 
      <label for="exampleInputPassword4">密码</label> 
      <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" name="password" /> 
     </div>
       <div class="form-group"> 
      <label for="exampleInputPassword4">确认密码</label> 
      <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" name="repassword" /> 
     </div> 
      <div class="form-group"> 
      <label for="exampleInputEmail3">Email 邮箱</label> 
      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email" /> 
     </div> 
     <div class="form-group"> 
      <label for="exampleInputCity1">电话</label> 
      <input type="text" class="form-control" id="exampleInputCity1" placeholder="telphone" name="phone" /> 
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
