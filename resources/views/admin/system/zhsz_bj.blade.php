<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>账号设置-编辑</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/common/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/common/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="/css/public.css" />
		<link rel="stylesheet" type="text/css" href="/css/new_file.css" />
		<style>
			#pub {
				margin-left: 4%;
				padding-top: 26px;
				min-height: 80vh;
			}
			
			#pub>div>p {
				padding: 8px 0;
			}
			
			#pub>div>p>input {
				padding: 8px 8px;
				width: 300px;
				font-size: 14px;
				border: 1px solid #bbb;
				border-radius: 6px;
			}
			
			#pub>div>div {
				margin: 15px 0;
			}
			
			.limits-list:first-child {
				width: 0;
			}
			
			.limits-list {
				width: 14%;
				font-size: 14px;
			}
			
			.ptgl-list {
				padding-left: 20%;
				width: 120%;
				display: none;
			}
			
			.limits-list span {
				margin-left: 5px;
			}
			
			.ptgl-list li {
				margin: 10px 0;
			}
			
			.limits-list img {
				width: 20px;
			}
			
			.pub_p span {
				width: 85px;
				display: inline-block;
			}
		</style>
	</head>

	<body>

		<div class="layui-fluid">
			<div class="layui-row layui-col-space15">
				<div class="layui-col-md12">
					<div class="layui-card" ">
                <p class="display conter " style="padding:10px;border-bottom: 1px solid #E9E9E9;><span class="tit_h ">编辑信息</span><span class="bianji">保存</span></p>
						<div>
							<form class="layui-form" action="">
								<div id="pub">
									<div>
										<p class="pub_p"><span><i class="color_red">*</i>员工姓名：</span><input type="text" placeholder="" value=""></p>

										<p class="pub_p"><span><i class="color_red">*</i>手机号：</span><input type="text" placeholder="" value=""></p>

										<p class="pub_p"><span><i class="color_red">*</i>职位：</span><input type="text" placeholder="" value=""> </p>

										<p class="pub_p"><span><i class="color_red">*</i>账号：</span><input type="text" placeholder="" value=""> </p>

										<p class="pub_p"><span><i class="color_red">*</i>密码：</span><input type="text" placeholder="" value=""> </p>

										<p><span><i class="color_red">*</i>编辑权限：</span></p>
											<div class="display limits">
											<div class="limits-list"></div>
											<div class="limits-list">
												<img src="images/plus.png" /><input type="checkbox" name="limit" lay-skin="primary"><span>桌面</span>
												<ul class="ptgl-list">
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>我的桌面</span></li>
												</ul>
											</div>
											<div class="limits-list">
												<img src="images/plus.png" /><input type="checkbox" name="limit" lay-skin="primary"><span>会员</span>
												<ul class="ptgl-list">
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>普通会员</span></li>
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>答主管理</span></li>
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>答主审核</span></li>
												</ul>
											</div>
											<div class="limits-list">
												<img src="images/plus.png" /><input type="checkbox" name="limit" lay-skin="primary"><span>内容</span>
												<ul class="ptgl-list">
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>问答管理</span></li>
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>主体管理</span></li>
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>观点管理</span></li>
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>圈子管理</span></li>
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>举报管理</span></li>
												</ul>
											</div>
											<div class="limits-list">
												<img src="images/plus.png" /><input type="checkbox" name="limit" lay-skin="primary"><span>订单</span>
												<ul class="ptgl-list">
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>订单管理</span></li>
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>投诉管理</span></li>
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>退款管理</span></li>
												</ul>
											</div>
											<div class="limits-list">
												<img src="images/plus.png" /><input type="checkbox" name="limit" lay-skin="primary"><span>提现</span>
												<ul class="ptgl-list">
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>待处理</span></li>
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>待打款</span></li>
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>已打款</span></li>
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>已拒绝</span></li>
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>提现设置</span></li>
												</ul>
											</div>
											<div class="limits-list">
												<img src="images/plus.png" /><input type="checkbox" name="limit" lay-skin="primary"><span>系统</span>
												<ul class="ptgl-list">
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>敏感词设置</span></li>
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>账号设置</span></li>
													<li><input type="checkbox" name="limit" lay-skin="primary"><span>支付配置</span></li>
												</ul>
											</div>
										</div>
								
									</div>

								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="/common/layuiadmin/layui/layui.all.js"></script>
	<script src="/js/jquery-2.1.4.min.js"></script>
	<script>
	 function getQueryString(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return decodeURI(r[2]); return null;
    }
    var str = getQueryString("id");
    var order_id = str;
    console.log(order_id)
    
 
		$(".limits-list img").click(function() {
			$(this).siblings(".ptgl-list").toggle();
			if($(this).attr("src") == "images/plus.png") {
				$(this).attr("src", "images/min.png");
			} else {
				$(this).attr("src", "images/plus.png");
			}

		})

		$(".limits-list>div").click(function() {
			if($(".limits-list>div").hasClass("layui-form-checked")) {
				$(this).siblings(".ptgl-list").find("div").addClass("layui-form-checked")
			} else {
				$(this).siblings(".ptgl-list").find("div").removeClass("layui-form-checked")
			}
		});
	</script>

</html>