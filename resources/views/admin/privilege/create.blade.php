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
					<div class="layui-card ">
                <p class="display conter " style="padding:10px;border-bottom: 1px solid #E9E9E9";><span action="{{url('admin/privilege/create')}}"  class="tit_h ">添加权限</span></p>
						<div>
							<form class="layui-form">
								<button type="button" id="createData"  class="bianji">保存</button>
								<div id="pub">
									<div>
										<p class="pub_p"><span><i class="color_red">*</i>权限名称：</span><input type="text"  name="pri_name" placeholder="" value=""></p>
										<p class="pub_p"><span><i class="color_red">*</i>控制器：</span><input type="text"  name="controller_name" placeholder="" value=""></p>
										<p class="pub_p"><span><i class="color_red">*</i>模型：</span><input type="text"  name="module_name" placeholder="" value=""></p>
										<p class="pub_p"><span><i class="color_red">*</i>方法：</span><input type="text"  name="action_name" placeholder="" value=""></p>
										<p class="pub_p"><span><i class="color_red">*</i>父类：</span><input type="number"  name="parent_id" placeholder="" value=""></p>
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
		$("#createData").on('click',function () {
            var url='{{url('admin/privilege/createPrivilege')}}';
            var pri_name=$("input[name='pri_name']").val();
            var controller_name=$("input[name='controller_name']").val();
            var module_name=$("input[name='module_name']").val();
            var action_name=$("input[name='action_name']").val();
            var parent_id=$("input[name='parent_id']").val();

            var data={
                'pri_name':pri_name,
                'controller_name':controller_name,
                'module_name':module_name,
                'action_name':action_name,
                'parent_id':parent_id,

            };
            $.post(url,data,function (res) {
                if (res) {
                    alert('添加成功！');
                    location.href='index';
                }else
                    alert('添加失败!');

            })
        })

	</script>
</html>