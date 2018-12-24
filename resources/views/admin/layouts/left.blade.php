<!-- 侧边菜单 -->
<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo" style="background-color:#3A3D49 !important;">
            <div class="head">
                <p>WENLANG</p>
            </div>
        </div>
        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
            <!--<li data-name="home" class="layui-nav-item layui-this">
                <a lay-href="/admin/index" lay-tips="主页" lay-direction="2">
                    <i class="layui-icon layui-icon-home"></i>
                    <cite>主页</cite>
                </a>
            </li>-->
            <li data-name="pointcuts" class="layui-nav-item">
                <a lay-href="{{url('admin/index/icon')}}" lay-tips="后台主页" lay-direction="2">
                    <i class="layui-icon layui-icon-home"></i>
                    <cite>后台主页</cite>
                </a>
            </li>
            <li data-name="articles-and-cats" class="layui-nav-item">
                <a href="javascript:;" lay-tips="会员管理" lay-direction="2">
                    <i class="layui-icon layui-icon-username"></i>
                    <cite>会员管理</cite>
                </a>
                <dl class="layui-nav-child">

                    <dd data-name="articles">
                        <a lay-href="{{url('admin/member/index')}}">会员信息</a>
                    </dd>
                    <dd data-name="cats">
                        <a lay-href="wtfk.html">问题反馈</a>
                    </dd>
                </dl>
            </li>
            <li data-name="pointcuts" class="layui-nav-item">
                <a  href="javascript:;"  lay-tips="内容管理" lay-direction="2">
                    <i class="layui-icon layui-icon-template-1"></i>
                    <cite>内容管理</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/questions/index')}}">问答管理</a>
                    </dd>
                    <dd data-name="articles" >
                        <a lay-href="{{url('admin/theme/index')}}">主题管理</a>
                    </dd>
                    <dd data-name="articles">
                        <a lay-href="{{url('admin/idea/index')}}">观点管理</a>
                    </dd>
                    <dd data-name="articles">
                        <a lay-href="{{url('admin/garden/index')}}">圈子管理</a>
                    </dd>
                    <dd data-name="articles">
                        <a lay-href="{{url('admin/topic/index')}}">话题管理</a>
                    </dd>
                    <dd data-name="articles">
                        <a lay-href="{{url('admin/report/index')}}">举报管理</a>
                    </dd>
                </dl>
            </li>
            <li data-name="feedback" class="layui-nav-item">
                <a href="javascript:;" lay-tips="订单管理" lay-direction="2">
                    <i class="layui-icon layui-icon-form"></i>
                    <cite>订单管理</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/consult/index')}}">咨询订单</a>
                    </dd>
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/inquire/index')}}">打听订单</a>
                    </dd>
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/overdue/index')}}">过期咨询</a>
                    </dd>
                </dl>
            </li>
            <li data-name="news" class="layui-nav-item">
                <a href="javascript:;"  lay-tips="提现管理" lay-direction="2">
                    <i class="layui-icon layui-icon-template-1"></i>
                    <cite>提现管理</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/wallet/index?statu=1')}}">待处理</a>
                    </dd>
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/wallet/index?statu=2')}}">待打款</a>
                    </dd>
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/wallet/index?statu=3')}}">已打款</a>
                    </dd>
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/wallet/index?statu=4')}}">已拒绝</a>
                    </dd>
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/wallet/setwallet')}}">提现设置</a>
                    </dd>
                </dl>
            </li>
            <li data-name="articles-and-cats" class="layui-nav-item">
                <a href="javascript:;" lay-tips="系统设置" lay-direction="2">
                    <i class="layui-icon  layui-icon-set"></i>
                    <cite>系统设置</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/system/sensitivity')}}">敏感词设置</a>
                    </dd>
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/system/setuser')}}">账号设置</a>
                    </dd>
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/system/setplay')}}">支付配置</a>
                    </dd>
                </dl>
            </li>
            <li data-name="articles-and-cats" class="layui-nav-item">
                <a href="javascript:;" lay-tips="权限管理" lay-direction="2">
                    <i class="layui-icon  layui-icon-set"></i>
                    <cite>权限管理</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/role/index')}}">角色管理</a>
                    </dd>
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/admin/index')}}">管理员管理</a>
                    </dd>
                    <dd data-name="cats">
                        <a lay-href="{{url('admin/privilege/index')}}">权限分配</a>
                    </dd>
                </dl>
            </li>
            <!--  <li data-name="news" class="layui-nav-item">
                  <a href="javascript:;"  lay-tips="账号管理" lay-direction="2">
                      <i class="layui-icon layui-icon-reply-fill"></i>
                      <cite>账号管理</cite>
                  </a>
                  <dl class="layui-nav-child">
                      <dd data-name="cats">
                          <a lay-href="tjxx.html">账号信息</a>
                      </dd>
                  </dl>
              </li>
              -->
        </ul>
    </div>
</div>