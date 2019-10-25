<?php
	session_start();
	$con = mysql_connect("localhost","root","");
	mysql_select_db("youtube_project",$con);
	$id=$_POST['id'];
	$image=$_FILES['image']['name'];
	if(isset($_POST['submit'])){
		if($image==""){
			mysql_query("update admin_login set username='$_POST[name]',password='$_POST[pass]',rank='$_POST[rank]',company='$_POST[company]',dob='$_POST[dob]',city='$_POST[city]',address='$_POST[address]',email='$_POST[email]',contactno='$_POST[contactno]' where id='$id'");
		}
		else{
			$v1=rand(1111,9999);
			$v2=rand(1111,9999);
			$v3=$v1.$v2;
			$v3=md5($v3);
				
			$fnm=$_FILES["image"]["name"];
			$dst="./product_image/".$v3.$fnm;
			$dst1=$v3.$fnm;
			move_uploaded_file($_FILES["image"]["tmp_name"],$dst);
			
			mysql_query("update admin_login set image='$dst1',username='$_POST[name]',password='$_POST[pass]',rank='$_POST[rank]',company='$_POST[company]',dob='$_POST[dob]',city='$_POST[city]',address='$_POST[address]',email='$_POST[email]',contactno='$_POST[contactno]' where id='$id'");
		}
		session_destroy();
		header('location:admin_login.php');
	}
?>