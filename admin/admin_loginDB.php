<?php
	session_start();
	$con = mysql_connect("localhost","root","");
	mysql_select_db("youtube_project",$con);
	if(isset($_POST["submit1"])){
		$res = mysql_query("select * from admin_login where username='$_POST[username]' && password='$_POST[pwd]'");
		$row=mysql_fetch_array($res);
		$sql=mysql_num_rows($res);
		if($sql>0){
			$_SESSION["admin"]=true;
			$_SESSION["username"]=$row['username'];
			$_SESSION["password"]=$row['password'];
			header("location:add_product.php");
		}
		else{
			header("location:admin_login.php");
		}
	}	
?>