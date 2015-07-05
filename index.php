<?php
header("Content-type: text/html;charset=utf-8");

$page=isset($_GET['page'])?$_GET['page']:"home";
$name=$page."Controller";
$path="Controller/".$name.".php";
$method=isset($_GET['mode'])?$_GET['mode']:"index";


require($path);
$controller=new $name;
$controller->$method();