<?php
include ('header.php');
?>
<?php
include('connect.php');
$q="select * from product";
$rows=mysqli_query($con,$q);

?>
<!DOCTYPE html>
<html lang="en">

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	
	<!-- START PAGE BANNER AND BREADCRUMBS -->
	<section id="page-banner">
		<div class="single-page-title-area overlay" data-background="assets/img/bg/slide1.jpg">
			<div class="auto-container">
				<div class="row">
					<div class="col-12 text-center">
						<div class="single-page-title">
							<h2>Product Details </h2>
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
							<li class="breadcrumb-item active">Single Product</li>
						</ol>
					</div>
				</div>
				<!-- end row-->
			</div>
		</div>
	</section>
	<!-- END PAGE BANNER AND BREADCRUMBS -->

	<?php
@$id=$_GET['pid'];
include('connect.php');

$q="SELECT * from product";

if($id==null){
	$q="SELECT * from product";  
  }
  else{
	  $q="SELECT * from product where p_id='$id'";
  }
  
$rows=mysqli_query($con,$q);
?>
	
	<!-- START SHOP DETAILS SECTION -->
	<section id="single-product" class="section-padding">
		<div class="auto-container">

		 <?php while($data=mysqli_fetch_assoc($rows)) { ?>

			<div class="row">
                <div class="col-md-12 col-lg-6 col-sm-12 col-12">
				    <div class="sin-pro-image">
						<img id="zoom_01" class="img-fluid" src="<?php echo $data['p_image']; ?>" data-zoom-image="<?php echo $data['p_image']; ?>" alt="img"/>
					</div>
				</div>
                <div class="col-md-12 col-lg-6 col-sm-12 col-12">
					<div class="product-summary">
					      <h2><?php echo $data['p_name']; ?> </h2>
						  <div class="price"><?php echo $data['p_price']; ?></div>
						  <div class="ITEM CODE"> 
						  <b><p>ITEM CODE : <?php echo $data['p_item_code']; ?></p></b>
						  </div>
						  <div class="description">
						  <p><?php echo $data['p_description']; ?></p>
						  </div>
						  <div class="rating">
							<i class="icofont icofont-ui-rating"></i>
							<i class="icofont icofont-ui-rating"></i>
							<i class="icofont icofont-ui-rate-blank"></i>
							<i class="icofont icofont-ui-rating"></i>
						  </div>
						  <div class="cart-info clearfix">
							<form action="#" method="post">
								<div class="quantity col-6 p-0">
									<label for="demo_vertical" class="col-6 p-0">Quantity</label>
									<input id="demo_vertical" type="text" value="01" name="demo_vertical">
								</div>
								<div class="button col-6 p-0">
									<button onclick="myFunction()" type="submit" class="btncart" href="cartAction.php?action=addToCart&id=<?php echo $data["p_id"]; ?>" >add to cart</button>
									<script>
									function myFunction() {
									window.open("shop-cart.php");
									}
									</script>
								</div>
							</form>
						  </div>
				     </div>
                </div>
				<!--- END COL -->
			</div>
			<!-- end row-->
			<div class="row">
				<div class="col-lg-12 sin-pro-tab">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"><a class="nav-link active" href="#" data-target="#one" data-toggle="tab">Description</a></li>
						<li class="nav-item"><a class="nav-link" href="#" data-target="#two" data-toggle="tab">Reviews(0)</a></li>
						<li class="nav-item"><a class="nav-link" href="#" data-target="#three" data-toggle="tab">Additional Info</a></li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane animated fadeInRight active show" id="one">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<div class="tab-pane animated fadeInRight" id="two">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<div class="tab-pane animated fadeInRight" id="three">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 </div>
					</div>
				</div>
			</div>
            <!--- END ROW -->
		 <?php } ?>   
		</div>
	</section>
	<!-- END SINGLE PRODUCT -->
	
	<!-- START RECENT SECTION -->
    <section id="shoprecent" class="section-padding pt-0">
        <div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<div class="section-title">
						<h5>buy & sell</h5>
						<h3>Related <span>Products</span></h3>
					</div>
				</div>
			</div>
			<!-- end section title -->	 
			<div class="row text-center">
				<div class="col-lg-3 col-md-3 col-12 mb-4">
					<div class="single-shop-wrapper">
						<div class="single-shop">
							<div class="single-shop-img">
								<img class="img-fluid" src="assets/img/product/1.jpg" alt="">
								<div class="single-shop-social">
									<ul>
									   <li><a class="sicon1" href="#"><i class="icofont icofont-cart-alt"></i></a></li>
									   <li><a class="sicon2" href="#"><i class="icofont icofont-heart-alt"></i></a></li>
									   <li><a class="sicon3" href="#"><i class="icofont icofont-expand"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="single-shop-meta">
								<a href="#"><h4>S9 Antminer Bitcoin Machine</h4></a>
								<p class="price">$600.00-$800.00</p>
								<p class="rating">
									<i class="icofont icofont-ui-rating"></i>
									<i class="icofont icofont-ui-rating"></i>
									<i class="icofont icofont-ui-rating"></i>
									<i class="icofont icofont-ui-rate-blank"></i>
								</p>
							</div>	
						</div>							
					</div>
				</div>
				<!-- end single product -->
				<div class="col-lg-3 col-md-3 col-12 mb-4">
					<div class="single-shop-wrapper">
						<div class="single-shop">
							<div class="single-shop-img">
								<img class="img-fluid" src="assets/img/product/2.jpg" alt="">
								<div class="single-shop-social">
									<ul>
									   <li><a class="sicon1" href="#"><i class="icofont icofont-cart-alt"></i></a></li>
									   <li><a class="sicon2" href="#"><i class="icofont icofont-heart-alt"></i></a></li>
									   <li><a class="sicon3" href="#"><i class="icofont icofont-expand"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="single-shop-meta">
								<a href="#"><h4>BAIKAL N240 Bitcoin Machine</h4></a>
								<p class="price">$300.00-$400.00</p>
								<p class="rating">
									<i class="icofont icofont-ui-rating"></i>
									<i class="icofont icofont-ui-rating"></i>
									<i class="icofont icofont-ui-rate-blank"></i>
									<i class="icofont icofont-ui-rating"></i>
								</p>
							</div>	
						</div>							
					</div>
				</div>
				<!-- end single product -->
				<div class="col-lg-3 col-md-3 col-12 mb-4">
					<div class="single-shop-wrapper">
						<div class="single-shop">
							<div class="single-shop-img">
								<img class="img-fluid" src="assets/img/product/3.jpg" alt="">
								<div class="single-shop-social">
									<ul>
									   <li><a class="sicon1" href="#"><i class="icofont icofont-cart-alt"></i></a></li>
									   <li><a class="sicon2" href="#"><i class="icofont icofont-heart-alt"></i></a></li>
									   <li><a class="sicon3" href="#"><i class="icofont icofont-expand"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="single-shop-meta">
								<a href="#"><h4>A9 Zmaster - innosilicon</h4></a>
								<p class="price">$500.00-$550.00</p>
								<p class="rating">
									<i class="icofont icofont-ui-rating"></i>
									<i class="icofont icofont-ui-rate-blank"></i>
									<i class="icofont icofont-ui-rating"></i>
									<i class="icofont icofont-ui-rating"></i>
								</p>
							</div>	
						</div>							
					</div>
				</div>
				<!-- end single product -->
				<div class="col-lg-3 col-md-3 col-12">
					<div class="single-shop-wrapper">
						<div class="single-shop">
							<div class="single-shop-img">
								<img class="img-fluid" src="assets/img/product/4.jpg" alt="">
								<div class="single-shop-social">
									<ul>
									   <li><a class="sicon1" href="#"><i class="icofont icofont-cart-alt"></i></a></li>
									   <li><a class="sicon2" href="#"><i class="icofont icofont-heart-alt"></i></a></li>
									   <li><a class="sicon3" href="#"><i class="icofont icofont-expand"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="single-shop-meta">
								<a href="#"><h4>A8+ Cryptomaster Miner</h4></a>
								<p class="price">$250.00-$300.00</p>
								<p class="rating">
									<i class="icofont icofont-ui-rating"></i>
									<i class="icofont icofont-ui-rate-blank"></i>
									<i class="icofont icofont-ui-rating"></i>
									<i class="icofont icofont-ui-rating"></i>
								</p>
							</div>	
						</div>							
					</div>
				</div>
				<!-- end single product -->
			</div>
			<!-- end row -->
        </div>
        <!--- END CONTAINER -->
    </section>
    <!-- END RECENT SECTION -->
	
	<?php
include ('footer.php');
?>