<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo "与".$usered."聊天"; ?></title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<nav class="list">
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

<div class="chat">
<div class="message">
	<ul>
	<?php 
		while($row=$mysql->get_object()){
			if($row->user_id ==$userid)
			{
				echo "<li class='send'>(".$row->created.")".$user."<br/>".$row->message."</li>";
			}else{
				echo "<li class='accept'>".$usered."(".$row->created.")<br/>".$row->message."</li>";
			}
			
		}
	?>
	</ul>
</div>
<div>
<form action="index.php?page=chat&mode=setMessage" method="POST">
<input type="hidden" name="user" value="<?php echo $usered;?>">
<textarea id="textbox" name="message" rows="4"></textarea>
<br/>
<input type="submit" value="发送"/>
</form>
</div>
</div>


</body>
</html>
