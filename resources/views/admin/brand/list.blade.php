@extends('vendor.layout')
@section('title','品牌列表')
@section('content')
    <table class="layui-table">
        <colgroup>
            <col width="100">
            <col width="250">
            <col width="300">
            <col width="200">
            <col width="250">
            <col>
        </colgroup>
        <thead>
        <tr align="center">
            <td>品牌 ID</td>
            <td>品牌名称</td>
            <td>品牌网址</td>
            <td>是否展示</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $k => $v)
            <tr align="center">
                <td>{{$v['b_id']}}</td>
                <td>{{$v['b_name']}}</td>
                <td><a href="{{$v['b_url']}}">{{$v['b_url']}}</a></td>
                <td>@if($v['is_show']==1) 是&emsp;😋 @else 否&emsp;😡 @endif</td>
                <td>
                    <a class="layui-btn layui-btn-normal" href="/admin/brand/edit/{{$v['b_id']}}">修改</a>
                    <a class="layui-btn layui-btn-danger delete" b_id="{{$v['b_id']}}" href="javascript:;">删除</a>
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

            // 监听删除
            $('.delete').click(function(){
                var msg = confirm('确定删除吗？')
                if (msg == true) {
                    var tr = $(this).parents('tr');
                    console.log(tr);
                    var b_id = $(this).attr('b_id');
                    var data = {b_id};
                    $.post(
                        '/admin/brand/delete',
                        data,
                        function(res){
                            layer.msg(res.font,{icon:res.code,time:1500},function(){
                                if(res.code == 1){
                                    tr.remove();
                                }
                            });
                        },
                        'json'
                    );
                }
                return false;
            });
        });
    </script>
@endsection
