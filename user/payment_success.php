<?php
	session_start();
	if($_SESSION['pay']=="" or $_SESSION['paypal']="")
	{
?>
	<script type="text/javascript">
		window.location="shop.php";
	</script>
<?php
	}
	else{
	$link=mysqli_connect("localhost","root","","youtube_project");
	$order_id=$_SESSION['order_id'];
	
	$res=mysqli_query($link,"select * from checkout_address where id='$order_id'");
	while($row=mysqli_fetch_array($res))
	{
		$fname=$row['firstname'];
		$lname=$row['lastname'];
		$email=$row['email'];
		$address=$row['address'];
		$city=$row['city'];
		$pincode=$row['pincode'];
		$contactno=$row['contactno'];
	}
	mysqli_query($link,"insert into confirm_order_address values('','$fname','$lname','$email','$address','$city','$pincode','$contactno')");
	
	$res=mysqli_query($link,"select id from confirm_order_address order by id desc limit 1");
	while($row=mysqli_fetch_array($res))
	{
		$id=$row['id'];
	}
	if(isset($_COOKIE['item'])){
	foreach($_COOKIE['item'] as $name1 => $value)
	{
		$values11 = explode("_",$value);
		
		mysqli_query($link,"insert into confirm_order_product values('','$id','$values11[1]','$values11[2]','$values11[3]','$values11[0]','$values11[4]',0)");
		
		$res2=mysqli_query($link,"select * from product");
		while($row2=mysqli_fetch_array($res2)){
			$total=$row2['product_qty'];
			$image=$row2['product_image'];
			if($image==$values11[0]){
				$qty=$total-$values11[3];
				mysqli_query($link,"update product set product_qty='$qty' where product_image='$image'");
			}
		}
	}
	echo "your order get successfully we deliver product soon";
	foreach($_COOKIE['item'] as $name => $value)
	{
		setcookie("item[$name]","",time()-1800);
	}
	
	}
	$_SESSION['paypal']="";
	}
?>
<script>
	setTimeout(function(){
		window.location="shop.php";
	},10000);
</script>