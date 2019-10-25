<?php
	include('header.php');
	include('left_menu.php');
	$link=mysqli_connect("localhost","root","","youtube_project");
	$res=mysqli_query($link,"select * from product  order by id desc limit 3");
?>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<?php while($row=mysqli_fetch_assoc($res)): ?>
						<div class="single-blog-post">
							<h3><?php echo $row['product_name']; ?></h3>
							<div class="post-meta">
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="../admin/product_image/<?php echo $row['product_image']; ?>" alt="" width="862px" height="398px">
							</a>
							<p><?php echo $row['product_description']; ?></p>
							<a  class="btn btn-primary" href="product_details.php?id=<?php echo $row['id']; ?>">Read More</a>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<?php
		include('footer.php');
	?>