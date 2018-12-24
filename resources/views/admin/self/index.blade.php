<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/common/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/common/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="/ss/public.css" />
    <style>
        .glxt_top .commom_color {
            background: white;
            color: #444444;
        }
        .spi_tj_p {
            margin: 20px 0;
        }
        .glxt_top div {
            width: 13%;
            height: 110px;
            border-radius: 6px;
            color: #fff;
        }
        .active_button {
            background: rgb(45, 183, 245)!important;
            color: white!important;
        }

        .glxt_top div p span {
            width: 36px;
            display: -webkit-inline-box;
            height: 36px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 50%;
            padding: 12px;
        }

        .glxt_top div p span img {
            width: 100%;
        }

        .glxt_top div div,
        .glxt_top div div p {
            width: 100%;
        }

        .glxt_top div div {
            margin-left: 4%;
        }

        .tit-heig_glxt {
            font-size: 14px;
            text-align: center;
        }

        .mage-xq-glxt {
            font-size: 40px;
        }
        .mage-xq-glxt {
            font-size: 40px;
            text-align: center;
            margin-top: 20px;
        }
        .tab>div {
            width: 49%;
            background: #fff;
            border-radius: 6px;
            margin: 18px 0px;
            padding-bottom: 20px;
        }

        .layui-form-item {
            margin-bottom: 0!important;
        }

        .tj_p {
            width: 50%;
            padding-left: 16px;
        }

        #tab,
        #tab2 {
            margin-bottom: 15px;
            background: white;
            float: right;
            margin-top: -55px;
            line-height: 50px;
            border-radius: 6px;
            padding: 0 10px;
            color: white;
        }

        #tab_left>div {
            height: 100px;
            border-bottom: 1px solid #e9e9e9;
        }

        #tab>p>span,
        #tab2>p>span {
            width: 30px;
            line-height: 30px;
            margin-right: 10px;
            background: #e4e4e4;
            display: inline-block;
            border-radius: 3px;
            text-align: center;
            color: #444444;
        }

        .activity {
            border-bottom: 2px solid rgb(45, 183, 245);
        }

        #tab_left>div>p {
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        #tab_left>div>p:nth-child(1) {
            padding-top: 11px;
            padding-bottom: 6px;
        }

        #tab_left {
            width: 30%;
            height: 303px;
        }

        #tab_right,
        #tab_right2 {
            padding: 10px 0;
            height: 360px;
            width: 69%;
            position: relative;
        }

        .tab_right,
        .tab_right2 {
            position: absolute;
            visibility: hidden;
            width: 100%;
            height: 100%;
        }

        #tab_right,
        #tab_left,
        #tab_right2,
        {
            background: #fff;
            border-radius: 6px;
        }

        .mage {
            font-size: 32px;
            color: #000000;
        }

        .img_whow {
            width: 22px;
        }
        #tab_right2{
            margin-left: 37px;
        }
    </style>
</head>

