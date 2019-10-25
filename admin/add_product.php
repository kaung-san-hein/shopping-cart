<?php
	session_start();
	if(!isset($_SESSION["admin"])){
		header("location:admin_login.php");
		exit();
	}
	include("header.php");
	include("menu.php");
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
                    Add Product</h2>
                <div class="block">
                    <form name="form1" action="add_productDB.php" method="post" enctype="multipart/form-data">
						<table border="1" id="customers">
							<tr>
								<td>Product Name</td>
								<td><input type="text" name="pnm"></td>
							</tr>
							<tr>
								<td>Product Price</td>
								<td><input type="text" name="pprice"></td>
							</tr>
							<tr>
								<td>Product Quantity</td>
								<td><input type="text" name="pqty"></td>
							</tr>
							<tr>
								<td>Product Image</td>
								<td><input type="file" name="pimage"></td>
							</tr>
							<?php 
								$link=mysql_connect("localhost","root","");
								mysql_select_db("youtube_project",$link);
								$res=mysql_query("select * from categories");
							?>
							<tr>
								<td>Product Category</td>
								<td>
								<select name="pcategory">
									<?php while($row=mysql_fetch_assoc($res)): ?>
									<option value="<?php echo $row['id']; ?>"><?php echo $row['category']; ?></option>
									<?php endwhile; ?>
								</select>
								</td>
							</tr>
							<tr>
								<td>Product Description</td>
								<td>
								<textarea cols="15" rows="10" name="pdesc"></textarea>
								</td>
							</tr>
							<tr>
								<td style="text-align:right;"><input type="submit" name="submit" value="Upload" class="button"></td>
								<td><input type="reset" value="Clear" class="button"></td>
							</tr>
						</table>
					</form>
                </div>
            </div>
<?php
	include("footer.php");
?>            
        
       
       