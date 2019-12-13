@extends('vendor.layout')
@section('title','角色添加')
@section('content')
<<<<<<< HEAD
    <form class="layui-form" id="form" action="{{url('admin/rbac/gra_save')}}" method="post">
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">角色名称</label>
            <div class="layui-input-block">
                <input type="text" name="sole" required  lay-verify="required" placeholder="请输入内容" autocomplete="off" class="layui-input">
=======
    <form class="layui-form" id="form">
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">角色名称</label>
            <div class="layui-input-block">
                <input type="text" name="r_name" required  lay-verify="required" placeholder="请输入内容" autocomplete="off" class="layui-input">
>>>>>>> 65bd2a36626505745e82b467220d1b7284368e39
            </div>
        </div>
        <div class="layui-form-item layui-form-text layui-col-md7">
            <label class="layui-form-label">角色描述</label>
            <div class="layui-input-block">
<<<<<<< HEAD
                <textarea name="centent" placeholder="请输入内容" class="layui-textarea"></textarea>
=======
                <textarea name="r_desc" placeholder="请输入内容" class="layui-textarea"></textarea>
>>>>>>> 65bd2a36626505745e82b467220d1b7284368e39
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn formDemo" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
<<<<<<< HEAD
=======

    <script>
        $(function(){
            layui.use('form', function(){
                var form = layui.form;
            });

            $('.formDemo').click(function(){
                var data = $('#form').serialize();
                $.post(
                    '/admin/rbac/r_save',
                    data,
                    function(res){
                        layer.msg(res.font,{icon:res.code,time:1500},function(){

                        });
                    },
                    'json'
                );
                return false;
            });
        });
    </script>
>>>>>>> 65bd2a36626505745e82b467220d1b7284368e39
@endsection
