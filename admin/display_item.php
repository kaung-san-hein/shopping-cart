<?php
	session_start();
	if(!isset($_SESSION["admin"])){
		header("location:admin_login.php");
		exit();
	}
	include("header.php");
	include("menu.php");
	$link=mysql_connect("localhost","root","");
	mysql_select_db("youtube_project",$link);
	
	if(isset($_POST['submit1']))
	{
		$search=$_POST['ValueToSearch'];
		$res=mysql_query("select product.*,categories.category from product left join categories on product.category_id=categories.id where concat(product_name,product_qty,product_price,category) like '%".$search."%' order by id desc");
	}
	else
	{
		$res=mysql_query("select product.*,categories.category from product left join categories on product.category_id=categories.id order by id desc");
	}
	
?>
<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css">
<link href="pagination/css/A_green.css" rel="stylesheet" type="text/css">
 <style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #908821;
  color: white;
  font-size: 17px;
}
#customers td{
	color: black;
	font-size: 15px;
}
</style>     
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Display Items</h2>
					<form name="form1" action="" method="post">
						<input type="text" name="ValueToSearch"  size="30" placeholder="enter name,price,qty,category">
						<input type="submit" name="submit1" value="search">
					</form>
                <div class="block">
                     <table id="customers">
						<tr>
							<th>Name</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Image</th>
							<th>Category</th>
							<th>Description</th>
							<th>Delete</th>
							<th>Update</th>
						</tr>
						<?php while($row=mysql_fetch_array($res)){ ?>
						<tr>
							<td><?php echo $row['product_name']; ?></td>
							<td><?php echo $row['product_price']; ?></td>
							<td><?php echo $row['product_qty']; ?></td>
							<td><img src="../admin/product_image/<?php echo $row['product_image']; ?>" width="100" height="100"></td>
							<td><?php echo $row['category']; ?></td>
							<td><?php echo $row['product_description']; ?></td>
							<td><a href="delete_item.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you really delete?')"><img src="../admin/img/cross.png"></a></td>
							<td><a href="edit.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you really edit?')"><img src="../admin/img/icon-form-style.png"></a></td>
						</tr>
						<?php } ?>
					</table>
                </div>
            </div>
<?php
	include("footer.php");
?>            
        
       
       