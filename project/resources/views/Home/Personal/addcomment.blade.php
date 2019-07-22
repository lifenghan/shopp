@extends("Home.Public.personal")
@section("title","商品评价")
@section("main")
<style>
	#content{
		width: 800px;
		height: 200px;
		border:1px solid red;
	}
</style>
    <div class="dt-text">
      您没有填写评价内容 
    </div>
	    <form action="/comment/{{$productid}}" method="post">
	       <textarea name="content" id="content" placeholder="写写你的感受吧，一不小心就成了评论高手。">
	       	
	       </textarea><br/><br/>
	       {{csrf_field()}}
	       {{method_field('PUT')}}
	       <button>添加评论</button>
	       <input type="hidden" name="user_id" value="{{session('username')->id}}">
	      
	       <input type="hidden" name="product_id" value="{{$productid}}">
	      
	       <input type="hidden" name="time" value="{{$time}}">
		</form>
 </body>
</html>

@endsection