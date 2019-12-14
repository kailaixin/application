@extends('vendor.layout')
@section('title','品牌添加')
@section('content')
    <form class="layui-form" id="form">
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">品牌名称</label>
            <div class="layui-input-block">
                <input type="text" name="b_name" required  lay-verify="required" placeholder="请输入品牌名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">品牌网址</label>
            <div class="layui-input-block">
                <input type="text" name="b_url" required  lay-verify="required" placeholder="请输入品牌网址" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否展示</label>
            <div class="layui-input-block">
                <input type="radio" name="sex" value="1" title="是">
                <input type="radio" name="sex" value="2" title="否" checked>
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

            //监听提交
            $('.formDemo').click(function(){
                var data = $('#form').serialize();
                $.post(
                    '/admin/brand/save',
                    data,
                    function(res){
                        console.log(res);
                    }
                );
                return false;
            });
        });
    </script>
@endsection
