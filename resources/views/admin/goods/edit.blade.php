@extends('vendor.layout')
@section('title','商品修改')
@section('content')
    <form class="layui-form" action="/admin/goods/update" method="post" enctype="multipart/form-data">
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">名&emsp;称</label>
            <div class="layui-input-block">
                <input type="hidden" name="g_id" value="{{$data[0]['g_id']}}">
                <input type="text" name="g_name" value="{{$data[0]['g_name']}}" required  lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">价&emsp;格</label>
            <div class="layui-input-block">
                <input type="text" name="g_price" value="{{$data[0]['g_price']}}" required  lay-verify="required" placeholder="请输入价格" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">库&emsp;存</label>
            <div class="layui-input-block">
                <input type="text" name="g_stock" value="{{$data[0]['g_stock']}}" required  lay-verify="required" placeholder="请输入库存" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">所&nbsp;属&nbsp;品&nbsp;牌</label>
            <div class="layui-input-block">
                <select name="b_id" lay-verify="required">
                    <option value=""></option>
                    @foreach($brand as $k => $v)
                        <option value="{{$v['b_id']}}" @if($data[0]['b_id']==$v['b_id']) selected @endif>{{$v['b_name']}}</option>
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
                        <option value="{{$v['c_id']}}" @if($data[0]['c_id']==$v['c_id']) selected @endif>{{$v['c_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">大&emsp;图</label>
            <div class="layui-input-block">
                <input type="file" name="g_img">
                <div>&nbsp;</div>
                <img src="{{$data[0]['g_img']}}" width="100">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">轮&nbsp;播&nbsp;图&nbsp;一</label>
            <div class="layui-input-block">
                <input type="file" name="g_imgs1">
                <div>&nbsp;</div>
                <img src="{{$data[0]['g_imgs'][1]}}" width="100">
            </div>
        </div>

        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">轮&nbsp;播&nbsp;图&nbsp;二</label>
            <div class="layui-input-block">
                <input type="file" name="g_imgs2">
                <div>&nbsp;</div>
                <img src="{{$data[0]['g_imgs'][2]}}" width="100">
            </div>
        </div>

        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">轮&nbsp;播&nbsp;图&nbsp;三</label>
            <div class="layui-input-block">
                <input type="file" name="g_imgs3">
                <div>&nbsp;</div>
                <img src="{{$data[0]['g_imgs'][3]}}" width="100">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">新品</label>
            <div class="layui-input-block">
                <input type="radio" name="is_new" value="1" title="是" @if($data[0]['is_new']==1) checked @endif>
                <input type="radio" name="is_new" value="2" title="否" @if($data[0]['is_new']==2) checked @endif>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">精品</label>
            <div class="layui-input-block">
                <input type="radio" name="is_best" value="1" title="是" @if($data[0]['is_best']==1) checked @endif>
                <input type="radio" name="is_best" value="2" title="否" @if($data[0]['is_best']==2) checked @endif>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">热销</label>
            <div class="layui-input-block">
                <input type="radio" name="is_hot" value="1" title="是" @if($data[0]['is_hot']==1) checked @endif>
                <input type="radio" name="is_hot" value="2" title="否" @if($data[0]['is_hot']==2) checked @endif>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">上架</label>
            <div class="layui-input-block">
                <input type="radio" name="is_up" value="1" title="是" @if($data[0]['is_up']==1) checked @endif>
                <input type="radio" name="is_up" value="2" title="否" @if($data[0]['is_up']==2) checked @endif>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">文本域</label>
            <div class="layui-input-block">
                <textarea name="g_desc" placeholder="请输入内容" class="layui-textarea">{{$data[0]['g_desc']}}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

    <script>
        $(function(){
            layui.use('form', function(){
                var form = layui.form;
            });
        });
    </script>
@endsection
