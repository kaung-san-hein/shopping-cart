<?php
	include('header.php');
	
	if(isset($_COOKIE['item']))
	{
		foreach($_COOKIE['item'] as $name1 => $value){
			if(isset($_POST["delete$name1"]))
			{
				setcookie("item[$name1]","",time()-1800);
				?>
					<script>
						window.location.href=window.location.href;
					</script>
				<?php
			}
		}
	}
?>
<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
					<?php
						$d=0;
						if(isset($_COOKIE['item']))
						{
							$d=$d+1;
						}
						if($d==0)
						{
							echo "no record available in cart";
							echo "<br>";echo "<br>";echo "<br>";echo "<br>";
						}
						else
						{
				?>
					<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach($_COOKIE['item'] as $name1 => $value)
						{
							$values11=explode("_",$value);	
					?>
							<tr>
							<td class="cart_product">
								<a href=""><img src="../admin/product_image/<?php echo $values11[0]; ?>" alt="" width="100" height="100"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $values11[1]; ?></a></h4>
							</td>
							<td class="cart_price">
								<p>$<?php echo $values11[2]; ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $values11[3]; ?>" autocomplete="off" size="2" readonly>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$<?php echo $values11[4]; ?></p>
							</td>
							<td class="cart_delete">
								<form action="" method="post">
								<input type="submit" name="delete<?php echo $name1; ?>" value="Del">
								</form>
							</td>
							</tr>
					<?php
						}
					?>
						</tbody>
				</table>
			<?php
						}
					?>
						
					
			</div>
		</div>
	</section> <!--/#cart_items-->
<?php
	include('footer.php');
?>