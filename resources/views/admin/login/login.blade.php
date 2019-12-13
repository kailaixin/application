<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>登录-有点</title>
    <link rel="stylesheet" type="text/css" href="/css/public.css" />
    <link rel="stylesheet" type="text/css" href="/css/page.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/public.js"></script>
    <link rel="stylesheet" href="/layui/css/layui.css">
    <script src="/layui/layui.js"></script>
</head>
<body>

<!-- 登录页面头部 -->
<div class="logHead">
    <img src="/img/logLOGO.png" />
</div>
<!-- 登录页面头部结束 -->

<!-- 登录body -->
<div class="logDiv">
    <img class="logBanner" src="/img/logBanner.png" />
    <div class="logGet">
        <!-- 头部提示信息 -->
        <div class="logD logDtip">
            <p class="p1">登录</p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;
            <p class="p1 register">去注册</p>
        </div>
        <form id="form">
        <!-- 输入框 -->
            <div class="lgD">
                <img class="img1" src="/img/logName.png" /><input type="text" name="email" placeholder="请输入邮箱" />
            </div>
            <div class="lgD">
                <img class="img1" src="/img/logPwd.png" /><input type="password" name="pwd" placeholder="请输入密码" />
            </div>
            <!-- <div class="lgD logD2">
                <input class="getYZM" type="text" />
                <div class="logYZM">
                    <img class="yzm" src="img/logYZM.png" />
                </div>
            </div> -->
            <div class="logC">
                <button class="button">登 录</button>
            </div>
        </form>
    </div>
</div>
<!-- 登录body  end -->

<!-- 登录页面底部 -->
<!-- <div class="logFoot">
    <p class="p1">版权所有：南京设易网络科技有限公司</p>
    <p class="p2">南京设易网络科技有限公司 登记序号：苏ICP备11003578号-2</p>
</div> -->
<!-- 登录页面底部end -->
</body>
</html>
<script>
    $(function(){
        layui.use('form',function(){
            var form = layui.form;
        });

        // 登陆相关项
        $('.button').click(function(){
            var data = $('#form').serialize();
            $.post(
<<<<<<< HEAD
                'login_do',
=======
                '/login_do',
>>>>>>> 65bd2a36626505745e82b467220d1b7284368e39
                data,
                function(res){
                    layer.msg(res.font,{icon:res.code,time:1500},function(){
                        if(res.code == 1){
                            location.href='/admin/index';
                        }
                    });
                },
                'json'
            );
            return false;
        });

        // 登陆跳转注册页面
        $('.register').click(function(){
            var msg = confirm('注册后需申请才能正常使用，确定注册吗？');
            if (msg == true) {
<<<<<<< HEAD
                location.href='register';
=======
                location.href='/register';
>>>>>>> 65bd2a36626505745e82b467220d1b7284368e39
            }
        });
    });
</script>
