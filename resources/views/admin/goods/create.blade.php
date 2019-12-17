@extends('vendor.layout')
@section('title','商品添加')
@section('content')
<<<<<<< HEAD
<form class="layui-form" id="form" action="{{url('admin/rbac/gra_save')}}" method="post">
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">商品名称</label>
            <div class="layui-input-block">
                <input type="text" name="g_name" required  lay-verify="required" placeholder="请输入内容" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text layui-col-md7"> ,./
            <label class="layui-form-label"></label>
            <div class="layui-input-block">
                <textarea name="centent" placeholder="请输入内容" class="layui-textarea"></textarea>
=======
    <form class="layui-form" action="/admin/goods/save" method="post" enctype="multipart/form-data">
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">名&emsp;称</label>
            <div class="layui-input-block">
                <input type="text" name="g_name" required  lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">价&emsp;格</label>
            <div class="layui-input-block">
                <input type="text" name="g_price" required  lay-verify="required" placeholder="请输入价格" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">库&emsp;存</label>
            <div class="layui-input-block">
                <input type="text" name="g_stock" required  lay-verify="required" placeholder="请输入库存" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">所&nbsp;属&nbsp;品&nbsp;牌</label>
            <div class="layui-input-block">
                <select name="b_id" lay-verify="required">
                    <option value=""></option>
                    @foreach($brand as $k => $v)
                        <option value="{{$v['b_id']}}">{{$v['b_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">所&nbsp;属&nbsp;分&nbsp;类</label>
            <div class="layui-input-block">
                <select name="c_id" lay-verify="required">
                    <option value=""></option>
                    @foreach($cate as $k => $v)
                        <option value="{{$v['c_id']}}">{{$v['c_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">大&emsp;图</label>
            <div class="layui-input-block">
                <input type="file" name="g_img">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">轮&nbsp;播&nbsp;图&nbsp;一</label>
            <div class="layui-input-block">
                <input type="file" name="g_imgs1">
            </div>
        </div>

        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">轮&nbsp;播&nbsp;图&nbsp;二</label>
            <div class="layui-input-block">
                <input type="file" name="g_imgs2">
            </div>
        </div>

        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">轮&nbsp;播&nbsp;图&nbsp;三</label>
            <div class="layui-input-block">
                <input type="file" name="g_imgs3">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">新品</label>
            <div class="layui-input-block">
                <input type="radio" name="is_new" value="1" title="是">
                <input type="radio" name="is_new" value="2" title="否" checked>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">精品</label>
            <div class="layui-input-block">
                <input type="radio" name="is_best" value="1" title="是">
                <input type="radio" name="is_best" value="2" title="否" checked>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">热销</label>
            <div class="layui-input-block">
                <input type="radio" name="is_hot" value="1" title="是">
                <input type="radio" name="is_hot" value="2" title="否" checked>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">上架</label>
            <div class="layui-input-block">
                <input type="radio" name="is_up" value="1" title="是">
                <input type="radio" name="is_up" value="2" title="否" checked>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">文本域</label>
            <div class="layui-input-block">
                <textarea name="g_desc" placeholder="请输入内容" class="layui-textarea"></textarea>
>>>>>>> b6dd46dab41875ca086dfefe5bb78d1f58987eba
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
<<<<<<< HEAD
                <button class="layui-btn formDemo" lay-submit lay-filter="formDemo">立即提交</button>
=======
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
>>>>>>> b6dd46dab41875ca086dfefe5bb78d1f58987eba
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
        });
    </script>
>>>>>>> b6dd46dab41875ca086dfefe5bb78d1f58987eba
@endsection
