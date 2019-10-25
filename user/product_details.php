<?php
	
	$id=$_GET['id'];
	$link = mysqli_connect("localhost","root","","youtube_project");

	
	if(isset($_POST['submit1'])){
		$d=0;
		if(isset($_COOKIE['item']))
		{
			foreach($_COOKIE['item'] as $name => $value)
			{
				$d+=$name+1;
			}
			$d;
		}
		
		$res3=mysqli_query($link,"select * from product where id='$id'");
		while($row3=mysqli_fetch_array($res3))
		{
			$img1=$row3['product_image'];
			$nm=$row3['product_name'];
			$price=$row3['product_price'];
			$qty=$_POST['qty'];
			$total=$price*$qty;
		}
		if(isset($_COOKIE['item']))
		{
			$found=0;
			foreach($_COOKIE['item'] as $name1 => $value)
			{
				$values11=explode("_",$value);
				
				if($img1 == $values11[0])
				{
					$txtqty=$_POST['qty'];
					$found=$found+1;
					$qty=$values11[3]+$txtqty;
					
					$tb_qty;
					$res=mysqli_query($link,"select * from product where product_image='$img1'");
					while($row=mysqli_fetch_array($res))
					{
						$tb_qty=$row['product_qty'];
					}
					if($tb_qty < $qty)
					{
						?>
							<script type="text/javascript">
								alert("this much quantity not available");
							</script>
						<?php
					}
					else{
						$total=$values11[2]*$qty;
						setcookie("item[$name1]",$img1."_".$nm."_".$price."_".$qty."_".$total,time()+1800);
					}
				}
				
			}
			
			if($found==0)
			{
					$tb_qty;
					$res=mysqli_query($link,"select * from product where product_image='$img1'");
					while($row=mysqli_fetch_array($res))
					{
						$tb_qty=$row['product_qty'];
					}
					if($tb_qty < $qty)
					{
						?>
							<script type="text/javascript">
								alert("this much quantity not available");
							</script>
						<?php
					}
					else{
						setcookie("item[$d]",$img1."_".$nm."_".$price."_".$qty."_".$total,time()+1800);
					}
			}
		}
		if(!isset($_COOKIE['item']))
		{
			$tb_qty;
			$res=mysqli_query($link,"select * from product where product_image='$img1'");
			while($row=mysqli_fetch_array($res))
			{
				$tb_qty=$row['product_qty'];
			}
			if($tb_qty < $qty)
			{
			?>
				<script type="text/javascript">
					alert("this much quantity not available");
				</script>
			<?php
			}
			else{
				setcookie("item[$d]",$img1."_".$nm."_".$price."_".$qty."_".$total,time()+1800);
			}
		}
		header("location:product_details.php?id=".$id);
	}
	include('header.php');
	include('left_menu.php');
	$res2=mysqli_query($link,"select * from product where id='$id'");
	while($row2=mysqli_fetch_array($res2)){
?>
					<div class="col-sm-9 padding-right">
						<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="../admin/product_image/<?php echo $row2['product_image']; ?>" alt="" />
							</div>		
						</div>
						<form name="form1" action="" method="post">
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $row2['product_name']; ?></h2>
								<p>Web ID: <?php echo $row2['id']; ?></p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>US $<?php echo $row2['product_price']; ?></span>
									<label>Quantity:</label>
									<input type="text" name="qty" value="1"/>
									<button type="submit" name="submit1" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> <?php echo $row2['product_qty']; ?></p>
								<p><b>Condition:</b> New</p>
							</div><!--/product-information-->
						</div>
						
					</div><!--/product-details-->
					</form>
					<?php
						}
					?>
					
					
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									
									<p><b>Write Your Review</b></p>
									
									<form action="" method="post" name="form1">
										<span>
											<input type="text" placeholder="Your Name" name="name"/>
											<input type="email" placeholder="Email Address" name="email"/>
										</span>
										<textarea name="feedback" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<input type="submit" class="btn btn-default pull-right" value="Submit" name="submit2">
									</form>
								</div>
							</div>
							
	</section>
	
	<?php
		if(isset($_POST['submit2'])){
			mysqli_query($link,"insert into feed_back values('','$_POST[name]','$_POST[email]','$_POST[feedback]')");
		}
		include("footer.php");
	?>