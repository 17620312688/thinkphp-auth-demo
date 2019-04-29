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
	$('#account').keyup(function(){
		var account = $('#account').val();
		if(account.length >= 5){
			$.get("<?php echo U('Admin/check_account');?>",{"account":account},function(data){
					if(data == 1){
						$('#account_trips').html(' × 账号已存在');
						$('#account_trips').css('color','red');
						$('#account_hidden').val(1);
					}else{
						$('#account_trips').html(' √ 账号可用');
						$('#account_trips').css('color','blue');
						$('#account_hidden').val(0);
					}
				}, "json");	
		}
	});
});
</script>
<script>
function admin_add(){
		var account = $('#account').val();
		var password = $('#password').val();
		var password2 = $('#password2').val();
		var group_id = $('#group_id').val();
		var account_hidden = $('#account_hidden').val();
		if(group_id == ''){
			layer.tips('请选择用户组', '#group_id');
			return false;
		}
		if(account == ''){
			layer.tips('请输入账号', '#account');
			return false;
		}
		if(account.length < 5){
			layer.tips('长度不应低于5位', '#account');
			return false;
		}		
		if(password == ''){
			layer.tips('请输入密码', '#password');
			return false;
		}
		if(password2 == ''){
			layer.tips('请输入新密码', '#password2');
			return false;
		}
		if(password != password2){
			layer.msg('两次密码必须一样');
			return false;
		}
		if(account_hidden == 1){
			layer.msg('账号重复，请重新输入');
			return false;
		}
		$.post(	"/auth_old/index.php/Admin/Admin/admin_add/menu_title/%E7%B3%BB%E7%BB%9F%E7%AE%A1%E7%90%86%20-%20%E6%B7%BB%E5%8A%A0%E7%AE%A1%E7%90%86%E5%91%98",{"account":account,"password":password,"group_id":group_id},function(data){
				if(data == 1){
					layer.msg('添加成功，正在跳转中...',{icon: 1,time: 2000,shade: 0.5},function(){
						window.location.reload();    //刷新父页面
					});
				}else if(data == 2){
					layer.msg('分配用户组失败，请重新分配',{icon: 2,time: 2000},function(){
						window.location.reload();
					});
				}else{
					layer.msg('添加失败，请重新输入',{icon: 2,time: 2000},function(){
						window.location.reload();
					});
				}
			}, "json");
}
</script>
</head>
<body>
<div class="nav">
	<div class="nav_title">
    	<h4><img class="nav_img" src="/auth_old/Public/Admin/img/tab.gif"><span class="nav_a">添加管理员</span></h4>
    </div>
</div>
<div class="list">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="details">
        <tbody>
	      <tr>
	        <td><div align="right">用户组：</div></td>
	        <td><select name="group_id" id="group_id" style="height:32px;">
            		<option value="">----- 请选择用户组 -----</option>
                  <?php if(is_array($data)): foreach($data as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; ?>
            	</select>
            </td>
          </tr>
	      <tr>
	      	<td width="25%"><div align="right">账号：</div></td>
	      	<td width="75%"><input type="text" name="account" id="account" size="24" value="" />
            <input type="hidden" id="account_hidden" value="0" />
            <span id="account_trips"> * 长度不低于5位</span>
            </td>
	      </tr>
          <tr>
	      	<td><div align="right">密码：</div></td>
	      	<td><input type="text" name="password" id="password" size="24" value="" /></td>
	      </tr>
          <tr>
            <td><div align="right">重复密码：</div></td>
            <td><input type="text" name="password2" id="password2" size="24" value="" /></td>
          </tr>
        </tbody>
  </table>
</div>
<div class="footer">
     <button type="button" class="button" id="button" style="min-width:160px;" onclick="admin_add();">确 认</button>
</div>

</body>
</html>