<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>登录界面</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="login">
<div class="head">登录</div>
<form action="index.php?page=login&mode=login" method="POST">
<p>
用户名：<input type="text" name="name"/>
</p>
<p>
密&nbsp;&nbsp;&nbsp;码：<input type="password" name="pwd"/>
</p>
<?php echo isset($error)?$error."<p>":"";?>
<input type="submit" value="登录"/>
<a href="index.php?page=register">注册</a>
</form>
</div>
</div>
</body>
</html>
