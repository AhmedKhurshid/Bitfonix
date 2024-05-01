<?php
include('connect.php');
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
include ('header.php');

$q="SELECT * FROM `order`";
$rows=mysqli_query($con,$q);

$data=mysqli_fetch_array($rows);

// if(isset($_POST['plcbtn']))
// {
  
//   $fname=$_POST['o_f_Name'];
//   $lname=$_POST['o_l_Name'];
//   $email=$_POST['o_email_address'];
//   $address=$_POST['o_address'];
//   $phone=$_POST['o_contact'];
//   $quantity=$_POST['o_quantity'];
  
	  
// 	  //$q="INSERT INTO `order`( `o_f_Name`, `o_l_Name`, `o_email_address`, `o_address` , `o_contact` , `o_quantity` ) VALUES ('$fname','$lname','$email','$address' , '$phone' , '$quantity' ) ";
// 	  //$result=mysqli_query($q,$con);
// 	    $q="INSERT INTO `order`( `o_f_Name`, `o_l_Name`, `o_email_address`, `o_address`, `o_contact`, `o_quantity`, ) VALUES ('$fname','$lname','$email','$address' , '$phone' , '$quantity' ) ";
// 	  $result=mysqli_query($con,$q);
	
// 		 if($result)
// 	 {
// 	echo "<script> alert('Thankyou For Shopping!'); </script>";
// 	 }
// 	else 
// 	{
// 	  echo mysqli_error($con);
// 	}

// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- START PAGE BANNER AND BREADCRUMBS -->
	<section id="page-banner">
		<div class="single-page-title-area overlay" data-background="assets/img/bg/slide1.jpg">
			<div class="auto-container">
				<div class="row">
					<div class="col-12 text-center">
						<div class="single-page-title">
							<h2>Product Checkout </h2>
							<p>Lorem ipsum dolor sit amet</p>
						</div>
					</div>
				</div>
				<!-- end row-->
			</div>
		</div>
		<div class="single-page-title-area-bottom">
			<div class="auto-container">
				<div class="row">
					<div class="col-12 text-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item active">Shop Checkout</li>
						</ol>
					</div>
				</div>
				<!-- end row-->
			</div>
		</div>
	</section>
	<!-- END PAGE BANNER AND BREADCRUMBS -->
	
	
	<!-- START SHOP CHECKOUT -->
	<section class="section-padding">
		<div class="auto-container">
			<div class="row">
				<div class="col-12">
					<h5 class="text-uppercase mb-4">Billing Details</h5>
					<form method="post" action="cartAction.php">
						<div class="row">
							<div class="form-group col-6">
								<input type="text" name="fname" id="fname" required placeholder="Fist Name  *" class="form-control"> </div>
							<div class="form-group col-6">
								<input type="text" name="lname" id="lname" required placeholder="Last Name  *" class="form-control"> </div>
							<div class="form-group col-6">
								<input type="email" name="email" id="email" required placeholder="Email Address  *" class="form-control"> </div>
							
							
						</div>
						
							</form>
					<h5 class="mt-5 text-uppercase mb-4">Additional Information</h5>
					<form class="checkout-form row" >
						<div class="form-group col-6">
							<input type="text" name="phone" id="phone" required placeholder="Phone No  *" class="form-control"> </div>
								<div class="form-group col-6">
									<input type="text" name="address" id="address" placeholder="Address  *" class="form-control"> </div>
						<!-- <div class="form-group col-6">
						<label for="demo_vertical" class="col-6 p-0">Quantity</label>
						<input id="demo_vertical" type="text" value="01" name="quantity" id="quantity"> </div> -->
						
					</form>
				</div>
				<!-- end col -->
			</div>
			<!-- end row-->
			<div class="row mt-5">
				<div class="col-lg-8 col-md-8 col-sm-12 col-12">
					<h6 class="mt-5 text-uppercase mb-4">Your order</h5>
					<div class="table-responsive">
					<h6 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your Total Cart Items</span>
                        <span class="badge badge-secondary badge-pill"><?php echo $cart->total_items(); ?></span>
                    </h6>

					<!-- <div class="col-md-12 order-md-12 mb-12">
                    <ul class="list-group mb-3">
                        <?php 
                        if($cart->total_items() > 0){ 
                            //get cart items from session 
                            $cartItems = $cart->contents(); 
                            foreach($cartItems as $item){ 
                        ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?php echo $item["name"]; ?></h6>
                                <small class="text-muted"><?php echo '$'.$item["price"]; ?>(<?php echo $item["qty"]; ?>)</small>
                            </div>
                            <span class="text-muted"><?php echo '$'.$item["subtotal"]; ?></span>
                        </li>
                        <?php } } ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong><?php echo '$'.$cart->total(); ?></strong>
                        </li>
                    </ul>
                    
                </div> -->

						<table class="table table-striped">
							<tbody>
							<?php 
                        if($cart->total_items() > 0){ 
                            //get cart items from session 
                            $cartItems = $cart->contents(); 
                            foreach($cartItems as $item){ 
                        ?>
								<tr>
									<th class="my-0"><?php echo $item["name"]; ?></th>
									<td class="text-muted"><?php echo '$'.$item["price"]; ?>(<?php echo $item["qty"]; ?>)</td>
								</tr>
								<tr>
									<th><span>Subtotal</span></th>
									<td><span class="text-muted"><?php echo '$'.$item["subtotal"]; ?></span></td>
								</tr>
									<?php } } 
									//$grandtotal = '$'.$cart->total(); ?>
								<tr>
									<th><span>Total (USD)</span></th>
									<td><strong><?php echo '$'.$cart->total(); ?></strong></td>
								</tr>
							</tbody>
						</table>
	
						<div class="col-md-12 form-group mt-2">
							<input type="hidden" name="action" value="placeOrder"/>
								<button type="submit" name="plcbtn" class="cursor-pointer btn-style btn-border btn-border-2">Place Order</button>		
								<!-- <input type="submit" name="plcbtn" value="PLACE ORDER" class="cursor-pointer btn-style btn-border btn-border-2" > -->
							</div>
					</div>
				</div>		
			</div>
			<!-- end row-->
		</div>
	</section>
	<!-- END SHOP CHECKOUT -->
	

	<?php
include ('footer.php');
?>


<?php
  
 
  if(isset($_POST['plcbtn']))
  {
    
    $fname=$_POST['o_f_Name'];
    $lname=$_POST['o_l_Name'];
    $email=$_POST['o_email_address'];
    $address=$_POST['o_address'];
	$phone=$_POST['o_contact'];
	//$grandtotal= $_POST['o_grand_total'];
    
		$q="INSERT INTO `order`( `o_f_Name`, `o_l_Name`, `o_email_address`, `o_address`, `o_contact`, ) VALUES ('$fname','$lname','$email','$address' , '$phone' ) ";
        $result=mysqli_query($con,$q);
      
           if($result)
       {
      echo "<script> alert('Thankyou For Shopping!'); </script>";
       }
      else 
      {
        echo mysqli_error($con);
      }

 }



?>
