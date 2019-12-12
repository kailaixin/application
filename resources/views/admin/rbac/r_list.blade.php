@extends('vendor.layout')
@section('title','角色列表')
@section('content')
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="200">
            <col>
        </colgroup>
        <thead>
        <tr align="center">
            <td>角色I D</td>
            <td>角色名称</td>
            <td>角色描述</td>
            <td>创建时间</td>
            <td>操 作</td>
        </tr>
        </thead>
        <tbody>
            @foreach($role as $k => $v)
                <tr align="center">
                    <td>{{$v['r_id']}}</td>
                    <td>{{$v['r_name']}}</td>
                    <td>{{$v['r_desc']}}</td>
                    <td>{{date('Y-m-d H:i:s',$v['create_time'])}}</td>
                    <td>
                        <a class="layui-btn layui-btn-normal" href="/admin/rbac/r_edit/{{$v['r_id']}}">修改</a>
                        <a class="layui-btn layui-btn-danger delete" delid="{{$v['r_id']}}" href="javascript:;">删除</a>
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
