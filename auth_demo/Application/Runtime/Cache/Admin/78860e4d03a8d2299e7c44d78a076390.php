<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=">
<title>后台管理系统</title>
<link rel="stylesheet" href="/auth_old/Public/Admin/css/css.css">
<script src="/auth_old/Public/Admin/js/jquery-1.9.1.js"></script>
</head>
<body>
<form action="/auth_old/index.php/Admin/Admin/auth_rule_edit.html?id=5" method="post">
<div class="list">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="details">
        <tbody>
	      
	      <tr>
	      	<td width="30%"><div align="right">名称：</div></td>
	      	<td width="70%">
			<input type="text" name="title" id="title" size="24" value="<?php echo ($result["title"]); ?>" />
            </td>
	      </tr>
          
		  <tr>
	      	<td width="25%"><div align="right">备注：</div></td>
	      	<td width="75%">
			<input type="text" name="remark" id="remark" size="30" value="<?php echo ($result["remark"]); ?>" />         
            </td>
	      </tr>
		  
		  <tr>
	      	<td width="25%"><div align="right">控制器/方法：</div></td>
	      	<td width="75%">
			<?php echo ($result["name"]); ?>           
            </td>
	      </tr>
		  
		  <tr>
	      	<td width="25%"><div align="right">创建时间：</div></td>
	      	<td width="75%">
			<?php echo ($result["create_time"]); ?>           
            </td>
	      </tr>
		  
        </tbody>
  </table>
</div>
<div class="footer">
	 <input type="hidden" name="id" id="id" value="<?php echo ($result["id"]); ?>" />
     <button type="submit" class="button" id="button" style="min-width:160px;">确 认</button>
</div>
</form>
</body>
</html>