@extends('vendor.layout')
@section('title','广告添加')
@section('content')
<form class="layui-form" action="{{url('admin/advent/save')}}" method="post" enctype="multipart/form-data"> 
        <div class="layui-form-item">
            <label class="layui-form-label">广告位置</label>
            <div class="layui-input-block">
                <input type="radio" name="place" value="1" title="主页" >
                <input type="radio" name="place" value="2" title="详情" checked="">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">链接地址</label>
            <div class="layui-input-block">
                <input type="text" name="f_url" required  lay-verify="required" placeholder="请输入地址" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text layui-col-md7">
            <label class="layui-form-label">广告简述</label>
            <div class="layui-input-block">
                <textarea name="f_desc" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="1" title="显示" >
                <input type="radio" name="status" value="2" title="隐藏" checked="">
            </div>
        </div>
        
        <div class="layui-form-item">
            <label class="layui-form-label">图片上传</label>
            <div class="layui-input-block">
                <input type="file" name="f_img">
            </div>
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
