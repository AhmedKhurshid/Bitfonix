<?php 
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
include ('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function updateCartItem(obj,id){
    $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
        if(data == 'ok'){
            location.reload();
        }else{
            alert(data);
        }
    });
}
</script>
</head>
<body>

<!-- START PAGE BANNER AND BREADCRUMBS -->
	<section id="page-banner">
		<div class="single-page-title-area overlay" data-background="assets/img/bg/slide1.jpg">
			<div class="auto-container">
				<div class="row">
					<div class="col-12 text-center">
						<div class="single-page-title">
							<h2>Product Cart </h2>
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
							<li class="breadcrumb-item active">Shop Cart</li>
						</ol>
					</div>
				</div>
				<!-- end row-->
			</div>
		</div>
	</section>
	<!-- END PAGE BANNER AND BREADCRUMBS -->
	
	
	<!-- CART SECTION START -->
	<section class="pages cart-page section-padding">
		<div class="auto-container">
			<div class="row">
				<div class="col-12">
					<div class="whishlist-table table-responsive">
						<table class="table">
							<thead class="thead-inverse">
								<tr>
									<th>Image</th>
									<th>Product Name</th>
									<th>Stock </th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Total</th>
									<th>Remove</th>
								</tr>
							</thead>
							<tbody>
							<?php 
                            if($cart->total_items() > 0){ 
                                // Get cart items from session 
                                $cartItems = $cart->contents(); 
                                foreach($cartItems as $item){ 
                            ?>
								<tr>
									<td>
										<div class="whishlist-pro-img">
											<img class="rounded" src="<?php echo $item["img"]; ?>"/>
										</div>
									</td>
									<td>
										<p><?php echo $item["name"]; ?></p>
									</td>
									<td>
										<p class="bg-info text-white p-2">In Stock</p>
									</td>
									<td>
										<div class="cart-info ml-5">
											<form action="#" method="post">
												<div class="quantity">
													<input id="demo_vertical" name="demo_vertical" type="text" value="0<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')" >
												</div>
											</form>
										</div>
									</td>
									<td><?php echo '$'.$item["price"].' USD'; ?>
									</td>
									<td class="text-right"><?php echo '$'.$item["subtotal"].' USD'; ?></td>
									<td>
										<p><a class="text-danger" onclick="return confirm('Are you sure?')?window.location.href='cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;"><i class="icofont icofont-delete-alt"></i></a>
										</p>
									</td>
								</tr>
								
								<?php } }else{ ?>
                            <tr><td colspan="5"><p>Your cart is empty.....</p></td>
                            <?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- END COL -->
				<div class="col-lg-5 ml-auto">
					<div class="table-responsive">
						<table class="table table-striped">
							<tbody>
							<?php if($cart->total_items() > 0){ ?>
								<tr>
									<td><strong>Cart Total</strong></td>
									<td class="text-right"><strong><?php echo '$'.$cart->total().' USD'; ?></strong></td>
									
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<!--- END COL -->	
			</div>
			<div class="row mt-5">
				<div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3">
					<a href="shop.php" class="float-lg-left float-md-left float-lg-left float-sm-none float-none btn-style btn-border-2">CONTINUE SHOPPING</a>
				</div>
				<!--- END COL -->
				<div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3">
				<?php if($cart->total_items() > 0){ ?>
					<a href="shop-checkout.php" class="float-lg-right float-md-right float-lg-right float-sm-none float-none btn-style btn-border-2">PROCESS TO CHECKOUT</a>
					<?php } ?>
				</div>
				<!--- END COL -->	
			</div>	
		</div>
	</section>
	<!-- END CART SECTION START -->
	<?php
include ('footer.php');
?>

<script>
function myFunction() {
  var x = document.getElementById("a").value;
  var y = document.getElementById("b").value;
  $.get("cartAction.php", {action:"updateCartItem", id:y, qty:x}, function(data){
        if(data == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>