<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>举报管理</title>
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
    <div id="biaoti2">
        <p>
            <span class="con-banner-icon">未处理(<b>0</b>)</span>
            <span>已处理(<b>0</b>)</span>
        </p>
    </div>
    <div class="layui-row layui-col-space15">

        <div class="layui-col-md12">

            <div class="layui-card" style="padding:15px;">

                <div class="display conter" id="flgl" style="margin-bottom: 20px;">
                    <p>
                        <input class="ss_input" style="" type="text" placeholder="搜索关键词">
                        <button class="search_admin">搜索</button>
                    </p>
                    <button data-method="notice" id="detain2" style="position: absolute;right: 165px;">批量忽略</button>
                    <button data-method="notice" id="pi_delect">批量删除内容</button>
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
                                    <input type="checkbox" lay-skin="primary" lay-filter="allChoose" />
                                </th>
                                <th style="width: 4%;">序号</th>
                                <th>头像</th>
                                <th>用户名</th>
                                <th style="width: 5%;">类型</th>
                                <th>发布者</th>
                                <th>内容</th>
                                <th>原因</th>
                                <th>举报时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody class="th_td" id="show_report">

                            </tbody>
                        </table>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
<div id="report_page"></div>

</body>

</html>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/common/layuiadmin/layui/layui.js"></script>
<script>
    GetDataCount();
    function GetDataCount() {
        var searchName=$('.ss_input').val();
        var url = '{{ url('admin/report/getReportCount') }}';
        var data = {search : searchName};
        $.post(url,data , function (res) {
            layui.use(['laypage'], function () {
                var $ = layui.jquery;
                var laypage = layui.laypage;
                laypage.render({
                    elem: 'report_page',
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
            url: '{{url('admin/report/getReportList')}}',
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
                var list=$.parseJSON(res);
                $.each(list,function (k, v) {
                    tr+='<tr>';
                    tr+='<td style="width: 6%;"><input type="checkbox" lay-skin="primary" /></td>';
                    tr+='<td>'+v.report_id+'</td>';
                    tr+='<td><img src="'+v.face+'" alt="" class="hd_img" /></td>';
                    tr+='<td>'+v.returnName+'</td>';
                    tr+='<td>'+v.cat_name+'</td>';
                    tr+='<td>'+v.username+'</td>';
                    tr+='<td>'+v.content+'</td>';
                    tr+='<td>'+v.report_content+'</td>';
                    tr+='<td>'+v.create_time+'</td>';
                    tr+='<td>';
                        tr+='<span onclick="updateOne('+v.report_id+')" class="bianji">忽略</span>';
                        tr+='<span onclick="deleteOne('+v.report_id+')" class="shanchu">删除</span>';
                    tr+='</td>';
                    tr+='</tr>';
                });
                $('#show_report').html(tr);
            },
            error:function (err) {
                alert("数据加载失败");
            }
        });
    }
    function deleteOne(findId){
        if (confirm('确定要删除吗？')) {
            var url = '{{ url('admin/report/getDeleteOne') }}';
            var data = {findId : findId};
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
    function updateOne(findId) {
        if (confirm('确定要忽略吗？忽略后将不再显示~！')) {
            var url = '{{ url('admin/report/getUpdateOne') }}';
            var data = {findId : findId};
            $.post(url,data , function (res) {
                if (res) {
                    alert('更新成功！');
                    GetDataCount();
                }else {
                    alert('更新失败！');
                }
            })
        }
    }

</script>