
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <script src="/js/jquery-2.1.4.min.js"></script>
    <script src="/common/layuiadmin/layui/layui.js"></script>
    <link rel="stylesheet" href="/common/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/common/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="/css/public.css" />
    <style type="text/css">
        .head p{width:100%;font-size:24px;margin-top: 25px;}
        .mag_x{color: #444444;background: #eaeaea;width: 200px;padding: 0 10px;display: none;}
        .mag_x ul li{border-bottom: 1px solid #c3bdbd;padding-left: 15px;}
        .mag_x ul li:last-child{border-bottom:none;}
        .mag_x ul li i{font-style: normal;float: right;margin-right: 15px;color: #f33838;}

    </style>
    @yield('styles')

</head>
<body class="layui-layout-body">

<div id="LAY_app">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <!-- 头部区域 -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item layadmin-flexible" lay-unselect>
                    <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
                        <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
                    </a>
                </li>
                <li class="layui-nav-item layadmin-flexible" lay-unselect>
                    <p class="color-4">欢迎来到问浪后台</p>
                </li>
            </ul>
            <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">

                <li class="layui-nav-item" lay-unselect>
                    <a href="javascript:;" layadmin-event="refresh" title="刷新">
                        <i class="layui-icon layui-icon-refresh-3"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="notice" title="消息" class="xx_hover">
                        <i class="layui-icon layui-icon-notice" ></i>
                    </a>
                    <div class="mag_x">
                        <ul>
                            <li>待审核体现数 <i>(0)</i></li>
                            <li>待审核体现数 <i>(0)</i></li>
                            <li>待审核体现数 <i>(0)</i></li>
                        </ul>
                    </div>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="theme">
                        <i class="layui-icon layui-icon-theme"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="note">
                        <i class="layui-icon layui-icon-note"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="fullscreen">
                        <i class="layui-icon layui-icon-screen-full"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect>
                    <a href="javascript:;">
                        <cite>{{$username}}</cite>
                    </a>
                    <dl class="layui-nav-child">
                    <!--<dd><a lay-href="{{ url('admin/reset_password/show') }}">修改密码</a></dd>-->
                        <dd><a >修改密码</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item" lay-unselect>
                    <a href="{{url('admin/admin/logout')}}" id="logout-button">退出</a>
                </li>
            </ul>
        </div>

        <!-- 侧边菜单 -->
    @include('admin.layouts.left')

        <!-- 页面标签 -->
        <div class="layadmin-pagetabs" id="LAY_app_tabs">
            <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-down">
                <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
                    <li class="layui-nav-item" lay-unselect>
                        <a href="javascript:;"></a>
                        <dl class="layui-nav-child layui-anim-fadein">
                            <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                            <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                            <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>

            <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
                <ul class="layui-tab-title" id="LAY_app_tabsheader">
                    <li lay-id="home/console.html" lay-attr="home/console.html" class="layui-this"><i class="layui-icon layui-icon-home"></i></li>
                </ul>
            </div>
        </div>


        <!-- 主体内容 -->


        <div class="layui-body" id="LAY_app_body">
            <div class="layadmin-tabsbody-item layui-show">
                {{--<iframe src="{{url('admin/index/body')}}" frameborder="0" class="layadmin-iframe">--}}
                    {{----}}
                {{--</iframe>--}}
                @yield('content')
            </div>
        </div>
        @section('scripts')


        <!-- 辅助元素，一般用于移动设备下遮罩 -->
        <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
</div>
<!--<script src="js/jquery-2.1.4.min.js"></script>-->
<script>
    //	$("xx_hover").mouseover(function(){
    //	  $(".mag_x").css("display","block");
    //	})
    layui.config({
        base: '/common/layuiadmin/' //静态资源所在路径
    }).extend({
        index: '/lib/index' //主入口模块
    }).use(['index','layer'],function () {
        var $ = layui.$,
            layer = layui.layer;

        var active = {
            logout:function () {
                layer.confirm('确认退出吗？',function () {
                    location.href = "{{ url('admin/logout') }}";
                })
            },
        };
        $("#logout-button").on('click',function () {
            active.logout();
        })
    });
</script>
</body>
</html>


