<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>提现设置</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/common/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/common/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="/css/public.css" />
    <link rel="stylesheet" href="/css/new_file.css" />
    <link rel="stylesheet" href="/css/mystyle.css" />
</head>

<body>

<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <p class="display conter" style="padding:10px;border-bottom: 1px solid #E9E9E9;">
                    <span class="tit_h daan">编辑账号</span>
                    <span onclick="getSetWallet()" class="bianji">保存</span>
                </p>
                <div>
                    <form class="layui-form" action="">
                        <div id="pub">
                            <div>
                                <p class="pub_p">
                                    <span><i class="color_red">*</i>会员ID：</span>
                                    <input type="text" placeholder="" value="" name="member_id">
                                </p>
                                <p class="pub_p">
                                    <span><i class="color_red">*</i>提现额度：</span>
                                    <input type="text" placeholder="" value="" name="money">
                                    <b>(分销商的额度达到此额度时才可提现，最低5元)</b>
                                </p>

                                <p class="pub_p">
                                    <span><i class="color_red">*</i>结算天数：</span>
                                    <input type="text" placeholder="" value="">
                                    <b>(当订单完成后的n天后，金额才能申请提现)</b>
                                </p>

                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="/common/layuiadmin/layui/layui.js"></script>
<script src="/js/jquery-2.1.4.min.js"></script>
<script>
    function getSetWallet(){
        if (confirm('确定要更改吗？')) {
            var url = '{{ url('admin/wallet/getSetWallet') }}';
            var member_id=$('input[name="member_id"]');
            var money=$('input[name="money"]');
            var data = {money : money,member_id : member_id};
            $.post(url,data , function (res) {
                if (res) {
                    alert('更改成功！');
                    // location.reload();
                }else {
                    alert('更改失败！');
                }
            })
        }

    }
</script>

</html>