<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>选择人物</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<nav class="login">
<ul>
<li>
<?php
echo $user;
?>
</li>
<li>
<a href="index.php?page=login&mode=logout">登出</a>
</li>
</ul>
</nav>

<div class="list">
<div class="head">用户列表</div>
<ul>
<?php 
	while($row=$mysql->get_object()){
		$name=$row->name;
		if($name!=$user)
		{
			echo "<li><a href='index.php?page=chat&user=$name' id='user'>$name</a></li>";
		}
		
	}
	
?>
</ul>
<?php
if($count>10){
	echo "<ul class='page'><li>翻页：</li>";
	for($i=0;$i<$count/10;$i++)
	{
		if($i==$index){
			echo "<li>".$i."</li>";
		}else{
			echo "<li><a href='index.php?index=".$i."'>".$i."</a></li>";
		}
	}
	echo "</ul>";
}
?>
</div>
</body>
</html>
