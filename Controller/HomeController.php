<?php
class HomeController{
	
	function index(){
		session_start();
		if(!isset($_SESSION['user']))
		{
			require('Conn/Redirect.php');
			$redirect=new Redirect();
			$redirect->go('index.php?page=login');
		}else{
			$index=isset($_GET['index'])?$_GET['index']:0;
			$start=$index*10;
			require_once('Conn/Mysql.php');
			$mysql=new Mysql();
			$mysql->query("select name from users;");
			$count=$mysql->get_count();
			$mysql->query("select name from users limit $start,10;");
			$user=$_SESSION['user'];
			require("View/Home.php");
		}	
	}
}
