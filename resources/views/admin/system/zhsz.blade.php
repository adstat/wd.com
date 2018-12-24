<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>账号设置</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">

		<link rel="stylesheet" href="/common/layuiadmin/layui/css/layui.css" media="all">
		<link rel="stylesheet" href="/common/layuiadmin/style/admin.css" media="all">
		<link rel="stylesheet" href="/css/public.css" />
		<link rel="stylesheet" href="/css/new_file.css" />

		<style type="text/css">
			.layui-input,
			.layui-select,
			.layui-textarea {
				height: 30px!important;
				border-radius: 6px;
				border: 1px solid #bbb;
			}
			
			.yyzz {
				width: 70px;
				height: 90px;
			}
			
			.th_td td {
				text-align: center;
			}
			
			
		</style>
	</head>

	<body>

		<div class="layui-fluid">
			<div class="layui-row layui-col-space15">
				<div class="layui-col-md12">
					<div class="layui-card" style="padding:15px;">
						<div class="display conter" id="flgl" style="margin-bottom: 20px;">
							<p>
								<span class="daan" style="margin-left: 20px;">账号设置</span>
							</p>
							<button data-method="notice" id="detain2" style="position: absolute;right: 120px;">批量删除</button>
							<button data-method="notice" id="daoru" style="background: #3074b7;">添加</button>
						</div>
						<form class="layui-form">
							<div class="banner_con dis">
								<table class="layui-table" lay-size="lg">
									<colgroup>
										<col width="150">
										<col width="200">
										<col>
									</colgroup>
									<thead>
										<tr>
											<th style="width: 6%;"><input type="checkbox" lay-skin="primary" lay-filter="allChoose"/></th>
											<th style="width: 4%;">序号</th>
											<th>员工姓名</th>
											<th>手机号</th>
											<th>职位</th>
											<th>账号</th>
											<th>密码</th>
											<th>操作</th>
										</tr>
									</thead>
									<tbody class="th_td">
										<tr>
											<td style="width: 6%;"><input type="checkbox" lay-skin="primary" /></td>
											<td>1</td>
											<td>离DJ</td>
											<td>18738864290</td>
											<td>销售</td>
										    <td>root</td>
										    <td>123456789</td>
											<td>
										
													<span class="bianji">
														编辑
													</span>
												
												<span class="shanchu">删除</span>
											</td>
										</tr>
										<tr>
											<td style="width: 6%;"><input type="checkbox" lay-skin="primary" /></td>
											<td>1</td>
											<td>离DJ</td>
											<td>18738864290</td>
											<td>销售</td>
										    <td>root</td>
										    <td>123456789</td>
											<td>
												<span class="bianji">编辑</span>
												<span class="shanchu">删除</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
       <div id="demo3"></div>
	</body>

</html>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/common/layuiadmin/layui/layui.js"></script>
<script>
	getAdmin();
function getAdmin(){
    var url = "{{ url('admin/validate_login') }}";
    var data = {
        'admin_account': admin_account,
        'admin_password': admin_password
    };
    $.post(url,data,function (res) {
		console.log(res);
    })
}
	//全选
	layui.config({
		base: '/common/layuiadmin/' //静态资源所在路径
	}).extend({
		index: 'lib/index' //主入口模块
	}).use(['index', 'form', 'layedit', 'laydate'], function() {
		var form = layui.form,
			$ = layui.$;
		form.on('checkbox(allChoose)', function(data) {
			var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]');
			child.each(function(index, item) {
				item.checked = data.elem.checked;
			});
			form.render("checkbox");
		})
	})
	var $ = layui.jquery
	

</script>