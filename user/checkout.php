<?php
	session_start();
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
			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>

			<div class="register-req">
				<p>Please give proper details to easily get items at your delivered address</p>
			</div><!--/register-req-->
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
					</div>
					
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form name="form1" action="" method="post">
									<input type="text" placeholder="First Name" name="firstname" required pattern="[A-Za-z]+" title="please enter valid firstname[a-z only]">
									<input type="text" placeholder="Last Name" name="lastname" required pattern="[A-Za-z]+" title="please enter valid firstname[a-z only]">
									<input type="text" placeholder="Email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="please enter valid email address">
									<input type="text" placeholder="Resi Address" name="resi" required>
									<input type="text" placeholder="City" name="city" required pattern="[A-Za-z]+" title="please enter valid firstname[a-z only]">
									<input type="text" placeholder="Pincode" name="pincode" required pattern="[0-9]{6}" title="please enter valid pincode[0-9 and 6 digit only]">
									<input type="text" placeholder="Contact Number" name="cno" required pattern="[0-9]{10}" title="please enter valid pincode[0-9 and 10 digit only]">
									<input type="submit" name="submit1" value="save">
								</form>
							</div>
						</div>
					</div>				
				</div>
			</div>
			<?php
			if(isset($_POST['submit1'])){
			$_SESSION['paypal']="yes";
			$link=mysqli_connect("localhost","root","","youtube_project");
			mysqli_query($link,"insert into checkout_address values('','$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[resi]','$_POST[city]','$_POST[pincode]','$_POST[cno]')");
			
			$res=mysqli_query($link,"select id from checkout_address order by id desc limit 1");
			while($row=mysqli_fetch_array($res))
			{
				$_SESSION['order_id']=$row['id'];
			}
			
			?>
				<script type="text/javascript">
					alert("click ok to transferring to you in paypal");
					
					setTimeout(function(){
						window.location="payment_success.php";
					},4000);
				</script>
			<?php
			}
			?>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>
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
						$total=0;
						foreach($_COOKIE['item'] as $name1 => $value)
						{
							$values11=explode("_",$value);
							$total=$total+$values11[4];
							$_SESSION["pay"]=$total;
							
						}
					?>	
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>$<?php echo $total; ?></td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>$2</td>
									</tr>
									<tr>
										<td>Total</td>
										<td><span>$<?php echo $total+2; ?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<?php
						}
				?>
			</div>
		</div>
	</section> <!--/#cart_items-->

<?php
	include("footer.php");
?>