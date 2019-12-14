
@extends('vendor.layout')
@section('title','用户列表')
@section('content')
    <form action="">
    <table class="layui-table">
  <colgroup>
{{--    <col width="70">--}}
    <col width="250">
    <col width="250">
    <col width="200">
    <col width="100">
    <col width="100">
    <col width="200">
    <col width="150">
    <col width="150">
  </colgroup>
  <thead>
    <tr align="center">
{{--      <td>ID</td>--}}
      <td>昵称</td>
      <td>邮箱</td>
      <td>电话</td>
      <td>年龄</td>
      <td>性别</td>
      <td>头像</td>
      <td>创建时间</td>
      <td>最后登录时间</td>
    </tr>
    @foreach($data as $v)
    <tr align="center">
{{--        <td>{{$v->u_id}}</td>--}}
        <td>{{$v->nick}}</td>
        <td>{{$v->email}}</td>
        <td>{{$v->tel}}</td>
        <td>{{$v->age}}</td>
        <td>@if($v->sex==1) 男 @else 女 @endif</td>
        <td>{{$v->headimg}}</td>
        <td>{{date('Y-m-d H:i:s',$v->create_time)}}</td>
        <td>{{date('Y-m-d H:i:s',$v->last_time)}}</td>
    </tr>
  </thead>
  @endforeach
</table>
</form>
@endsection
