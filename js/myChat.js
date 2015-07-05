var user=document.getElementById("user");
user.onclick=function(){
	document.getElementById("title").innerHTML=user.innerHTML;
}

function getMessage()


var send=document.getElementById("send");
send.onclick=function(){
	var user=document.getElementById("title").innerHTML;
	var reg = /^\s*$/;
	if(reg.test(user))
	{
		alert("请选择用户！"+user);
	}else{
		var message=document.getElementById("textbox").value;
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.open("POST","index.php?page=home&mode=setMessage",true);
		xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=utf-8");
		xmlhttp.send("name="+user+"&message="+message);
	}
	
}