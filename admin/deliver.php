<?php
	session_start();
	$link=mysql_connect("localhost","root","");
	mysql_select_db("youtube_project",$link);
	$id=$_GET['id'];
	$orderid=$_SESSION['orderid'];
	$status=$_GET['status'];
	mysql_query("update confirm_order_product set status='$status' where id='$id'");
	header("location:display_order_1.php?id=".$orderid);
?>