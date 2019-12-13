@extends('vendor.layout')
@section('title','角色修改')
@section('content')
    <form class="layui-form" id="form" action="{{url('admin/rbac/gra_update')}}" method="post">
    <input type="hidden" value="{{$info->r_id}}" name="r_id">
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">角色名称</label>
            <div class="layui-input-block">
                <input type="text" value="{{$info->sole}}" name="sole" required  lay-verify="required" placeholder="请输入内容" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text layui-col-md7">
            <label class="layui-form-label">角色描述</label>
            <div class="layui-input-block">
                <textarea name="centent" value="{{$info->centent}}" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn formDemo" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
@endsection