<body>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="remind">
            <p>
                <b>提醒通知</b>
                <span>待审核体现数：<i>0</i></span>
                <span>待处理问题反馈数：<i>0</i></span>
                <span>待处理举报数：<i>0</i></span>
            </p>
        </div>
        <div class="layui-col-md12">
            <div class="display conter glxt_top">
                <div style="background:#F3B369;" class="display con-actys">
                    <div>
                        <p class="mage-xq-glxt">20</p>
                        <p class="tit-heig_glxt">本月新增会员</p>
                    </div>
                </div>
                <div style="background: rgb(45,183,245);" class="display con-actys">
                    <div>
                        <p class="mage-xq-glxt">270</p>
                        <p class="tit-heig_glxt">今日浏览人数</p>
                    </div>
                </div>
                <div style="background:#F78585;" class="display con-actys">
                    <div>
                        <p class="mage-xq-glxt">1270</p>
                        <p class="tit-heig_glxt">本月新增销售额</p>
                    </div>
                </div>
                <div class="display con-actys">
                    <div class="commom_color">
                        <p class="mage-xq-glxt" style="color: #F3B369;">14270</p>
                        <p class="tit-heig_glxt">当前会员人数</p>
                    </div>
                </div>
                <div class="display con-actys">
                    <div class="commom_color">
                        <p class="mage-xq-glxt" style="color: rgb(45,183,245);">1427</p>
                        <p class="tit-heig_glxt">问答总数</p>
                    </div>
                </div>
                <div class="display con-actys">
                    <div class="commom_color">
                        <p class="mage-xq-glxt " style="color: #F78585;">14270</p>
                        <p class="tit-heig_glxt">观点总数</p>
                    </div>
                </div>
                <div style="background: white;" class="display con-actys">
                    <div class="commom_color">
                        <p class="mage-xq-glxt" style="color: #F78585;">14270</p>
                        <p class="tit-heig_glxt">总销售额</p>
                    </div>
                </div>
            </div>

            <div class="display conter tab">
                <div class="class=" layui-form "">
                <div class="layui-form-item display conter" style="padding: 15px 0px;">
                    <p class="tj_p">
                        <i class="layui-icon layui-icon-friends"></i><span class="icon_left">会员统计</span>
                    </p>
                    <div class="layui-inline" style="margin:0!important;">
                        <label class="layui-form-label">日期选择:</label>
                        <div class="layui-input-inline" style="width:100px;margin:0!important;">
                            <input type="text" class="layui-input" id="test2" placeholder="2018">
                        </div>
                    </div>
                </div>
                <div id="main" style="width:100%;height:400px;"></div>
            </div>
            <div class="class=" layui-form "">
            <div class="layui-form-item display conter" style="padding: 15px 0px;">
                <p class="tj_p">
                    <i class="layui-icon layui-icon-friends"></i><span class="icon_left">销售额统计</span>
                </p>
                <div class="layui-inline" style="margin:0!important;">
                    <label class="layui-form-label">日期选择:</label>
                    <div class="layui-input-inline" style="width:100px;margin:0!important;">
                        <input type="text" class="layui-input" id="test3" placeholder="2018">
                    </div>
                </div>
            </div>
            <div id="mains" style="width:100%;height:400px;"></div>
        </div>
    </div>

    <div class="display conter tab" style="width:100%;">
        <div id="tab_right">
            <p class="tj_p spi_tj_p">
                <i class="layui-icon layui-icon-friends"></i><span class="icon_left">问答数统计</span>
            </p>
            <div id="tab">
                <p>
                    <span class="active_button">日</span>
                    <span>月</span>
                    <span>年</span>
                </p>
            </div>
            <div class="tab_right" style="visibility:visible">
                <div id="amains" style="width:100%;height:283px;"></div>
            </div>
            <div class="tab_right">
                <div id="bmains" style="width:100%;height:283px;"></div>
            </div>
            <div class="tab_right">
                <div id="cmains" style="width:100%;height:283px;"></div>
            </div>
        </div>

        <div id="tab_right2">
            <p class="tj_p spi_tj_p">
                <i class="layui-icon layui-icon-friends"></i><span class="icon_left">观点数统计</span>
            </p>
            <div id="tab2">
                <p>
                    <span class="active_button">日</span>
                    <span>月</span>
                    <span>年</span>
                </p>
            </div>
            <div class="tab_right2" style="visibility:visible">
                <div id="amains2" style="width:100%;height:283px;"></div>
            </div>
            <div class="tab_right2">
                <div id="bmains2" style="width:100%;height:283px;"></div>
            </div>
            <div class="tab_right2">
                <div id="cmains2" style="width:100%;height:283px;"></div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</body>

