<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>待处理</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">

		<link rel="stylesheet" href="/common/layuiadmin/layui/css/layui.css" media="all">
		<link rel="stylesheet" href="/common/layuiadmin/style/admin.css" media="all">
		<link rel="stylesheet" href="/css/public.css" />
		<link rel="stylesheet" type="text/css" href="/css/new_file.css" />
		<style>
			.active_refuse{
				background: #e6e3e3;
				color:#444444 ;
			}
			td {
				text-align: center;
			}
			
			.odd_a>th:nth-child(even) {
				background: white!important;
			}
			
			.odd_a>th:nth-child(odd) {
				width: 13%!important;
			}
			
			.layui-table2 {
				margin: 0!important;
				margin-left: 20px!important;
				width: 96%;
			}
			
			.jinyong {
				background: #999999;
			}
			
			.layui-form-checkbox {
				border-left: 1px solid #d2d2d2!important;
			}
			
		
		</style>
	</head>

	<body>
		<div class="layui-fluid">
			<div class="layui-row layui-col-space15">
				<div class="layui-col-md12">
					<div class="layui-card" style="padding:15px;">
						<div class="display conter " id="flgl" style="margin-bottom: 20px;">
							<p>
								<input class="ss_input" style="" type="text" placeholder="搜索关键字">
								<button class="search_admin">搜索</button>
							</p>
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
											<th style="width: 6%;"><input type="checkbox" lay-skin="primary" lay-filter="allChoose" /></th>
											<th style="width: 4%;">序号</th>
											<th>头像</th>
											<th>用户名</th>
											<th>联系电话</th>
											<th>账户余额</th>
											<th>提现金额</th>
											<th>支付宝账户/真实姓名</th>
											<th>申请时间</th>
											<th>操作</th>
										</tr>
									</thead>
									<tbody id="show_dcl">

									</tbody>
								</table>
							</div>
						</form>
						
					</div>

				</div>
			</div>
		</div>

		<div id="dcl_page"></div>
	</body>

</html>
<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
<script src="/common/layuiadmin/layui/layui.js"></script>
<script>
    // $(ducoment).ready(function () {
    //    alert(111)
    // });
    GetDataCount();
    function GetDataCount() {
        var searchName=$('.ss_input').val();
        var url = '{{ url('admin/wallet/getWalletCount') }}';
        var data = {search : searchName,statu:1};
        $.post(url,data , function (res) {
            layui.use(['laypage'], function () {
                var $ = layui.jquery;
                var laypage = layui.laypage;
                laypage.render({
                    elem: 'dcl_page',
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
    function getPage(pageSize,page) {
        var search=$('.ss_input').val();
        var tr='';
        $.ajax({
            url: '{{url('admin/wallet/getWalletList')}}',
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
                $.each(list,function (k, v) {
                    tr+='<tr>';
                    tr+='<td style="width: 6%;"><input type="checkbox" lay-skin="primary" /></td>';
                    tr+='<td>'+v.wallet_id+'</td>';
                    tr+='<td><img src="'+v.face+'" alt="" class="hd_img" /></td>';
                    tr+='<td>'+v.nickname+'</td>';
                    tr+='<td>'+v.phone+'</td>';
                    tr+='<td>￥'+v.balance+'</td>';
                    tr+='<td>￥'+v.deposit+'</td>';
                    tr+='<td>'+(v.account='null'?'没有脚印':v.account)+'</br>'+v.username+'</td>';
                    tr+='<td>'+v.time+'</td>';
                    tr+='<td>';
                        tr+='<span onclick="updateOne('+v.wallet_id+','+v.member_id+','+v.deposit+',1);" class="bianji">同意</span>';
                        tr+='<span onclick="updateOne('+v.wallet_id+','+v.member_id+','+v.deposit+',0);" class="refuse">拒绝</span>';
                    tr+='</td>';
                    tr+='</tr>';
                });
                $('#show_dcl').html(tr);
            },
            error:function (err) {
                alert("数据加载失败");
            }
        });
    }
    function updateOne(wallet_id,member_id,deposit,statu){
        if (confirm('确定要更改吗？')) {
            var url = '{{ url('admin/wallet/getUpdateOne') }}';
            var data = {statu : statu,wallet_id:wallet_id,deposit:deposit,member_id:member_id,walletStatu:1};
            $.post(url,data , function (res) {
                if (res) {
                    alert('更改成功！');
                    GetDataCount();
                }else {
                    alert('更改失败！');
                }
            })
        }

    }
</script>