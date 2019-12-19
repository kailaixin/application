@extends('vendor.layout')
@section('title','商品列表')
@section('content')
    <table class="layui-table">
        <colgroup>
            <col width="120">
            <col width="250">
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="500">
        </colgroup>
        <thead>
        <tr align="center">
            <td>商品&nbsp;I&nbsp;D</td>
            <td>商品名称</td>
            <td>商品价格</td>
            <td>商品库存</td>
            <td>所属品牌</td>
            <td>所属分类</td>
            <td>是否上架</td>
            <td>商品大图</td>
            <td>添加时间</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $k => $v)
            <tr align="center">
                <td>{{$v['g_id']}}</td>
                <td>{{$v['g_name']}}</td>
                <td>{{$v['g_price']}}</td>
                <td>{{$v['g_stock']}}</td>
                <td>{{$v['b_name']}}</td>
                <td>{{$v['c_name']}}</td>
                <td>@if($v['is_up']==1)是 @else否 @endif</td>
                <td><img src="{{$v['g_img']}}"></td>
                <td>{{date('Y-m-d H:i:s',$v['create_time'])}}</td>
                <td>
                    <a class="layui-btn" href="/admin/goods/detail/{{$v['g_id']}}">详情</a>
                    <a class="layui-btn layui-btn-normal" href="/admin/goods/edit/{{$v['g_id']}}">修改</a>
                    <a class="layui-btn layui-btn-danger delete" delid="{{$v['g_id']}}" href="javascript:;">删除</a>
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
                var tr = $(this).parents('tr');
                var data = {};
                data.g_id = $(this).attr('delid');
                $.post(
                    '/admin/goods/delete',
                    data,
                    function(res){
                        layer.msg(res.font,{icon:res.code,time:1500},function(){
                            if (res.code == 1) {
                                tr.remove();
                            }
                        });
                    },
                    'json'
                );
            });
        });
    </script>
@endsection
