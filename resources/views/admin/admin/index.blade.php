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
							<a href="{{url('admin/admin/create')}}" data-method="notice" id="daoru" style="background: #3074b7;">添加</a>
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
									<tbody id="show_admin" class="th_td">

									</tbody>
								</table>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
       <div id="admin_page"></div>
	</body>

</html>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/common/layuiadmin/layui/layui.js"></script>
<script>
    GetDataCount();
    function GetDataCount() {
        var searchName=$('.ss_input').val();
        var url = '{{ url('admin/admin/getAdminCount') }}';
        var data = {search : searchName,statu:1};
        $.post(url,data , function (res) {
            layui.use(['laypage'], function () {
                var $ = layui.jquery;
                var laypage = layui.laypage;
                laypage.render({
                    elem: 'admin_page',
                    count: res,
                    layout: [ 'prev', 'page', 'next'],
                    jump: function (obj) {
                        if (res > parseInt(0)){
                            getPage(obj.limit, obj.curr);
                        } else {
                            alert('当前没有数据！');
                        }
                    }
                });
            });
        })
    }
    function deleteOne(id){

        if (confirm('确定要删除吗？')) {
            var url='{{url('admin/admin/deleteOne')}}';
            var data={'id':id};
            $.post(url,data , function (res) {
                if (res) {
                    alert('删除成功！');
                    GetDataCount();
                }else {
                    alert('删除失败！');
                }
            })
        }

    }
    function getPage(pageSize,page) {
        var search=$('.ss_input').val();
        var tr='';
        $.ajax({
            url: '{{url('admin/admin/getAdminList')}}',
            dateType:'json',
            type:'post',
            async:true,
            cache:false,
            data:{
                'search':search,
                'page':page,
                'pageSize':pageSize,
                'statu':'1',
            },
            success:function(res){
                var tr='';
                var list=$.parseJSON(res);
                console.log(list);
                $.each(list,function (k, v) {
                    tr+='<tr>';
                    tr+='<td style="width: 6%;"><input type="checkbox" lay-skin="primary" /></td>';
                    tr+='<td>'+v.admin_id+'</td>';
                    tr+='<td>'+v.compellation+'</td>';
                    tr+='<td>'+v.phone+'</td>';
                    tr+='<td>'+v.job+'</td>';
                    tr+='<td>'+v.username+'</td>';
                    tr+='<td>'+v.password+'</td>';
                    tr+='<td>';
                    tr+='<a  onclick="updateOne('+v.admin_id+');" class="bianji">编辑</a>';
                    tr+='<span onclick="deleteOne('+v.admin_id+');" class="refuse">删除</span>';
                    tr+='</td>';
                    tr+='</tr>';
                });
                $('#show_admin').html(tr);
            },
            error:function (err) {
                alert("数据加载失败");
            }
        });
    }
    function updateOne(id){
        location.href='updateOne?&keyword='+id;
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