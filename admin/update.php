<?php
	$con = mysql_connect("localhost","root","");
	mysql_select_db("youtube_project",$con);
	$id=$_POST['id'];
	$pimage=$_FILES['pimage']['name'];
	if(isset($_POST['submit'])){
		if($pimage==""){
			mysql_query("update product set product_name='$_POST[pnm]',product_price='$_POST[pprice]',product_qty='$_POST[pqty]',category_id='$_POST[pcategory]',product_description='$_POST[pdesc]' where id='$id'");
		}
		else{
			$v1=rand(1111,9999);
			$v2=rand(1111,9999);
			$v3=$v1.$v2;
			$v3=md5($v3);
				
			$fnm=$_FILES["pimage"]["name"];
			$dst="./product_image/".$v3.$fnm;
			$dst1=$v3.$fnm;
			move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
			
			mysql_query("update product set product_image='$dst1',product_name='$_POST[pnm]',product_price='$_POST[pprice]',product_qty='$_POST[pqty]',category_id='$_POST[pcategory]',product_description='$_POST[pdesc]' where id='$id'");
		}
		header('location:display_item.php');
	}
?>