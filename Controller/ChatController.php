<?php
class ChatController{
	
	function index(){
		session_start();
		if(!isset($_SESSION['user']))
		{
			require('Conn/Redirect.php');
			$redirect=new Redirect();
			$redirect->go('index.php?page=login');
		}else{
			//$index=isset($_GET['index'])?$_GET['index']:0;
			require_once('Conn/Mysql.php');
			$mysql=new Mysql();
			$user= $_SESSION['user'];
			$usered=$_GET["user"];
			require_once('Conn/Mysql.php');
			$mysql=new Mysql();
			//获取发送者id
			$mysql->query("SELECT `id` FROM `users` WHERE `name`='$user';");
			$userid=$mysql->get_row()[0];
			//获取接收者id
			$mysql->query("SELECT `id` FROM `users` WHERE `name`='$usered';");
			$useredid=$mysql->get_row()[0];
			//查询
			$mysql->query("SELECT `message`,`user_id`,`created` FROM `message` WHERE (`usered_id`='$userid' and `user_id`='$useredid') or (`user_id`='$userid' and `usered_id`='$useredid') order by created desc");
			require("View/chat.php");
		}	
	}
	
	function setMessage()
	{
		$usered=$_POST["user"];
		if($usered!="")
		{
			session_start();
			$user= $_SESSION['user'];
			$message=$_POST["message"];            
			require_once('Conn/Mysql.php');
			$mysql=new Mysql();
			$mysql->query("INSERT INTO `message`(`message`, `user_id`, `usered_id`, `created`) VALUES ('$message',(select id from users where name='$user'),(select id from users where name='$usered'),NOW());");
			require('Conn/Redirect.php');
			$redirect=new Redirect();
			$redirect->go("index.php?page=chat&user=$usered");
		}else{
			echo "不能为空";
		}
		
	}
}
