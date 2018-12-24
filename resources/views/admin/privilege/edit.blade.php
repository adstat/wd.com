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
                <p class="display conter " style="padding:10px;border-bottom: 1px solid #E9E9E9;><span class="tit_h ">编辑信息</span></p>
						<div>
							<form class="layui-form" action="{{url('admin/privilege/save')}}">
								<div id="pub">
									<div>
										<input type="hidden" name="pri_id" value="{{$data['pri_id']}}">
										<p class="pub_p"><span><i class="color_red">*</i>权限名称：</span><input type="text"  name="pri_name" placeholder="" value="{{$data['pri_name']}}"></p>
										<p class="pub_p"><span><i class="color_red">*</i>控制器：</span><input type="text"  name="controller_name" placeholder="" value="{{$data['controller_name']}}"></p>
										<p class="pub_p"><span><i class="color_red">*</i>模型：</span><input type="text"  name="module_name" placeholder="" value="{{$data['module_name']}}"></p>
										<p class="pub_p"><span><i class="color_red">*</i>方法：</span><input type="text"  name="action_name" placeholder="" value="{{$data['action_name']}}"></p>
										<p class="pub_p"><span><i class="color_red">*</i>父类：</span><input type="text"  name="parent_id" placeholder="" value="{{$data['parent_id']}}"></p>
									</div>
								</div>
                                <button type="submit"  class="bianji">保存</button>
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