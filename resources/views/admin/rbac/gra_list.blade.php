@extends('vendor.layout')
@section('title','角色权限列表')
@section('content')
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="150">
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="200">
            <col>
        </colgroup>
        <thead>
        <tr align="center">
            <td>角色权限I D</td>
            <td>角色I D</td>
            <td>角色名称</td>
            <td>权限I D</td>
            <td>权限名称</td>
            <td>操 作</td>
        </tr>
        </thead>
        <tbody>
        @foreach($groupra as $k => $v)
            <tr align="center">
                <td>{{$v['gra_id']}}</td>
                <td>{{$v['r_id']}}</td>
                <td>{{$v['r_name']}}</td>
                <td>{{$v['a_id']}}</td>
                <td>{{$v['a_name']}}</td>
                <td>
                    <a class="layui-btn layui-btn-normal" href="/admin/rbac/gra_edit/{{$v['gra_id']}}">修改</a>
                    <a class="layui-btn layui-btn-danger delete" delid="{{$v['gra_id']}}" href="javascript:;">删除</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        $(function(){
            layui.use('form',function(){
                var form = layui.form;
            });


        });
    </script>
@endsection
