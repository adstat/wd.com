<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>咨询订单</title>
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

        .odd_a>th:nth-child(even) {
            background: white!important;
            /*width: 25%;*/
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
                    <button data-method="notice" class="active_t_l" id="time">按时间排序</button>
                    <button data-method="notice" id="live">按喜欢排序</button>
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
                                <th>价格</th>
                                <th>咨询问题</th>
                                <th>答主</th>
                                <th>时间</th>
                                <th>付款时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody id="show_consult">

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="consult_info"></div>

<div id="consult_page"></div>
</body>

</html>
<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
<script src="/common/layuiadmin/layui/layui.js"></script>
<script>
    GetDataCount();
    function GetDataCount() {
        var searchName=$('.ss_input').val();
        var url = '{{ url('admin/inquire/getInquireCount') }}';
        var data = {search : searchName};
        $.post(url,data , function (res) {
            layui.use(['laypage'], function () {
                var $ = layui.jquery;
                var laypage = layui.laypage;
                laypage.render({
                    elem: 'consult_page',
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
            url: '{{url('admin/inquire/getInquireList')}}',
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
                $.each(list,function (k, v) {
                    tr+='<tr>';
                    tr+='<td><input type="checkbox" lay-skin="primary" /></td>';
                    tr+='<td>'+v.order_id+'</td>';
                    tr+='<td><img src="'+v.face+'" alt="" class="hd_img" /></td>';
                    tr+='<td>'+v.username+'</td>';
                    tr+='<td>'+v.inquire_money+'</td>';
                    tr+='<td>'+v.title+'</td>';
                    tr+='<td>'+v.returnName+'</td>';
                    tr+='<td>'+v.create_time+'</td>';
                    tr+='<td>'+v.orderTime+'</td>';
                    tr+='<td>';
                    tr+='<span id="bianji_'+v.order_id+'" onclick="showInfo('+v.order_id+')" class="bianji">查看</span>';
                    tr+='</td>';
                    tr+='</tr>';
                    html+='<div  id="tc_'+v.order_id+'" hidden>';
                    html+='<div id="eject" style="width: 50%;left: 20%;">';
                    html+='<button onclick="closes('+v.order_id+')" style="float: right;" class="closeBtn" id="quxiao">X</button>';
                    html+='<p class="tc_content" style="margin-bottom: 20px;">咨询详情</p>';
                    html+='<div style=" width: 77%;margin: 0 auto;">';
                    html+='<div class="zx_detail">';
                    html+='<p>';
                    html+='<img src="images/head.jpg" alt="" class="hd_img" />';
                    html+='<span>'+v.username+'</span>';
                    html+='<i>'+v.create_time+'</i>';
                    html+='</p>';
                    html+='<p>'+v.content+'</p>';
                    html+='<p class="zx_detail_img">';
                    html+='<img src="images/tp.png" alt="" />';
                    html+='<img src="images/tp.png" alt="" />';
                    html+='<img src="images/tp.png" alt="" />';
                    html+='</p>';
                    html+='</div>';
                    /*回*/
                    html+='<div class="zx_detail zx_detail_two">';
                    html+='<p class="" style="clear: both;">';
                    html+='<i>'+v.replyTime+'</i>';
                    html+='<b>';
                    html+='<span>'+v.returnName+'</span>';
                    html+=' <img src="images/head.jpg" alt="" class="hd_img" />';
                    html+='<p>'+v.replyContent+'</p>';
                    html+='<p class="zx_detail_img">';
                    html+='<img src="images/tp.png" alt="" />';
                    html+='<img src="images/tp.png" alt="" />';
                    html+='<img src="images/tp.png" alt="" />';
                    html+='</p>';
                    html+='</b>';
                    html+='</p>';
                    html+='</div>';
                    html+='</div>';
                    html+='</div>';
                    html+='</div>';
                });
                $('#show_consult').html(tr);
                $('#consult_info').html(html);

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
</script>