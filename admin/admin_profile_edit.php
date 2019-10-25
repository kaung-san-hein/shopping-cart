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
                    Admin Profile Edit</h2>
                <div class="block">
                    <form name="form1" action="admin_profile_update.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<table border="1" id="customers">
							<tr>
								<td colspan="2" align="center"><img src="../admin/product_image/<?php echo $row['image']; ?>" width="100" height="100"></td>
							</tr>
							<tr>
								<td>Admin Name</td>
								<td><input type="text" name="name" value="<?php echo $row['username']; ?>" size="30" required></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="text" name="pass" value="<?php echo $row['password']; ?>" size="30" required onchange="if(this.checkValidity()) form1.cpass.pattern=this.value;"></td>
							</tr>
							<tr>
								<td>Confirm Password</td>
								<td><input type="password" name="cpass" value="<?php echo $row['password']; ?>" size="30" title="confirm password and password must be matched"></td>
							</tr>
							<tr>
								<td>Rank</td>
								<td><input type="text" name="rank" value="<?php echo $row['rank']; ?>" size="30" required></td>
							</tr>
							<tr>
								<td>Company</td>
								<td><input type="text" name="company" value="<?php echo $row['company']; ?>" size="30" required></td>
							</tr>
							<tr>
								<td>Date Of Birth</td>
								<td><input type="text" name="dob" value="<?php echo $row['dob']; ?>" size="30" required></td>
							</tr>
							<tr>
								<td>City</td>
								<td><input type="text" name="city" value="<?php echo $row['city']; ?>" size="30" required></td>
							</tr>
							<tr>
								<td>Address</td>
								<td><input type="text" name="address" value="<?php echo $row['address']; ?>" size="30" required></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><input type="text" name="email" value="<?php echo $row['email']; ?>" size="30" required></td>
							</tr>
							<tr>
								<td>Contact No</td>
								<td><input type="text" name="contactno" value="<?php echo $row['contactno']; ?>" size="30" required></td>
							</tr>
							<tr>
								<td>Image</td>
								<td><input type="file" name="image"></td>
							</tr>
							<tr>
								<td style="text-align:right;"><input type="submit" name="submit" value="Edit" class="button"></td>
								<td><input type="reset" value="Reset" class="button"></td>
							</tr>
						</table>
					</form>
                </div>
            </div>
<?php
	include("footer.php");
?>            
        
       
       