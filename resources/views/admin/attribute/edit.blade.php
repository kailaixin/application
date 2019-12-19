@extends('vendor.layout')
@section('title','属性修改')
@section('content')
    <form class="layui-form" id="form">
        <input type="hidden" name="g_id" value="{{$g_id}}">
        <div class="layui-form-item layui-col-md5" id="input">
            <label class="layui-form-label">类型</label>
            <div class="layui-input-block">
                <select name="c_id" lay-verify="required" id="select" lay-filter="collage">
                    <option value=""></option>
                    @foreach($cate as $k => $v)
                        <option id="option" value="{{$v['c_id']}}" @if($specs[0]['c_id']==$v['c_id']) selected @endif>{{$v['c_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="hidden" name="gs_id" value="{{$specs[0]['gs_id']}}">
        <div class="layui-form-item layui-col-md5" id="type">
            <label class="layui-form-label">{{$key_name['k_name1']}}</label>
            <div class="layui-input-block">
                <input type="text" name="specs0" value="{{$specs[0]['specs0']}}" required  lay-verify="required" placeholder="请输入属性" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5" id="type">
            <label class="layui-form-label">{{$key_name['k_name2']}}</label>
            <div class="layui-input-block">
                <input type="text" name="specs1" value="{{$specs[0]['specs1']}}" required  lay-verify="required" placeholder="请输入属性" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5" id="type">
            <label class="layui-form-label">{{$key_name['k_name3']}}</label>
            <div class="layui-input-block">
                <input type="text" name="specs2" value="{{$specs[0]['specs2']}}" required  lay-verify="required" placeholder="请输入属性" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">库存</label>
            <div class="layui-input-block">
                <input type="text" name="stock"  value="{{$specs[0]['stock']}}" required  lay-verify="required" placeholder="请输入对应此属性商品库存" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-col-md5">
            <label class="layui-form-label">价格</label>
            <div class="layui-input-block">
                <input type="text" name="price" value="{{$specs[0]['price']}}" required  lay-verify="required" placeholder="请输入对应此属性商品价格" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="1" title="显示" @if($specs[0]['status']==1) checked @endif>
                <input type="radio" name="status" value="2" title="禁用" @if($specs[0]['status']==2) checked @endif>
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

                // 获取货品属性
                // form.on("select(collage)",function(data){
                //     var data = {c_id:data.value};
                //     $.post(
                //         '/admin/value/select',
                //         data,
                //         function(res){
                //             if(res.success==true){
                //                 var data = res.data;
                //                 var input ='';
                //                 for (var i in data) {
                //                     // console.log(data[i]['key_name']);
                //                     $('#type').remove();
                //                     input += "<div class=\"layui-form-item layui-col-md5\" id=\"type\">\n" +
                //                         "            <label class=\"layui-form-label\">"+data[i]['key_name']+"</label>\n" +
                //                         "            <div class=\"layui-input-block\">\n" +
                //                         "                <input type=\"text\" name=\"specs"+[i]+"\" required  lay-verify=\"required\" placeholder=\"请输入属性\" autocomplete=\"off\" class=\"layui-input\">\n" +
                //                         "            </div>\n" +
                //                         "        </div>";
                //                 }
                //                 $('#input').after(input);
                //             }
                //         },
                //         'json'
                //     );
                // });
            });

            // 监听提交
            $('.formDemo').click(function(){
                var data = $('#form').serialize();
                $.post(
                    '/admin/value/update',
                    data,
                    function(res){
                        layer.msg(res.font,{icon:res.code,time:1500});
                    },
                    'json'
                );
                return false;
            });
        });
    </script>
@endsection