</html>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/echarts.min.js"></script>
<script src="/common/layuiadmin/layui/layui.all.js"></script>
<script>
    //选择时间
    layui.use('laydate', function() {
        var laydate = layui.laydate;
        laydate.render({
            elem: '#test2',
            type: 'year',
            theme: '#3398DB'
        });
        laydate.render({
            elem: '#test3',
            theme: '#3398DB'
        });

    });

    $("#tab2 span").click(function() {
        $(this).addClass("active_button");
        $(this).siblings().removeClass("active_button")
        $(".tab_right2").css({
            "visibility": "hidden"
        });
        $(".tab_right2").eq($(this).index()).css({
            "visibility": "visible"
        });
    })

    //点击月份
    $("#tab span").click(function() {
        $(this).addClass("active_button");
        $(this).siblings().removeClass("active_button")
        $(".tab_right").css({
            "visibility": "hidden"
        });
        $(".tab_right").eq($(this).index()).css({
            "visibility": "visible"
        });
    })

    //会员统计
    var myChart = echarts.init(document.getElementById('main'));
    var colors = ['#5793f3', '#d14a61', '#675bba'];
    var option ={
        color: colors,

        tooltip: {
            trigger: 'none',
            axisPointer: {
                type: 'cross'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            top: '-1%',
            containLabel: true
        },
        xAxis: [{
            type: 'category',

            axisTick: {
                alignWithLabel: true
            },

            axisPointer: {
                label: {
                    formatter: function(params) {
                        return '会员统计  ' + params.value +
                            (params.seriesData.length ? '：' + params.seriesData[0].data : '');
                    }
                }
            },
            data: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"]
        }, ],
        yAxis: [{
            type: 'value'
        }],
        series: [{
            name: '会员统计',
            type: 'line',
            smooth: true,
            data: [3.9, 5.9, 11.1, 18.7, 48.3, 69.2, 231.6, 46.6, 55.4, 18.4]
        }]
    };
    myChart.setOption(option);
    window.onresize = myChart.resize;

    //销售额统计
    var myCharts = echarts.init(document.getElementById('mains'));
    var colors = ['#5793f3', '#d14a61', '#675bba'];
    var option = {
        color: colors,

        tooltip: {
            trigger: 'none',
            axisPointer: {
                type: 'cross'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            top: '-1%',
            containLabel: true
        },
        xAxis: [{
            type: 'category',

            axisTick: {
                alignWithLabel: true
            },

            axisPointer: {
                label: {
                    formatter: function(params) {
                        return '销售额统计  ' + params.value +
                            (params.seriesData.length ? '：' + params.seriesData[0].data : '');
                    }
                }
            },
            data: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"]
        }, ],
        yAxis: [{
            type: 'value'
        }],
        series: [{
            name: '销售额统计',
            type: 'line',
            smooth: true,
            data: [3.9, 5.9, 11.1, 18.7, 48.3, 69.2, 231.6, 46.6, 55.4, 18.4]
        }]
    };
    myCharts.setOption(option);
    window.onresize = myCharts.resize;

    //观点数统计  日
    var amyCharts = echarts.init(document.getElementById('amains'));
    var colors = ['#F78585', '#71DFB8', '#F3B369'];
    var option = {
        color: colors,

        tooltip: {
            trigger: 'none',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor: '#6a7985'
                },
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            top: '-1%',
            containLabel: true
        },
        xAxis: [{
            type: 'category',
            boundargGap: false,
            axisTick: {
                alignWithLabel: true
            },
            axisPointer: {
                label: {
                    formatter: function(params) {
                        return '观点数统计  ' + params.value +
                            (params.seriesData.length ? '：' + params.seriesData[0].data : '');
                    }
                }
            },
            data: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11"]
        }, ],
        yAxis: [{
            type: 'value'
        }],
        series: [{
            name: '观点数统计',
            type: 'line',
            smooth: true,
            data: [3.9, 5.9, 11.1, 18.7, 48.3, 69.2, 231.6, 46.6, 55.4, 18.4],
        }]
    };
    amyCharts.setOption(option);
    window.onresize = amyCharts.resize;

    //观点数统计 月
    var bmyCharts = echarts.init(document.getElementById('bmains'));
    var colors = ['#F78585', '#71DFB8', '#F3B369'];
    var option = {
        color: colors,
        tooltip: {
            trigger: 'none',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor: '#6a7985'
                },
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            top: '-1%',
            containLabel: true
        },
        xAxis: [{
            type: 'category',
            boundargGap: false,
            axisTick: {
                alignWithLabel: true
            },
            axisPointer: {
                label: {
                    formatter: function(params) {
                        return '观点数统计  ' + params.value +
                            (params.seriesData.length ? '：' + params.seriesData[0].data : '');
                    }
                }
            },
            data: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"]
        }, ],
        yAxis: [{
            type: 'value'
        }],
        series: [{
            name: '观点数统计',
            type: 'line',
            smooth: true,
            data: [3.9, 5.9, 11.1, 18.7, 48.3, 69.2, 231.6, 46.6, 55.4, 18.4],
            //			normal: {
            //			    color: '#8cd5c2' //改变区域颜色
            //			}
        }]
    };
    bmyCharts.setOption(option);
    window.onresize = bmyCharts.resize;

    //观点数统计 年
    var cmyCharts = echarts.init(document.getElementById('cmains'));
    var colors = ['#F78585', '#71DFB8', '#F3B369'];
    var option = {
        color: colors,

        tooltip: {
            trigger: 'none',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor: '#6a7985'
                },
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            top: '-1%',
            containLabel: true
        },
        xAxis: [{
            type: 'category',
            boundargGap: false,
            axisTick: {
                alignWithLabel: true
            },
            axisPointer: {
                label: {
                    formatter: function(params) {
                        return '观点数统计  ' + params.value +
                            (params.seriesData.length ? '：' + params.seriesData[0].data : '');
                    }
                }
            },
            data: ["2018年", "2018年", "2018年", "2018年", "2018年"]
        }, ],
        yAxis: [{
            type: 'value'
        }],
        series: [{

            name: '观点数统计',
            type: 'line',
            smooth: true,
            data: [3.9, 5.9, 11.1, 18.7, 48.3, 69.2, 231.6, 46.6, 55.4, 18.4],
            //			normal: {
            //			    color: '#8cd5c2' //改变区域颜色
            //			}
        }]
    };
    cmyCharts.setOption(option);
    window.onresize = cmyCharts.resize;

    //问答数统计  日
    var amyCharts2 = echarts.init(document.getElementById('amains2'));
    var option = {
        color: colors,

        tooltip: {
            trigger: 'none',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor: '#6a7985'
                },
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            top: '-1%',
            containLabel: true
        },
        xAxis: [{
            type: 'category',
            boundargGap: false,
            axisTick: {
                alignWithLabel: true
            },
            axisPointer: {
                label: {
                    formatter: function(params) {
                        return '观点数统计  ' + params.value +
                            (params.seriesData.length ? '：' + params.seriesData[0].data : '');
                    }
                }
            },
            data: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11"]
        }, ],
        yAxis: [{
            type: 'value'
        }],
        series: [{
            name: '观点数统计',
            type: 'line',
            smooth: true,
            data: [3.9, 5.9, 11.1, 18.7, 48.3, 69.2, 231.6, 46.6, 55.4, 18.4],
        }]
    };
    amyCharts2.setOption(option);
    window.onresize = amyCharts2.resize;

    //问答数统计  月
    var bmyCharts2 = echarts.init(document.getElementById('bmains2'));
    var colors = ['#F78585', '#71DFB8', '#F3B369'];
    var option = {
        color: colors,
        tooltip: {
            trigger: 'none',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor: '#6a7985'
                },
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            top: '-1%',
            containLabel: true
        },
        xAxis: [{
            type: 'category',
            boundargGap: false,
            axisTick: {
                alignWithLabel: true
            },
            axisPointer: {
                label: {
                    formatter: function(params) {
                        return '观点数统计  ' + params.value +
                            (params.seriesData.length ? '：' + params.seriesData[0].data : '');
                    }
                }
            },
            data: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"]
        }, ],
        yAxis: [{
            type: 'value'
        }],
        series: [{
            name: '观点数统计',
            type: 'line',
            smooth: true,
            data: [3.9, 5.9, 11.1, 18.7, 48.3, 69.2, 231.6, 46.6, 55.4, 18.4],
            //			normal: {
            //			    color: '#8cd5c2' //改变区域颜色
            //			}
        }]
    };
    bmyCharts2.setOption(option);
    window.onresize = bmyCharts2.resize;

    //问答数统计  年
    var cmyCharts2 = echarts.init(document.getElementById('cmains2'));
    var colors = ['#F78585', '#71DFB8', '#F3B369'];
    var option = {
        color: colors,

        tooltip: {
            trigger: 'none',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor: '#6a7985'
                },
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            top: '-1%',
            containLabel: true
        },
        xAxis: [{
            type: 'category',
            boundargGap: false,
            axisTick: {
                alignWithLabel: true
            },
            axisPointer: {
                label: {
                    formatter: function(params) {
                        return '观点数统计  ' + params.value +
                            (params.seriesData.length ? '：' + params.seriesData[0].data : '');
                    }
                }
            },
            data: ["2018年", "2018年", "2018年", "2018年", "2018年"]
        }, ],
        yAxis: [{
            type: 'value'
        }],
        series: [{

            name: '观点数统计',
            type: 'line',
            smooth: true,
            data: [3.9, 5.9, 11.1, 18.7, 48.3, 69.2, 231.6, 46.6, 55.4, 18.4],
            //			normal: {
            //			    color: '#8cd5c2' //改变区域颜色
            //			}
        }]
    };
    cmyCharts2.setOption(option);
    window.onresize = cmyCharts2.resize;
</script>