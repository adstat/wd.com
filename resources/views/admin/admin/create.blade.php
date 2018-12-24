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
                <p class="display conter " style="padding:10px;border-bottom: 1px solid #E9E9E9";><span action="{{url('admin/admin/create')}}"  class="tit_h ">添加信息</span></p>
						<div>
							<form class="layui-form">
								<button type="button" id="createData"  class="bianji">保存</button>
								<div id="pub">
									<div>
										<p class="pub_p"><span><i class="color_red">*</i>用户名：</span><input type="text"  name="username" placeholder="" value=""></p>
										<p class="pub_p"><span><i class="color_red">*</i>员工姓名：</span><input type="text"  name="compellation" placeholder="" value=""></p>
										<p class="pub_p"><span><i class="color_red">*</i>手机号：</span><input type="text" name="phone" placeholder="" value=""></p>
										<p class="pub_p"><span><i class="color_red">*</i>职位：</span><input type="text" name="job" placeholder="" value=""> </p>
										<p class="pub_p"><span><i class="color_red">*</i>密码：</span><input type="password" name="password" placeholder="" value=""> </p>
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
            var url='{{url('admin/admin/createAdmin')}}';
            var username=$("input[name='username']").val();
            var compellation=$("input[name='compellation']").val();
            var phone=$("input[name='phone']").val();
            var job=$("input[name='job']").val();
            var password=$("input[name='password']").val();
            var data={
                'username':username,
                'compellation':compellation,
                'phone':phone,
                'job':job,
                'password':password,
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