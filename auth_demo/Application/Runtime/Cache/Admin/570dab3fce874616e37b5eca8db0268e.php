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
$(function(){
	$('input[type="checkbox"]').prop('checked', true);  //默认全选权限
	$("#all_checkbox").click(function(){
		var all = $('#all').val();
		if(all == 1){	
			$('#all').attr('value', 0);	
			//此处使用attr第二次设置的时候会除问题，解决办法使用prop函数，jquery版本必须要1.6.1以上
			$('input[type="checkbox"]').prop('checked', false);
		}else{
			$('#all').attr('value', 1);
			$('input[type="checkbox"]').prop('checked', true);
		}
	});
});
</script>
<script>
function checkbox(id){
	var box = $('#box'+id).val();
	if(box == 1){
		$('#box'+id).attr('value', 0);	
		//此处使用attr第二次设置的时候会除问题，解决办法使用prop函数，jquery版本必须要1.6.1以上
		$('.checkbox'+id).prop('checked', true);
	}else{
		$('#box'+id).attr('value', 1);
		$('.checkbox'+id).prop('checked', false);
	}
}
</script>
<script>
function check_form(){
	var title = $('#title').val();
	if(title == ''){
		layer.tips('请输入组名称', '#title', {time: 10000});
		return false;
	}
	return true;
}
</script>
</head>
<body>
<div class="nav">
	<div class="nav_title">
    	<h4><img class="nav_img" src="/auth_old/Public/Admin/img/tab.gif"><span class="nav_a">添加用户组</span></h4>
    </div>
</div>
<form name="myform" action="/auth_old/index.php/Admin/Admin/group_add/menu_title/%E7%B3%BB%E7%BB%9F%E7%AE%A1%E7%90%86%20-%20%E6%B7%BB%E5%8A%A0%E7%94%A8%E6%88%B7%E7%BB%84" method="post" onsubmit="return check_form();">
<div class="list">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="details">
        <tbody>
	      <tr>
	      	<td width="20%"><div align="right">组名称：</div></td>
	      	<td width="80%"><input type="text" name="title" id="title" size="24" value="" style="margin-left:10px;width:195px;" />
            * 栏目或操作的中文名称
            </td>
	      </tr>
          <tr>
	      	<td><div align="right">分配的权限：</div></td>
	      	<td>
            	<input type="hidden" id="all" value="1"/>
            	<input type="button" value="全选 / 取消" class="btn" id="all_checkbox" style="width:200px;">
                * 给组分配的权限
            </td>
	      </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
        <ul class="first_checkbox" style=" margin-left:10px;">
            <?php if(is_array($data)): foreach($data as $key=>$vo): ?><li><input type="hidden" id="box<?php echo ($vo["id"]); ?>" value="0" />
                    <input type="checkbox" name="rules[]" class="checkbox<?php echo ($vo["id"]); ?>" id="<?php echo ($vo["id"]); ?>" onclick="checkbox(<?php echo ($vo["id"]); ?>)" value="<?php echo ($vo["id"]); ?>" />
                    <label for="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></laber><br/>
                    <div class="two_checkbox">
                    ┠─&nbsp;&nbsp;<?php if(is_array($vo['sub'])): foreach($vo['sub'] as $key=>$sub): ?><input type="checkbox" name="rules[]" class="checkbox<?php echo ($vo["id"]); ?>" id="<?php echo ($sub["id"]); ?>" value="<?php echo ($sub["id"]); ?>" style="margin-left:20px;" />
                         <label for="<?php echo ($sub["id"]); ?>"><?php echo ($sub["title"]); ?></laber><?php endforeach; endif; ?>
                    </div>
                </li><?php endforeach; endif; ?>
        </ul>
    </td>
  </tr>
        </tbody>
  		</table>
</div>
<div class="footer">
	<button type="submit" class="button" style="min-width:180px;">确 认</button>
</div>
</form>
</body>
</html>