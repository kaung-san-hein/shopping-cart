<?php
	$link=mysql_connect("localhost","root","");
	mysql_select_db("youtube_project",$link);
	$id=$_GET['id'];
	mysql_query("delete from confirm_order_address where id='$id'");
	mysql_query("delete from confirm_order_product where order_id='$id'");
	header("location:display_order.php");
?>