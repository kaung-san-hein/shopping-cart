<?php
	$con = mysql_connect("localhost","root","");
	mysql_select_db("youtube_project",$con);
	if(isset($_POST["submit"])){
	
	$v1=rand(1111,9999);
	$v2=rand(1111,9999);
	$v3=$v1.$v2;
	$v3=md5($v3);
		
	$fnm=$_FILES["pimage"]["name"];
	$dst="./product_image/".$v3.$fnm;
	$dst1=$v3.$fnm;
	move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
	
	mysql_query("insert into product values('','$_POST[pnm]',$_POST[pprice],$_POST[pqty],'$dst1','$_POST[pcategory]','$_POST[pdesc]')");
	}
	header("location:add_product.php");
?>