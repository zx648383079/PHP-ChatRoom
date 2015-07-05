<?php
class RegisterController{
	function index(){
		require('View/register.php');
	}
	
	function create()
	{
		require('Conn/Redirect.php');
		$redirect=new Redirect();
		if(isset($_POST["name"]) && isset($_POST["pwd"]) && $_POST["pwd"]==$_POST["confirm"])
		{
			$name=$_POST["name"];
			require_once('Conn/Mysql.php');
			$mysql=new Mysql();
			$mysql->query("select * from users where name ='$name';");
			$count=$mysql->get_count();
			if(isset($count) && $count==1)
			{
				$error="用户名已存在！";
				require_once('View/register.php');
			}else{
				$pwd=md5($_POST["pwd"]);
				$mysql->query("insert into users (name,pwd,created) values ('$name','$pwd',NOW());");
				session_start();
				$_SESSION['user']=$name;
				$redirect->go('index.php');
			}
			
		}else{
			$redirect->go('index.php?page=register');
		}
	}
}
