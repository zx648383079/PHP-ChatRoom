<?php
class LoginController{
	function index(){
		require('View/login.php');
	}
	
	function login()
	{
		require('Conn/Redirect.php');
		$redirect=new Redirect();
		if(isset($_POST["name"]) && isset($_POST["pwd"]))
		{
			$name=$_POST["name"];
			$pwd=md5($_POST["pwd"]);
			require_once('Conn/Mysql.php');
			$mysql=new Mysql();
			$mysql->query("select * from users where name ='$name';");
			$row=$mysql->get_object();
			if(isset($row))
			{
				if($row->pwd==$pwd)
				{
					session_start();
					$_SESSION['user']=$name;
					$redirect->go('index.php');
				}else{
					$error="密码错误！";
					$redirect->go('index.php?page=login');
				}
			}else{
				$error="用户名不存在！";
				$redirect->go('index.php?page=login');
			}
		}else{
			$error="用户名或密码不能为空！";
			$redirect->go('index.php?page=login');
		}
	}
	
	function logout(){
		session_start();
		session_destroy();
		require('Conn/Redirect.php');
		$redirect=new Redirect();
		$redirect->go('index.php?page=login');
	}
}
