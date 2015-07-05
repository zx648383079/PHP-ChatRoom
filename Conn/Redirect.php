<?php
class Redirect{

	function go($url)
	{
		if(!empty($url))
		{
			header("location:".$url);
			exit();
		}
	}

	function back()
	{
		
	}

}