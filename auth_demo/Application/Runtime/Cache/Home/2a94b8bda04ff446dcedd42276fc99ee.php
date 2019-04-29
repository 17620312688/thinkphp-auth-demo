<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=">
<title>这是前台首页的页面</title>
</head>
<body>
这是前台访问页面：http://localhost/auth_demo/

<br/><br/>

<hr/>

<br/>

后台地址：  http://localhost/auth_demo/index.php/admin

<br/><br/>

账号：admin    <br/><br/>密码：admin


<br/><br/>

权限认证类在  common 下面的 auth 控制器，权限认证存在其他用户无权限问题，一时也没有时间调试原因了，已经禁用掉了，暂不影响其他功能使用，各位可以自行调试。
后期我再抽时间更新，现在已经在开发第二版了，所以这一版本，除修复此问题外，将不再进行更新。


<br/><br/>
<hr/>

第二版采用   bootstrap 框架，扁平化设计风格  框架采用：   thinkphp5.0.4  <br/> 会继续使用 改进版的 auth 权限认证类，待完善之后会继续分享给大家
<br/><br/>


先展示一下 第二版的界面
<br/><br/>
<img src="/auth_demo/Public/Home/img/auth_new2.0.png">


</body>
</html>