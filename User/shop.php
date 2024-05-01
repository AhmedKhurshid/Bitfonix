<?php
include ('header.php');

?>
	
	<!-- START PAGE BANNER AND BREADCRUMBS -->
	<section id="page-banner">
		<div class="single-page-title-area overlay" data-background="assets/img/bg/slide1.jpg">
			<div class="auto-container">
				<div class="row">
					<div class="col-12 text-center">
						<div class="single-page-title">
							<h2>Shop Page</h2>
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
							<li class="breadcrumb-item active">Shop</li>
						</ol>
					</div>
				</div>
				<!-- end row-->
			</div>
		</div>
	</section>
	<!-- END PAGE BANNER AND BREADCRUMBS -->
	
	<?php
	include('connect.php');
	if(isset($_POST['q'])){
	$searchtext=$_POST['q'];
	// $q="SELECT search.s_id, product.p_name
	// FROM search
	// INNER JOIN product ON search.p_id=product.p_id where p_name LIKE '%$searchtext%'";
	$q="select * from product where p_name LIKE '%$searchtext%'";
	$rows=mysqli_query($con,$q);
	}
	else{
	$q="select * from product";
	$rows=mysqli_query($con,$q);
	}
	?>
	

	<!-- START SHOP SECTION -->
    <section id="shop" class="section-padding">
        <div class="container">	 
			<div class="row">
				<aside class="col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="widget ser_wid mb-5">
						<h3 class="widget-title">Search On Shop</h3>
						<!-- end widget tittle-->
						<div class="widget-inner mt-5">
							<form class="col-12 navbar-form">
								<div class="row">

								
										<div class="form-group col-lg-10 col-md-10 col-10 p-0">
											<input class="form-control" name="search" id="search_text" placeholder="Search here..." type="text">
											
											<?php while($data=mysqli_fetch_assoc($rows)){
												echo "<tr>
												
												<td>".$data['p_name']."</td>
												
												</tr>";
											} ?>
									
											
										</div>
										<div id="result"></div> 

										<!-- <script type="text/javascript" src="jquery.min.js"></script> -->
										  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
										<script>
										$(document).ready(function(){

										load_data();

										function load_data(query)
										{
											$.ajax({
														url:'shop.php',
														type:"POST",
														data:{
															'q':query,
													},
										success:function(data)
										{
											$('#result').html(data);
										}
										});
										}

										$('#search_text').keyup(function(){
										var search = $(this).val();
										if(search != '')
										{
										load_data(search);
										}
										else
										{
										load_data();
										}
										});
										});
										</script>
									</div>
								
							</form>
						</div>
					</div>
					<!-- end widget -->
					<div class="widget ser_wid mb-5">
						<h3 class="widget-title">Filter by price</h3>
						<!-- end widget tittle-->
						<div class="widget-inner mt-5">
					   		<div class="range-slider">
								<form action="#" method="get">
									<div id="slider-range"></div>
								</form>
								<div class="filter-sec">
									<div class="filter-btn-wrap">
										<a class="filter-btn" href="#">FILTER</a>
									</div>
									<div class="filter-btn-price">
										<label><span>Price:</span> 
										<input type="text" id="amount" readonly /></label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end widget -->
					<div class="widget cat_wid mb-5">
						<h3 class="widget-title">Category List</h3>
						<!-- end widget tittle-->
						<div class="widget-inner mt-5">
							<div class="category-menu">
								<ul>
									<!-- <li><a href="#">Antminer Machine <span class="float-right">(4)</span></a></li>
									<li><a href="#">Bitcoin Machine <span class="float-right">(3)</span></a></li>
									<li><a href="#">Zmaster innosilicon<span class="float-right">(5)</span></a></li>
									<li><a href="#">Cryptomaster Miner <span class="float-right">(2)</span></a></li>
									<li><a href="#">Bitmain Antminer <span class="float-right">(6)</span></a></li> -->
								
									<?php

include('connect.php');

@$id=$_GET['id'];
if(isset($_GET['id'])){
$q="SELECT * FROM category ";
$q1="SELECT * from product where c_id='$id'";
$rows = mysqli_query($con, $q);
$rows1 = mysqli_query($con, $q1);
}

