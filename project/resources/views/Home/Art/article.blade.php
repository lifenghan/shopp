@extends("Home.Public.public")
@section("title","公告")
@section("main")
<style type="text/css">
	#asd{
		margin-top:20px;
	}
	#as{
		float:right;
	}	
	#a{
		max-width: 100px;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}
</style>
<div style="width:700px height:150px;margin:0 auto;">
	@foreach($data as $value)
	<a href="/art/{{$value->id}}"><div style="width:700px;" id="asd">
		<img src="{{$value->thumb}}">
		<div id="as">
			<table style="width:550px" >
				<tr>
					<th>{{$value->title}}</th>
				</tr>
				<tr>
					<td id="a">{!!$value->descr!!}</td>
				</tr>
			</table><div id="as">作者:{{$value->editor}}</div>
		</div>
	</div></a>
	<HR style="FILTER:alpha(opacity=100,finishopacity=0,style=3)" width="700px"color=#987cb9 SIZE=3>
	@endforeach
</div>
@endsection