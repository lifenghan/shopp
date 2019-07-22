@extends("Home.Public.personal")
@section("title","我的评价")
@section("main")

<div class="m_right">
            <p></p>
            <div class="mem_tit">我的商品评价</div>
            <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tbody>
              <tr>       
                <td width="5%">ID</td>
                <td width="10%">我的昵称</td>
                <td width="20%">下单商品</td>
                <td width="40%">评价内容</td>
                <td width="10%">操作</td>
              </tr>
			@foreach ($pj as $r)
              <tr>
                <td>{{$r->id}}</td>
                <td>{{$r->uname}}</td>
                <td>{{$r->pname}}</td>
                <td>{{$r->content}}</td>
                <form action="/pj/{{$r->id}}" method="post">
                <td><button>删除</button></td>
                {{method_field('DELETE')}}
                {{csrf_field()}}
                </form>
              </tr>
              @endforeach
            </tbody></table>
@endsection