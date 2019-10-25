<?php
	$link = mysqli_connect("localhost","root","","youtube_project");
	$res=mysqli_query($link,"select * from categories");
?>
<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shop.php">All Categories</a></h4>
								</div>
							</div>
							<?php while($row=mysqli_fetch_assoc($res)): ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shop.php?id=<?php echo $row['id']; ?>"><?php echo $row['category']; ?></a></h4>
								</div>
							</div>
							<?php endwhile; ?>
						</div><!--/category-productsr-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>