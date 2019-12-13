
@extends('vendor.layout')
@section('title','用户列表')
@section('content')
    <form action="">
    <table class="layui-table">
  <colgroup>
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>昵称</th>
      <th>邮箱</th>
      <th>电话</th>
      <th>年龄</th>
      <th>性别</th>
      <th>头像</th>
      <th>创建时间</th>
      <th>登录时间</th>
      <th>操作</th>
    </tr> 
    @foreach($data as $v)
    <tr>
        <th>{{$v->u_id}}</th>
        <th>{{$v->nick}}</th>
        <th>{{$v->email}}</th>
        <th>{{$v->tel}}</th>
        <th>{{$v->age}}</th>
        <th>{{$v->sex}}</th>
        <th>{{$v->headimg}}</th>
        <th>{{date('Y-m-d H:i:s',$v->create_time)}}</th>
        <th>{{$v->last_time}}</th>
        <th>
            <a href="{{url('admin/user/edit/'.$v->u_id)}}" class="layui-btn" lay-submit lay-filter="formDemo">&nbsp;&nbsp;编辑&nbsp;</a>
        </th>
    </tr>
  </thead>
  @endforeach
</table>
</form>
@endsection
