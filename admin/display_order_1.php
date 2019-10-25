<?php
	session_start();
	if(!isset($_SESSION["admin"])){
		header("location:admin_login.php");
		exit();
	}
	include("header.php");
	include("menu.php");
	$id=$_GET['id'];
	$_SESSION['orderid']=$id;
	$link=mysql_connect("localhost","root","");
	mysql_select_db("youtube_project",$link);
	$res=mysql_query("select * from confirm_order_product where order_id='$id'");
?>
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
                    Order Products</h2>
                <div class="block">
                    <table id="customers">
						<tr>
							<th>Product Name</th>
							<th>Product Price</th>
							<th>Product Qty</th>
							<th>Product Total</th>
							<th>Product Image</th>
							<th>Delivery</td>
						</tr>
						<?php while($row=mysql_fetch_array($res)){ 
							 if($row['status']==1){ ?>
							<tr>
								<td><s><?php echo $row['product_name']; ?></s></td>
								<td><s><?php echo $row['product_price']; ?></s></td>
								<td><s><?php echo $row['product_qty']; ?></s></td>
								<td><s><?php echo $row['product_total']; ?></s></td>
								<td><img src="../admin/product_image/<?php echo $row['product_image']; ?>" width="100" height="100"></td>
								<td><a href="deliver.php?id=<?php echo $row['id']; ?>&status=0">Delivered</a></td>
							</tr>
							<?php }
								else{ ?>
							<tr>
								<td><?php echo $row['product_name']; ?></td>
								<td><?php echo $row['product_price']; ?></td>
								<td><?php echo $row['product_qty']; ?></td>
								<td><?php echo $row['product_total']; ?></td>
								<td><img src="../admin/product_image/<?php echo $row['product_image']; ?>" width="100" height="100"></td>
								<td><a href="deliver.php?id=<?php echo $row['id']; ?>&status=1">To Deliver</a></td>
							</tr>
						<?php }
						} ?>
					</table>
                </div>
            </div>
<?php
	include("footer.php");
?>            
        
       
       