else{
$q="SELECT * FROM category ";
$q1="SELECT product.*, category.c_Name FROM product JOIN category ON product.c_id=category.c_id ";
$rows = mysqli_query($con, $q);
$rows1 = mysqli_query($con, $q1);
}

									while($result = mysqli_fetch_assoc($rows)) { 
									?>
									<li><a href="shop.php?id=<?php echo $result['c_id']?> "> 
									<?php echo $result['c_Name']; ?></a></li>
									<?php
									}			
									?>

								</ul>
							</div>
						</div>
					</div>
					<!-- end widget -->	
					<div class="widget cat_wid mb-5">
						<h3 class="widget-title">Upsell Product</h3>
						<!-- end widget tittle-->
						<div class="widget-inner mt-5">
							<div class="best-sellers-product">
								<div class="singleproduct-widget">
									<a href="#"><img src="assets/img/product/1.jpg" class="img-responsive" alt="hashtheme"></a>
									<div class="singleproduct-widget-info"> <a href="#"><h4> Antminer Bitcoin Machine </h4></a> <span class="amount"><del><span class="amount-del">$550.00</span></del>$600.00</span>
									</div>
									<a href="#" class="btn-pro-wid mt-2">View</a>
								</div>
								<div class="singleproduct-widget">
									<a href="#"><img src="assets/img/product/2.jpg" class="img-responsive" alt="hashtheme">
									</a>
									<div class="singleproduct-widget-info"> <a href="#"><h4>BAIKAL Bitcoin Machine</h4></a> <span class="amount"><del><span class="amount-del">$234.00</span></del>$200.00</span>
									</div>
									<a href="#" class="btn-pro-wid mt-2">View</a>
								</div>
								<div class="singleproduct-widget">
									<a href="#"><img src="assets/img/product/3.jpg" class="img-responsive" alt="hashtheme">
									</a>
									<div class="singleproduct-widget-info"> <a href="#"><h4> A9 Zmaster - innosilicon </h4></a> <span class="amount"><del><span class="amount-del">$300.00</span></del>$150.00</span>		
									</div>
									<a href="#" class="btn-pro-wid mt-2">View</a>
								</div>
							</div>							
						</div>
					</div>
					<!-- end widget -->
					<div class="widget cat_wid mb-5">
						<!-- end widget tittle-->
						<div class="widget-inner">
							<div class="single-wcus-promo">
								<div class="single-wcus-promo-inner">
									<h3>We are ready to fly with you.</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolor.</p>
									<a href="#" class="btn-style btn-border btn-border-2">Read More</a>
								</div>
							</div>
						</div>
					</div>
					<!-- end widget -->
				</aside>

				<!-- end aside -->
				<div class="col-lg-8 col-md-8 col-sm-12 col-12 text-center pl-lg-5 pl-md-5 pl-sm-2 pl-2 mt-lg-0 mt-md-0 mt-sm-0 mt-5">
					<div class="row">

						<!-- start single product -->
						<?php while($data=mysqli_fetch_assoc($rows1)) { ?>

							<div class="col-lg-4 col-md-4 col-12 mb-4">
								<div class="single-shop-wrapper">
									<div class="single-shop">
										<div class="single-shop-img">
											<img class="img-fluid" src="<?php echo $data['p_image']; ?>" alt="">
											<div class="single-shop-social">
											<ul>
											   <li><a href="cartAction.php?action=addToCart&id=<?php echo $data["p_id"]; ?>" class="sicon1" ><i class="icofont icofont-cart-alt"></i></a></li>
											   <!-- <li><a class="sicon1" href="#"><i class="icofont icofont-cart-alt"></i></a></li> -->
											   <li><a class="sicon2" href="#"><i class="icofont icofont-heart-alt"></i></a></li>
											   <li><a class="sicon3" href="#"><i class="icofont icofont-expand"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="single-shop-meta">
										<a href="single-product.php?pid=<?php echo $data['p_id'];  ?>"><h4> <?php echo $data['p_name']; ?> </h4></a>
										<p class="price"><?php echo $data['p_price']; ?></p>
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
						<?php } ?>
						<!-- end single product -->

					</div>
				</div>
				<!-- end col -->
			</div>
			<!-- end row -->
        </div>
        <!--- END CONTAINER -->
    </section>
    <!-- END SHOP SECTION -->

	
	
	
	<?php
include ('footer.php');
?>