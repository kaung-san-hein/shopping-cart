<?php
	$link=mysql_connect("localhost","root","");
	mysql_select_db("youtube_project",$link);
	$id=$_GET['id'];
	mysql_query("delete from categories where id='$id'");
	mysql_query("delete from product where category_id='$id'");
	header('location:category.php');
?>