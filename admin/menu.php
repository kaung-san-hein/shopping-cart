<?php
	$username=$_SESSION["username"];
	$pwd=$_SESSION["password"];
	$link=mysql_connect("localhost","root","");
	mysql_select_db("youtube_project",$link);
	$res=mysql_query("select * from admin_login where username='$username' && password='$pwd'");
	$row=mysql_fetch_array($res);
?>
 <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                        <li><a href="admin_profile.php?id=<?php echo $row['id']; ?>"><img src="../admin/product_image/<?php echo $row['image']; ?>" width="150" height="150" style="position:relative;left:10px;border-radius: 100px;"></a>
                            <ul class="submenu">
                                <li><a><?php echo $row['username']; ?></a></li>
                                <li><a><?php echo $row['rank']; ?></a></li>
								<li><a><?php echo $row['company']; ?></a></li>
								<li><a><?php echo $row['dob']; ?></a></li>
								<li><a><?php echo $row['city']; ?></a></li>
								<li><a><?php echo $row['address']; ?></a></li>
								<li><a><?php echo $row['email']; ?></a></li>
								<li><a><?php echo $row['contactno']; ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>