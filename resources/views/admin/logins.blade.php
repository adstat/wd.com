
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" href="{{asset('Admin/css/public.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/login.css')}}">
</head>
<body>
<div class="login-page">
    <img class="login-back-img" src="{{asset('Admin/images/back.png')}}"/>
    <div class="login-back"></div>
    <canvas id="cas"></canvas>
    <div class="login-wrap">
        <div class="login-box">
            <img class="login-logo" src="{{asset('Admin/images/baotaohong.png')}}" style="width: 100px;height: 50px"/>
            <p class="login-tit">打通社区“最后一公里”满足民生需求，是我们的追求！</p>
            <div class="login-input">
                <img src="{{asset('Admin/images/zh.png')}}"/>
                <input type="text" name="username" id="admin_account" placeholder="请输入账号" />
            </div>
            <div class="login-input last">
                <img src="{{asset('Admin/images/pass.png')}}"/>
                <input type="password" name="password" id="admin_password" placeholder="请输入登录密码" />
            </div>
            <div class="submit-btn" id="submit">登录</div>
        </div>
    </div>
</div>
<script src="{{asset('Admin/js/canvas.js')}}"></script>
</body>
</html>

<script src="{{asset('resources/assets/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('resources/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('resources/assets/layer/layer.js')}}"></script>
<script type="text/javascript">

    $(function () {
        $("#admin_password").focus(function () {
            $(document).keypress(function (e) {
                // 回车键事件
                if (e.which == 13) {
                    $("#submit").click();
                }
            });
        });
        $("#submit").click(function () {
            var admin_account = $("#admin_account").val();
            var admin_password = $("#admin_password").val();
            if (admin_account != '' && admin_password != '') {
                var url = "{{ url('admin/validate_login') }}";
                var data = {
                    'admin_account': admin_account,
                    'admin_password': admin_password
                };
                $.post(url, data, function (res) {
                    if (res.status == 1) {
                        layer.msg('登陆成功，正在跳转!', {time: 1500}, function () {
                            window.location.href = '{{url('')}}/'+res[0].mod_route+'?fid='+res[0].mod_pid+'&sid='+res[0].mod_id;
                        });
                    } else if (res.status == 0) {
                        layer.msg('密码错误，请重试!', {time: 1500});
                        $("#admin_password").val('');
                        $("#admin_password").focus();
                        return;
                    } else if (res.status == 2) {
                        layer.msg('账号不存在!', {time: 1500});
                        $("#admin_account").val('');
                        $("#admin_password").val('');
                        $("#admin_account").focus();
                        return;
                    } else {
                        layer.msg(res.msg);
                    }
                }, "json")
            } else {
                layer.msg('账号或者密码不能为空!', {time: 1500});
                return;
            }
        })
    })


</script>