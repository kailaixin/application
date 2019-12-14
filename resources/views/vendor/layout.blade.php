<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/static/layui/css/layui.css')}}">
    <script src="{{asset('/static/layui/layui.js')}}"></script>
    <script src="{{asset('/static/jquery.js')}}"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <!-- 头部 -->
    <div class="layui-header">
        <div class="layui-logo">国产小青蛙</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <!-- <ul class="layui-nav layui-layout-left"> -->
        <!-- <li class="layui-nav-item"><a href="">控制台</a></li> -->
        <!-- <li class="layui-nav-item"><a href="">商品管理</a></li> -->
        <!-- <li class="layui-nav-item"><a href="">用户</a></li> -->
        <!-- <li class="layui-nav-item"> -->
        <!-- <a href="javascript:;">其它系统</a> -->
        <!-- <dl class="layui-nav-child"> -->
        <!-- <dd><a href="">邮件管理</a></dd> -->
        <!-- <dd><a href="">消息管理</a></dd> -->
        <!-- <dd><a href="">授权管理</a></dd> -->
        <!-- </dl> -->
        <!-- </li> -->
        <!-- </ul> -->
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a>
                    @if(session('userinfo')['headimg']=='')
                        <img src="/img/head.jpg" class="layui-nav-img">
                    @else
                        <img src="{{session('userinfo')['headimg']}}" class="layui-nav-img">
                    @endif
                    {{--                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">--}}
                </a>
                <dl class="layui-nav-child">
                    <dd><a class="headimg" href="javascript:;">更换头像</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item out"><a href="javascript:;">退出</a></li>
        </ul>
    </div>

    <!-- 左侧 -->
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="/admin/index">&ensp;&ensp;主&ensp;页</a>
                </li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">用户管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/user/list">&emsp;&emsp;用户列表</a></dd>
                       <dd><a href="/admin/user/edit">&emsp;&emsp;修改信息</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">品牌管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/brand/list">&emsp;&emsp;品牌列表</a></dd>
                        <dd><a href="/admin/brand/create">&emsp;&emsp;品牌添加</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">商品管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/category/list">&emsp;&emsp;商品列表</a></dd>
                        <dd><a href="/admin/category/create">&emsp;&emsp;商品添加</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">广告管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/news/list">&emsp;&emsp;广告列表</a></dd>
                        <dd><a href="/admin/news/create">&emsp;&emsp;广告添加</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">订单管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/friend/list">&emsp;&emsp;订单列表</a></dd>
                        <dd><a href="/admin/friend/create">&emsp;&emsp;订单添加</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">购物车管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/notice/list">&emsp;&emsp;购物车列表</a></dd>
                        <dd><a href="/admin/notice/create">&emsp;&emsp;购物车添加</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">R B A C</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/rbac/r_create">&emsp;&emsp;角色添加</a></dd>
                        <dd><a href="/admin/rbac/r_list">&emsp;&emsp;角色列表</a></dd>
                        <dd><a href="/admin/rbac/a_create">&emsp;&emsp;权限添加</a></dd>
                        <dd><a href="/admin/rbac/a_list">&emsp;&emsp;权限列表</a></dd>
                        <dd><a href="/admin/rbac/gra_create">&emsp;&emsp;角色权限添加</a></dd>
                        <dd><a href="/admin/rbac/gra_list">&emsp;&emsp;角色权限列表</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>

    <!-- 内容主体区域 -->
    <div class="layui-body">
        <div style="padding: 15px;">@yield('content')</div>
    </div>

    <!-- 底部固定区域 -->
    <div class="layui-footer">
        <!-- © layui.com - 底部固定区域 -->
    </div>
</div>

<script>
    $(function(){
        // 左侧栏位使用
        layui.use('element', function(){
            var element = layui.element;
        });
        // layui引用
        layui.use('form', function(){
            var form = layui.form;
        });


        // 更换头像
        $('.headimg').click(function(){
            location.href='/admin/headimg';
        });

        // 退出登录
        $('.out').click(function(){
            var data = {};
            $.post(
                '/out',
                data,
                function(res){
                    layer.msg(res.font,{icon:res.code,time:1500},function(){
                        location.href='/';
                    });
                },
                'json'
            );
        });
    });
</script>
</body>
</html>
