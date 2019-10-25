<?php
	session_start();
	if(!isset($_SESSION["admin"])){
		header("location:admin_login.php");
		exit();
	}
	include("header.php");
	include("menu.php");
	$id=$_GET['id'];
	$link=mysql_connect("localhost","root","");
	mysql_select_db("youtube_project",$link);
	$res=mysql_query("select * from admin_login where id='$id'");
	$row=mysql_fetch_array($res);
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
.button {
  border: none;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}
.button:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>    
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Admin Profile</h2>
                <div class="block">
                    <table id="customers">
						<tr>
							<td>Name</td>
							<td><?php echo $row['username']; ?></td>
						</tr>
						<tr>
							<td>Rank</td>
							<td><?php echo $row['rank']; ?></td>
						</tr>
						<tr>
							<td>Company</td>
							<td><?php echo $row['company']; ?></td>
						</tr>
						<tr>
							<td>Date Of Birth</td>
							<td><?php echo $row['dob']; ?></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><?php echo $row['address']; ?></td>
						</tr>
						<tr>	
							<td>Email</td>
							<td><?php echo $row['email']; ?></td>
							
						</tr>
						<tr>
							<td>Contact No</td>
							<td><?php echo $row['contactno']; ?></td>
						</tr>
						<tr>
							<td align="center" colspan="2"><a href="admin_profile_edit.php?id=<?php echo $row['id']; ?>" class="button">Edit</a></td>
						</tr>
					</table>
                </div>
            </div>
<?php
	include("footer.php");
?>            
        
       
       