<?php
	$link=mysql_connect("localhost","root","");
	mysql_select_db("youtube_project",$link);
	$id=$_GET['id'];
    
	$res=mysql_query("select * from product where id='$id'");
	while($row=mysql_fetch_array($res))
	{
		$img=$row['product_image'];
	}
	unlink('../admin/product_image/'.$img);
	mysql_query("delete from product where id='$id'");
	header('location:display_item.php');
?>