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
	$res=mysql_query("select * from feed_back");
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
                    Customers Feedbacks</h2>
                <div class="block">
					 <table id="customers">
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Feed Back</th>
							<th>Delete</th>
						</tr>
						<?php while($row=mysql_fetch_array($res)){ ?>
						<tr>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['feedback']; ?></td>
							<td><a href="delete_feedback.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you really delete?')"><img src="../admin/img/cross.png"></a></td>
						</tr>
						<?php } ?>
					</table>
                </div>
            </div>
<?php
	include("footer.php");
?>            
        
       
       