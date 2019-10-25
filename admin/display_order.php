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
		$res=mysql_query("select * from confirm_order_address where concat(firstname,lastname,email) like '%".$search."%' order by id desc");
	}
	else
	{
		$res=mysql_query("select * from confirm_order_address order by id desc");
	}
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
                    Display Order</h2>
					<form name="form1" action="" method="post">
						<input type="text" name="ValueToSearch" size="30" placeholder="enter firstname,lastname,email">
						<input type="submit" name="submit1" value="search">
					</form>
                <div class="block">
					<table id="customers">
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>City</th>
							<th>Pin Code</th>
							<th>Contact No</th>
							<th>View Order</td>
							<th>Delete</th>
						</tr>
						<?php while($row=mysql_fetch_array($res)){ ?>
						<tr>
							<td><?php echo $row['firstname']; ?></td>
							<td><?php echo $row['lastname']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['address']; ?></td>
							<td><?php echo $row['city']; ?></td>
							<td><?php echo $row['pincode']; ?></td>
							<td><?php echo $row['contactno']; ?></td>
							<td><a href="display_order_1.php?id=<?php echo $row['id']; ?>">Detail</a></td>
							<td><a href="display_order_2.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you really want to delete?')"><img src="../admin/img/cross.png"></a></td>
						</tr>
						<?php } ?>
					</table>
                </div>
            </div>
<?php
	include("footer.php");
?>            
        
       
       