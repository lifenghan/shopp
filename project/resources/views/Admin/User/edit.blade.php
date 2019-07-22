@extends("Admin.AdminPublic.public")
@section("title","会员添加")
@section("main")
<html>
 <head></head>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title">用户添加</h4> 
    <form class="forms-sample" action="/adminuser/{{$data->id}}" method="post"> 
     <div class="form-group"> 
      <label for="exampleInputName1">用户名</label> 
      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="username" value="{{$data->username}}" /> 
     </div>
      <div class="form-group"> 
      <label for="exampleInputEmail3">Email 邮箱</label> 
      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email" value="{{$data->email}}" /> 
     </div> 
     <div class="form-group"> 
      <label for="exampleInputCity1">电话</label> 
      <input type="text" class="form-control" id="exampleInputCity1" placeholder="telphone" name="phone" value="{{$data->phone}}" /> 
     </div>
     {{method_field("PUT")}}
     {{csrf_field()}}
     <button type="submit" class="btn btn-gradient-primary mr-2">提交</button>
    </form>
    <form action="/adminuser"> 
     <button class="btn btn-light">取消</button>
     </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
