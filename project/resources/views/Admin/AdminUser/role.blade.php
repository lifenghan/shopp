@extends("Admin.AdminPublic.public")
@section("title","分配角色")
@section("main")
<html>
 <head></head>
 <body>
  <div class="card-body"> 
   <h4 class="card-title">角色信息</h4> 
   <p class="card-description">当前:&nbsp;{{$adminuser->name}}&nbsp;的用户信息</p> 
   <form action="/saverole" method="post"> 
    <div class="row"> 
     <div class="col-md-6"> 
      <div class="form-group">
        @foreach ($role as $row)
       <div class="form-check"> 
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" name="rids[]" value="{{$row->id}}" @if(in_array($row->id,$rids)) checked @endif/> {{$row->name}} <i class="input-helper"></i></label> 
       </div> 
       @endforeach
      </div> 
     </div> 
    </div> 
    {{csrf_field()}}
    <input type="hidden" value="{{$adminuser->id}}" name="uid">
    <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分配角色</font></font></button> 
    <button class="btn btn-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">取消</font></font></button> 
   </form> 
  </div>
 </body>
</html>
@endsection