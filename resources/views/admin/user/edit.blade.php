@extends('vendor.layout')
@section('title','修改信息')
@section('content')

<form class="layui-form" id="form">
  <div class="layui-form-item layui-col-md5">
    <label class="layui-form-label">昵&emsp;称</label>
    <div class="layui-input-block">
{{--        <input type="hidden" name="u_id" value="{{$data[0]['u_id']}}">--}}
      <input type="text" name="nick" value="{{$data[0]['nick']}}" required  lay-verify="required" placeholder="请输入昵称" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item layui-col-md5">
    <label class="layui-form-label">邮&emsp;箱</label>
    <div class="layui-input-block">
      <input type="email" name="email" value="{{$data[0]['email']}}" required  lay-verify="required" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item layui-col-md5">
    <label class="layui-form-label">手机号</label>
    <div class="layui-input-block">
      <input type="text" name="tel" value="{{$data[0]['tel']}}" required  lay-verify="required" placeholder="请输入电话" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item layui-col-md5">
    <label class="layui-form-label">年&emsp;龄</label>
    <div class="layui-input-block">
      <input type="text" name="age" value="{{$data[0]['age']}}" required  lay-verify="required" placeholder="请输入年龄" autocomplete="off" class="layui-input">
    </div>
  </div>


  <div class="layui-form-item">
    <label class="layui-form-label">单选框</label>
    <div class="layui-input-block">
      <input type="radio" name="sex" value="1" title="男" @if($data[0]['sex']==1)checked @endif>
      <input type="radio" name="sex" value="2" title="女" @if($data[0]['sex']==2)checked @endif>
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
        layui.use('form',function(){
            var form = layui.form;
        });

        $('.formDemo').click(function(){
            var data = $('#form').serialize();
            $.post(
                '/admin/user/update',
                data,
                function(res){
                    layer.msg(res.font,{icon:res.code,time:1500},function(){
                        if(res.code ==1 ){
                            location.href='/admin/user/list';
                        }
                    })
                },
                'json'
            );
            return false;
        });
    });
</script>
@endsection
