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
                <cite>用户名</cite>
            </a>
            <dl class="layui-nav-child">
            <!--<dd><a lay-href="{{ url('admin/reset_password/show') }}">修改密码</a></dd>-->
                <dd><a >修改密码</a></dd>
            </dl>
        </li>

        <li class="layui-nav-item" lay-unselect>
            <a href="javascript:;" id="logout-button">退出</a>
        </li>
    </ul>
</div>