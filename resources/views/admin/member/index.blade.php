<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>会员信息</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link rel="stylesheet" href="/common/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/common/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="/css/public.css" />
		<link rel="stylesheet" type="text/css" href="/css/new_file.css" />
		<style>
			td {
				text-align: center;
			}			
			.odd_a>th:nth-child(even){
				background: white!important;
				    /*width: 25%;*/
			}
			.odd_a>th:nth-child(odd){
				width: 13%!important;
			}
			.layui-table2{
				margin: 0!important;
			    margin-left: 20px!important;
			    width: 96%;
			}
			.jinyong{
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
						<div class="display conter" id="flgl" style="margin-bottom: 20px;">
							<p>
						    	<input name="search" class="ss_input" style="" type="text" placeholder="搜索用户名/公司名/职位">
						    	<button class="search_admin">搜索</button>
					        </p>
							<button data-method="notice" id="detain">批量禁用</button>
						</div>
                        <div id="show_time" hidden>
                            <div class="layui-progress">
                                <div class="layui-progress-bar layui-bg-red" lay-percent="20%"></div>
                            </div>
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
											<th>头像</th>
											<th>用户名</th>
											<th>公司/职位</th>
											<th>问题/答案/主题/讨论/观点</th>
											<th>是否接受咨询</th>
											<th>注册时间</th>
											<th>操作</th>
										</tr>
									</thead>
									<tbody id="member_list">
									</tbody>
								</table>
                           </div>
                         </form>
					</div>

				</div>
			</div>
		</div>
        <div id="info"></div>
		<div id="pages"></div>
	</body>
</html>
<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
<script src="/common/layuiadmin/layui/layui.js"></script>
<script>
    
	layui.use('upload', function() {
		var $ = layui.jquery,
			upload = layui.upload;
		var uploadInst = upload.render({
			elem: '#test3',
			url: '/upload/',
			before: function(obj) {
				//预读本地文件示例，不支持ie8
				obj.preview(function(index, file, result) {
					$('#demo3').attr('src', result);
				});
			}
		});
	})
	layui.config({
		base: '/common/layuiadmin/' //静态资源所在路径
	}).extend({
		index: 'lib/index' //主入口模块
	}).use(['index', 'form', 'layedit', 'laydate'], function() {
		var form = layui.form,
			$ = layui.$;
		//全选
		form.on('checkbox(allChoose)', function(data) {
			var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]');
			child.each(function(index, item) {
				item.checked = data.elem.checked;
			});
			form.render("checkbox");
		})
	})

	$("#tianjia").click(function(){
		$("#tc").css({"display":"block"})
	})


	$("#baocun").click(function(){
		$("#tc").css({"display":"none"})
	})
	$("#quxiao").click(function(){
		$("#tc").css({"display":"none"})
	})
	$(".shanchu").click(function(){
		$(this).addClass("jinyong")
	})
	$("tbody margin_left").click(function(){
		$(this).parent().parent().remove()
	})
	$(document).ready(function () {
	    // getPage();
        GetDataCount();
    });
    function GetDataCount() {
        var url = '{{ url('admin/member/getCountPage') }}';
        data = {searchName : $(".ss_input").val()};
        $.post(url,data , function (res) {
            layui.use(['laypage'], function () {
                var laypage = layui.laypage;
                laypage.render({
                    elem: 'pages',
                    count: res,
                    layout: [ 'prev', 'page', 'next'],
                    jump: function (obj) {
                        getPage(obj.limit, obj.curr);
                    }
                });
            });
        })
    }

    function getPage(pageSize,page) {
        // var search=$('input[name="search"]').val();
        $.ajax({
            url: '{{url('admin/member/getPage')}}',
            dateType:'json',
            type:'post',
            async:false,
            cache:false,
            data:{
                // 'search':search,
                'page':page,
                'pageSize':pageSize,
            },
            success:function(res){
                var tr='';
                var msg=$.parseJSON(res);
                var info='';
                $.each(msg,function (k, v) {
                    tr+='<tr>';
                    tr+='<td><input type="checkbox" lay-skin="primary"/></td>';
                    tr+='<td>'+v.member_id+'</td>';
                    tr+='<td><img src="'+v.face+'" alt="" class="hd_img"/></td>';
                    tr+='<td>'+v.nickname+'</td>';
                    tr+='<td>'+v.jobing+'</td>';
                    tr+='<td>'+v.comment_num+'/'+v.return_comment_num+'/'+v.theme_num+'/'+v.discussion_num+'/'+v.idea_num+'</td>';
                    tr+='<td>'+(v.is_consult=1?'是':'否')+'/'+v.consult_price+'</td>';
                    tr+='<td>'+v.create_time+'</td>';
                    tr+='<td><span onclick="ShowInfo('+v.member_id+')" class="bianji">查看</span><span onclick="showRemove('+v.member_id+')" class="shanchu">禁用</span></td>';
                    tr+='</tr>';

                    info+='<div id="tc_'+v.member_id+'" hidden>';
                        info+='<div style="" id="eject">';
                            info+='<button onclick="closes('+v.member_id+')" class="closeBtn" id="gaga'+v.member_id+'">X</button>';
                            info+='<p class="tc_content" style=" margin-bottom: 20px;">会员详情</p>';
                                info+='<table class="layui-table layui-table2" lay-size="lg">';
                                info+='<colgroup>';
                                info+='<col width="150">';
                                info+='<col width="200">';
                                info+='<col>';
                                info+='</colgroup>';
                                info+='<thead>';
                                    info+='<tr class="odd_a">';
                                    info+='<th style="width: 13%;">用户名/姓名/性别/手机号</th>';
                                    info+='<th>'+v.nickname+'/'+v.username+'/'+(v.sex=='1'?'男':'女')+'/'+v.phone+'</th>';
                                    info+='<th>公司/职位</th>';
                                    info+='<th>'+v.jobing+'</th>';
                                    info+='<th>邮箱</th>';
                                    info+='<th>'+v.email+'</th>';
                                    info+='</tr>';
                    				info+='<tr class="odd_a">';
                    				info+='<th>圈子</th>';
                    				info+='<th>'+v.garden+'</th>';
                    				info+='<th>问题/答案/主题/讨论/观点</th>';
                    				info+='<th>'+v.comment_num+'/'+v.return_comment_num+'/'+v.theme_num+'/'+v.discussion_num+'/'+v.idea_num+'</th>';
                    				info+='<th>时间</th>';
                    				info+='<th>'+v.create_time+'</th>';
                    				info+='</tr>';
                                    info+='<tr class="odd_a">';
                                    info+='<th>是否接受咨询</th>';
                                    info+='<th>'+v.is_consult+'</th>';
                                    info+='<th>咨询价格</th>';
                                    info+='<th>'+v.consult_price+'</th>';
                                    info+='<th>接受咨询次数/喜欢次数</th>';
                                    info+='<th>'+v.consult_num+'/'+v.live_num+'</th>';
                                    info+='</tr>';
                                info+='</thead>';
                                info+='<tbody>';
                                info+='</tbody>';
                                info+='</table>';
                                info+='<table  class="layui-table layui-table2" style="margin-bottom: 20px!important;" lay-size="lg">';
                                info+='<thead>';
                                    info+='<tr class="odd_a">';
                                    info+='<th style="width: 13%!important;">答主描述</th>';
                                    info+='<th>'+v.describe+'</th>';
                                    info+='</tr>';
                                    info+='<tr class="odd_a">';
                                    info+='<th style="width: 13%!important;">教育经历</th>';
                                    info+='<th>'+v.schoolName+'</th>';
                                    info+='</tr>';
                                    info+='<tr class="odd_a">';
                                    info+='<th style="width: 13%!important;">工作经历</th>';
                                    info+='<th>'+v.job+'</th>';
                                    info+='</tr>';
                                info+='</thead>';
                                info+='</table>';
                        info+='</div>';
                    info+='</div>';
                });
                $("#member_list").html(tr);
                $(".layui-fluid").append(info);
            },
            complete:function () {
                // showPage(memberCount);
            },
            beforeSend:function () {
                $("#show_time").show();
            },
            error:function (err) {
                alert("数据加载失败");
            }
        });
    }
    $(".search_admin").on('click',function () {
        GetDataCount();
    });

    function ShowInfo(flag){
        $("#tc_"+flag).show();
	    $("#tc_"+flag).css({'display':'block'});
    }
    function showRemove(flag) {
        var url='{{ url('admin/member/getRemove') }}';
        var data={'flag':flag};
        $.post(url,data,function (res) {
            console.log(res);
            if (res == parseInt(1)) {
                alert('更新成功！');
                location.reload();
            }else {
                alert('更新失败！');
                location.reload();
            }
        })
    }
    function closes(flag) {
            $("#tc_"+flag).hide();
    }


</script>