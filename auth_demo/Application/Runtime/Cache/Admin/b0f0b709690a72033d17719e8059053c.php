<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=">
<title>后台首页</title>
<link rel="stylesheet" href="/auth_old/Public/Admin/css/css.css">
<script src="/auth_old/Public/Admin/js/jquery-1.9.1.js"></script>
<script src="/auth_old/Public/Common/Echarts/echarts.js"></script>
<script>
    // Step:3 为模块加载器配置echarts的路径，从当前页面链接到echarts.js，定义所需图表路径
    require.config({
        paths: {
            echarts: '/auth_old/Public/Common/Echarts'
        }
    });
     
    // Step:4 动态加载echarts然后在回调函数中开始使用，注意保持按需加载结构定义图表路径
    require(
        [
            'echarts',
            'echarts/chart/bar',
            'echarts/chart/line',
            'echarts/chart/map'
        ],
        function (ec) {
            //--- 折柱 ---
            var myChart = ec.init(document.getElementById('main'));
            myChart.setOption({
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data:['新增商铺量','新增会员量']
                },
                toolbox: {
                    show : true,
                    feature : {
                        mark : {show: true},
                        dataView : {show: true, readOnly: false},
                        magicType : {show: true, type: ['line', 'bar']},
                        restore : {show: true},
                        saveAsImage : {show: true}
                    }
                },
                calculable : true,
                xAxis : [
                    {
                        type : 'category',
                        data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
                    }
                ],
                yAxis : [
                    {
                        type : 'value',
                        splitArea : {show : true}
                    }
                ],
                series : [
                    {
                        name:'新增商铺量',
                        type:'line',
                        data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
                    },
                    {
                        name:'新增会员量',
                        type:'line',
                        data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
                    }
                ]
            });
        }
    );
</script>
</head>
<body>
<div class="nav">
	<div class="nav_title">
    	<h4><img class="nav_img" src="/auth_old/Public/Admin/img/tab.gif" /><span class="nav_a">后台首页</span></h4>
    </div>
</div>
  	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="details" style="margin-top:5px;">
        <tbody>
	      <tr>
	      	<td colspan="4" style="background:#EFEFEF; height:30px; line-height:30px;"><h3>二、业务统计</h3></td>
      	  </tr>
          <tr>
	      	<td colspan="4"><center><div id="main" style=" width:1000px; height:400px;"></div></center></td>
      	  </tr>
        </tbody>
  </table>
</div>
</body>
</html>