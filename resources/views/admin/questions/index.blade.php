<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>问答管理</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
        {{--<script src="/js/jquery-2.1.4.min.js"></script>--}}
        <script src="/js/jquery.js"></script>
        <script src="/common/layuiadmin/layui/layui.js"></script>
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
								<input name="search" class="ss_input" style="" type="text" placeholder="搜索关键词">
								<button class="search_admin">搜索</button>
							</p>
							<button data-method="notice" id="detain2" style="position: absolute;right: 120px;">批量删除</button>
							<button data-method="notice" id="daoru">数据库导入</button>
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
											<th style="width: 6%;">
												<input type="checkbox" lay-skin="primary" lay-filter="allChoose"/>
											</th>
											<th style="width: 4%;">序号</th>
											<th>头像</th>
											<th style="width: 10%;">用户名</th>
											<th>图片</th>
											<th style="width: 25%;">问题标题</th>
											<th>答案</th>
											<th>提问时间</th>
											<th>操作</th>
										</tr>
									</thead>
									<tbody id="showQues" class="th_td">

								    </table>

							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
        <div id="demo3"></div>
        <div id="pages"></div>
        <div id="info"></div>
		<div id="tc">
			<div id="eject" style="width:60%;left:21%;top:26%;">
				<button class="closeBtn" id="quxiao">X</button>
				<p id="tc_tit" class="tc_content">问题详情</p>
				<div class="hdgl_p" style="max-height:580px;overflow: auto;">
					<p class="hdgl_line"><b>标题：</b><i>几点发货给大润发涂鸦胬耳朵也更符合东方红蛋糕觉得舒服的手机号</i></p>
				    <p class="hdgl_line"><b>描述：</b><i>几点发货给大润发涂鸦胬耳朵也更符合东方红蛋糕觉得舒服的手机号几点发货给大润发涂鸦胬耳朵也更符合东方红蛋糕觉得舒服的手机号</i></p>
                    <p class="hdgl_line">
                    	<b>图片：</b>
                    	<img src="/images/tp.png" alt="" width="120px" height="120px"/>
                    </p>
			    </div>
		   </div>
       </div>
        <div id="dome1"></div>
	</body>

</html>


<script>
    GetDataCount();
    function GetDataCount() {
        // var searchName=$(".ss_input").value;
        var searchName=$('input[name="search"]').val();
        var url = '{{ url('admin/questions/getQuestionsCount') }}';
        var data = {searchName : searchName};
        $.post(url,data , function (res) {
            console.log(res);
            layui.use(['laypage'], function () {
                var $ = layui.jquery
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
        var search=$('.ss_input').val();
        var tr='';
        $.ajax({
            url: '{{url('admin/questions/getQuestionsList')}}',
            dateType:'json',
            type:'post',
            async:true,
            cache:false,
            data:{
                'search':search,
                'page':page,
                'pageSize':pageSize,
            },
            success:function(res){
                var tr='';
                var html='';
                var list=$.parseJSON(res);

                // console.log(res);
                $.each(list,function (k, v) {
					tr+='<tr>';
					tr+='<td style="width: 6%;"><input type="checkbox" lay-skin="primary"/></td>';
					tr+='<td>'+v.comment_id+'</td>';
					tr+='<td><img src="'+v.face+'" alt="" class="hd_img" /></td>';
                    tr+='<td>'+v.username+'</td>';
                    tr+='<td>';
                    tr+='<img src="images/head.jpg" alt="" />';
                    tr+='<img src="images/head.jpg" alt="" />';
                    tr+='<img src="images/head.jpg" alt="" />';
                    tr+='</td>';
					tr+='<td>'+v.title+'</td>';
					tr+='<td class="layui-this">';
					tr+='<a class="a_go" >'+v.returnNum+'</a>';
					tr+='</td>';
					tr+='<td>'+v.create_time+'</td>';
					tr+='<td><span onclick="showInfo('+v.comment_id+')" id="bianji_'+v.comment_id+'" class="bianji">查看</span><span class="shanchu">删除</span></td>';
					tr+='</tr>';
					html+='<div id="tc_'+v.comment_id+'" hidden>';
                        html+='<div id="eject" style="width:60%;left:21%;top:26%;">';
                        html+='<button onclick="closes('+v.comment_id+')" class="closeBtn" id="quxiao">X</button>';
                        html+='<p id="tc_tit" class="tc_content">问题详情</p>';
                            html+='<div class="hdgl_p" style="max-height:580px;overflow: auto;">';
                            html+='<p class="hdgl_line"><b>标题：</b><i>'+v.title+'</i></p>';
                            html+='<p class="hdgl_line"><b>描述：</b><i>'+v.content+'</i></p>';
                            html+='<p class="hdgl_line">';
                            html+='<b>图片：</b>';
                            html+='<img src="/images/tp.png" alt="" width="120px" height="120px"/>';
                            html+='</p>';
                            html+='</div>';
                        html+='</div>';
					html+='</div>';
                });
                $('#showQues').html(tr);
                $("#info").html(html);
            },
            error:function (err) {
                alert("数据加载失败");
            }
        });
    }
    function showInfo(flag){
        $("body").on("click","#bianji_"+flag,function(){
            $("#tc_"+flag).css({
                "display": "block"
            })
        })
    }
    function closes(flag){
        $("#tc_"+flag).hide();
    }
    $(".search_admin").on('click',function () {
        GetDataCount();
    });


	$(".a_go").click(function(){
	  $(location).attr("href","wtgl_da.html?id=1")
	})


	$("#quxiao").click(function() {
		$("#tc").css({
			"display": "none"
		})
	})
	// $("body").on("click",".bianji",function(){
	// 	$("#tc").css({
	// 		"display": "block"
	// 	})
	// })
    //全选
    layui.config({
        base: 'common/layuiadmin/' //静态资源所在路径
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
    var $ = layui.jquery;
</script>