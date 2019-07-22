@extends("Home.Public.public")
@section("title","公告")
@section("main")
 <div class="right" style="width:980px;"><h2 style="text-align:center">{{$data->title}}</h2><p></p><div><p>{!!$data->descr!!}</p><p style="text-align: right; ">作者:{{$data->editor}}</p><p><br></p></div></div>
@endsection