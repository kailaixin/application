@extends('vendor.layout')
@section('title','角色权限添加')
@section('content')
    <form class="layui-form" id="form">
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">选择角色</label>
            <div class="layui-input-block">
                <select name="r_id" lay-verify="required">
                    @foreach($role as $v)
                        <option value="{{$v['r_id']}}">{{$v['r_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-form-item layui-col-md5"></div>
        <div class="layui-form-item layui-col-md5"></div>

        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">选择权限</label>
            <div class="layui-input-block">
                <select name="a_id" lay-verify="required">
                    @foreach($admin as $v)
                        <option value="{{$v['a_id']}}">{{$v['a_name']}}</option>
                    @endforeach
                </select>
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
                    '/admin/rbac/gra_save',
                    data,
                    function(res){
                        console.log(res)
                        layer.msg(res.font,{icon:res.code,time:2000});
                    },
                    'json'
                );
                return false;
            });
        });
    </script>
@endsection
