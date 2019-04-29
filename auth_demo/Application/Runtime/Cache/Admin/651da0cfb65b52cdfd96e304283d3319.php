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
		//此处使用attr第二次设置的时候会出问题，解决办法使用prop函数，jquery版本必须要1.6.1以上
		$('.checkbox'+id).prop('checked', false);
	}else{
		$('#box'+id).attr('value', 1);
		$('.checkbox'+id).prop('checked', true);
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
    	<h4><img class="nav_img" src="/auth_old/Public/Admin/img/tab.gif"><span class="nav_a">编辑用户组</span></h4>
    </div>
</div>
<form name="myform" action="/auth_old/index.php/Admin/Admin/group_edit/id/31.html" method="post" onsubmit="return check_form();">
<div class="list">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="details">
        <tbody>
	      <tr>
	      	<td width="12%"><div align="right">组名称：</div></td>
	      	<td width="88%">
            <input type="hidden" name="id" value="<?php echo ($reuslt["id"]); ?>" />
            <input type="text" name="title" id="title" size="24" value="<?php echo ($reuslt["title"]); ?>" style="margin-left:10px;width:195px;" />
            * 栏目或操作的中文名称
            </td>
	      </tr>
          <tr>
	      	<td><div align="right">分配的权限：</div></td>
	      	<td>
            	<input type="hidden" id="all" value="1" />
            	<input type="button" value="全选 / 取消" class="btn" id="all_checkbox" style="width:200px;" />
                * 给组分配的权限
           
            </td>
	      </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
            <ul class="first_checkbox" style=" margin-left:10px;">
            <?php if(is_array($data)): foreach($data as $key=>$vo): ?><li><input type="hidden" id="box<?php echo ($vo["id"]); ?>" value="0" />         	
            		<?php if( strpos($reuslt['rules'],','.$vo['id'].',') > -1 ): ?><input type="checkbox" name="rules[]" class="checkbox<?php echo ($vo["id"]); ?>" id="<?php echo ($vo["id"]); ?>" onclick="checkbox(<?php echo ($vo["id"]); ?>)" value="<?php echo ($vo["id"]); ?>" checked="checked" />
					<?php else: ?>
					<input type="checkbox" name="rules[]" class="checkbox<?php echo ($vo["id"]); ?>" id="<?php echo ($vo["id"]); ?>" onclick="checkbox(<?php echo ($vo["id"]); ?>)" value="<?php echo ($vo["id"]); ?>" /><?php endif; ?>
					<label for="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></label><br/>
                    <div class="two_checkbox">
                    ┠─&nbsp;&nbsp;<?php if(is_array($vo['sub'])): foreach($vo['sub'] as $key=>$sub): if( strpos($reuslt['rules'],','.$sub['id'].',') > -1 ): ?><input type="checkbox" name="rules[]" class="checkbox<?php echo ($vo["id"]); ?>" id="<?php echo ($sub["id"]); ?>" value="<?php echo ($sub["id"]); ?>" checked="true" />
                    <?php else: ?>
                    	<input type="checkbox" name="rules[]" class="checkbox<?php echo ($vo["id"]); ?>" id="<?php echo ($sub["id"]); ?>" value="<?php echo ($sub["id"]); ?>" /><?php endif; ?>
                    <span><label for="<?php echo ($sub["id"]); ?>"><?php echo ($sub["title"]); ?></label></span><?php endforeach; endif; ?>
                    </div>
                </li><?php endforeach; endif; ?>
            </ul>
            </td>
          </tr>
        </tbody>
  </table>
</div>
<div style="height:150px;"></div>
<div class="footer">
	<button type="submit" class="button" style="min-width:180px;">确 认</button>
</div>
</form>
</body>
</html>