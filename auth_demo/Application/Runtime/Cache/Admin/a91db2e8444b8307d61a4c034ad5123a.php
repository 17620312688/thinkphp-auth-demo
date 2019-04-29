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
function check(){
	var title = $('#title').val();
	var name = $('#name').val();
	if(title == ''){
		layer.tips('请输入名称', '#title',{tips:1,time: 10000});
		return false;
	}
	if(name == ''){
		layer.tips('请输入（控制器/方法）', '#name',{tips:1,time: 10000});
		return false;
	}
	if(name.indexOf('/') <=0 ){
		layer.tips('格式必须为（控制器/方法）', '#name',{tips:[1, '#78BA32'],time: 10000});
		return false;
	}
	return true;
}

function auth_rule_edit(id){
	parent.layer.open({
		type: 2,
		shadeClose: true,
		shade: 0.5,
		area: ['500px', '400px'],
		title: '编辑权限',
		content: '<?php echo U("Admin/auth_rule_edit");?>?id='+id,
	});
}

</script>
</head>
<body>


<div class="nav">    
    <div class="nav_title">
    	<h4><img class="nav_img" src="/auth_old/Public/Admin/img/tab.gif" /><span class="nav_a">内容管理</span></h4>
    </div>
</div>

<form name="myform" action="/auth_old/index.php/Admin/Admin/auth_rule/menu_title/%E7%B3%BB%E7%BB%9F%E7%AE%A1%E7%90%86%20-%20%E6%9D%83%E9%99%90%E5%8F%8A%E8%8F%9C%E5%8D%95" method="post" onsubmit="return check(this)">
<div class="table_top">
父级：<select name="pid">
  		<option value="">--------- 顶级 ---------</option>
    <?php if(is_array($data)): foreach($data as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; ?>
  </select>
名称：<input type="text" name="title" id="title" class="input" />
控制器/方法：<input type="text" name="name" id="name" class="input" />
<button type="submit" id="submit" class="button">确 定</button>

（ 为防止误操作，请在数据库编辑/删除操作 ）
</div>
</form>

<div class="list">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table">
      <thead>
	    <tr>
	      <td width="13%"><div align="center">ID</div></td>
	      <td width="22%"><div align="center">名称</div></td>
	      <td width="25%"><div align="center">控制器/方法</div></td>
	      <td width="21%"><div align="center">创建时间</div></td>
		  <td width="19%"><div align="center">创建时间</div></td>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
	      <td height="42"><div align="center"><?php echo ($vo["id"]); ?></div></td>
	      <td><div style="padding-left:50px;"><?php echo ($vo["title"]); ?></div>
          </td>
	      <td><div style="padding-left:50px;"><?php echo ($vo["name"]); ?></div></td>
	      <td><div align="center"><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></div></td>
		  <td><div align="center"><a href="javascript:;" onclick="auth_rule_edit(<?php echo ($vo["id"]); ?>)">编辑</a></div></td>
	      </tr>
          	  <?php if(is_array($vo['sub'])): foreach($vo['sub'] as $key=>$sub): ?><tr>
                      <td height="40"><div align="center"><?php echo ($sub["id"]); ?></div></td>
                      <td><div style="padding-left:50px;">&nbsp;&nbsp;&nbsp;&nbsp;┠─&nbsp;&nbsp;<?php echo ($sub["title"]); ?></div></td>
                      <td><div style="padding-left:100px;"><?php echo ($sub["name"]); ?></div></td>
                      <td><div align="center"><?php echo (date("Y-m-d H:i:s",$sub["create_time"])); ?></div></td>
                      <td><div align="center"><a href="javascript:;" onclick="auth_rule_edit(<?php echo ($sub["id"]); ?>)">编辑</a></div></td>
                  </tr><?php endforeach; endif; endforeach; endif; ?>
        </tbody>
  </table>
</div>

<!-- 分页 -->
<div class="page">
  <div align="center"><?php echo ($page); ?> </div>
</div>


</body>
</html>