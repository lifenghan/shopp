@extends("Admin.AdminPublic.public")
@section("title","后台分配权限")
@section("main")
   <html>
 <head></head>
 <body>
  <div class="card-body"> 
   <h4 class="card-title">权限信息</h4> 
   <p class="card-description">当前角色:&nbsp;{{$role->name}}&nbsp;的角色信息</p> 
   <form action="/saveauth" method="post"> 
    <div class="row"> 
     <div class="col-md-6"> 
      <div class="form-group">
       @foreach($auth as $row)
       <div class="form-check"> 
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" name="nid[]" value="{{$row->id}}" @if(in_array($row->id,$nid)) checked @endif />{{$row->name}}<i class="input-helper"></i></label> 
       </div> 
       @endforeach
      </div> 
     </div> 
    </div> 
	<input type="hidden" value="{{$role->id}}" name="rid">
    {{csrf_field()}}
    <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分配权限</font></font></button> 
    <button class="btn btn-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">取消</font></font></button> 
   </form> 
  </div>
 </body>
</html>
@endsection