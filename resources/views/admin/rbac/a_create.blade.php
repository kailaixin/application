@extends('vendor.layout')
@section('title','权限添加')
@section('content')
    <form class="layui-form" id="form">
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">权限名称</label>
            <div class="layui-input-block">
                <input type="text" name="a_name" required  lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">权限路由</label>
            <div class="layui-input-block">
                <input type="text" name="a_url" required  lay-verify="required" placeholder="请输入路由" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn formDemo" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

    <script>
        $(function(){
            layui.use('form', function(){
                var form = layui.form;
            });

            $('.formDemo').click(function(){
                var data = $('#form').serialize();
                $.post(
                    '/admin/rbac/a_save',
                    data,
                    function(res){
                        layer.msg(res.font,{icon:res.code,time:1500},function(){
                            if (res.code == 1) {
                                location.href='/admin/rbac/a_list';
                            }
                        });
                    },
                    'json'
                );
                return false;
            });
        });
    </script>
@endsection
