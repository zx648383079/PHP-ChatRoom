<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>注册界面</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="login">
<div class="head">注册</div>
<form action="index.php?page=register&mode=create" method="POST">
用&nbsp;户&nbsp;名&nbsp;：<input type="text" name="name"/><?php echo isset($error)?$error:"";?>
<br/>
密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="pwd"/>
<br/>
确认密码：<input type="password" name="confirm"/>
<br/>
<input type="submit" value="注册"/>
<a href="index.php?page=login">返回登录</a>
</form>
</div>
</div>
</body>
</html>
