<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=">
<title>后台管理系统</title>
<link rel="stylesheet" href="/auth_old/Public/Admin/css/css.css">
<script src="/auth_old/Public/Admin/js/jquery-1.9.1.js"></script>
<script src="/auth_old/Public/Common/Layer/layer.js"></script>
<script>
//全选
function all_checked(){
	$('input[name="clear"]').attr("checked", true);
}
//获取所有checbox的值
function get_checbbox() {
	var str = '';
	$('input[name="clear"]:checked').each(function(){
		str += $(this).val();
	});
	return str;
}
//清空缓存
function clear_cache(){
	var index = layer.load(1, {
		shade: 0.5
	});
	var str = get_checbbox();
	$.get("/auth_old/index.php/Admin/Index/clear_cache.html",{"clear":str},function(data){
		 if(data == 1){
			 parent.layer.msg('清理成功，自动关闭中',{shift: 1,time: 3000},function(){
							var index = parent.layer.getFrameIndex(window.name); //获取当前窗体索引
							parent.layer.close(index); //执行关闭
						}		
					);
		 }else{
			 layer.msg('系统异常哦', {shift: 5});
		 }
	   }, "json");
}
</script>
</head>
<body>
<div class="check_div">
	<input type="checkbox" name="clear" class="cache_checkbox" value="1" /> 后台编译缓存&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="clear" class="cache_checkbox" value="2" /> 前台编译缓存&nbsp;&nbsp;&nbsp;
    <input type="checkbox" name="clear" class="cache_checkbox" value="3" /> 字段缓存&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="clear" class="cache_checkbox" value="4" /> 临时文件缓存
</div>
<div class="footer">
	<button type="button" class="button" onclick="all_checked()">全选</button>
	<button type="button" class="button" onclick="clear_cache()" style="min-width:120px;">一键清空缓存</button>
</div>

</body>
</html>