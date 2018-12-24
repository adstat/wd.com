<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>圈子管理</title>
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
                        <input class="ss_input" style="" type="text" placeholder="搜索关键词">
                        <button class="search_admin">搜索</button>
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
                                <th>圈子名称</th>
                                <th style="width: 10%;">选择圈子的人数</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody class="th_td" id="show_garden">

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="garden_page"></div>
</body>

</html>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/common/layuiadmin/layui/layui.js"></script>
<script>
    GetDataCount();
    function GetDataCount() {
        var searchName=$('.ss_input').val();
        var url = '{{ url('admin/garden/getGardenCount') }}';
        var data = {search : searchName};
        $.post(url,data , function (res) {
            layui.use(['laypage'], function () {
                var $ = layui.jquery;
                var laypage = layui.laypage;
                laypage.render({
                    elem: 'garden_page',
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
            url: '{{url('admin/garden/getGardenList')}}',
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
                    tr+='<td>'+v.garden_id+'</td>';
                    tr+='<td>'+v.garden_name+'</td>';
                    tr+='<td>'+v.gardenNum+'</td>';
                    tr+='<td><span onclick="deleteOne('+v.garden_id+')" class="shanchu">删除</span></td>';
                    tr+='</tr>';
                });
                $('#show_garden').html(tr);
            },
            error:function (err) {
                alert("数据加载失败");
            }
        });
    }
    function deleteOne(findId){
        if (confirm('确定要删除吗？')) {
            var url = '{{ url('admin/garden/getDeleteOne') }}';
            var data = {findId : findId};
            $.post(url,data , function (res) {
                if (res) {
                    alert('删除成功！');
                }else {
                    alert('删除失败！');
                }
            })
        }

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


    $("body").on("click", ".xiaochu", function() {
        $(this).parent().remove()
    })
    $("#quxiao").click(function() {
        $("#tc").css({
            "display": "none"
        })
    })
    $("body").on("click",".bianji",function(){
        $("#tc").css({
            "display": "block"
        })
    })


    $("body").on("click",".shanchu",function(){
        $(this).parent().parent().remove()
    })
    $("#daoru").click(function() {
        var line = '<tr><td style="width: 6%;"><input type="checkbox" lay-skin="primary"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></td>'+
            '<td>1</td><td style="width:45%;"><input type="text" placeholder="请输入圈子名称" class="myinput"/></td><td>10</td><td><span class="shanchu">删除</span></td></tr>';
        $(".dis table tbody").append(line);
        layui.use('form', function() {
            var form = layui.form;
            form.render();
        })
    })
</script>