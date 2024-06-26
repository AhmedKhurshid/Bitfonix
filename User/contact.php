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
							<h2>Get In Touch</h2>
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
							<li class="breadcrumb-item active">Contact Us</li>
						</ol>
					</div>
				</div>
				<!-- end row-->
			</div>
		</div>
	</section>
	<!-- END PAGE BANNER AND BREADCRUMBS -->
	
	<!-- START CONTACT SECTION -->
    <section id="contactpage" class="section-padding">
        <div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<div class="section-title">
						<h5>response with in minute</h5>
						<h3>Contact <span>Bitfonix</span></h3>
					</div>
				</div>
			</div>
			<!-- end section title -->
			<div class="row text-center">
				<div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-5">
					<div class="single-address">
						<div class="single-address-icon">
							<i class="far fa-envelope-open"></i>
						</div>
						<div class="single-address-dec">
							<h4>Write a mail</h4>
							<p>Email: info@bitfonix.com</p>
						</div>
						<div class="single-address-link">
							<a href="https://www.gmail.com">quick Send</a>
						</div>
					</div>
				</div>
				<!-- end col -->
				<div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-5">
					<div class="single-address">
						<div class="single-address-icon">
							<i class="icofont icofont-phone-circle"></i>
						</div>
						<div class="single-address-dec">
							<h4>Give a call</h4>
							<p>Phone: 123-456-0975</p>
							<p>Phone: 123-456-0975</p>
						</div>
						<div class="single-address-link">
							<a href="#">quick call</a>
						</div>
					</div>
				</div>
				<!-- end col -->
				<div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-5">
					<div class="single-address">
						<div class="single-address-icon">
							<i class="far fa-address-card"></i>
						</div>
						<div class="single-address-dec">
							<h4>Visit our location</h4>
							<p>Address: 10004, Battery Park, New York, USA </p>
						</div>
						<div class="single-address-link">
							<a href="#">find Direction</a>
						</div>
					</div>
				</div>
				<!-- end col -->
				<div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-5">
					<div class="single-address">
						<div class="single-address-icon">
							<i class="fab fa-rocketchat"></i>
						</div>
						<div class="single-address-dec">
							<h4>Lets's have a chat</h4>
							<p>Telephone: 123-456-0975</p>
							<p>Fax: 321-654-0975</p>
						</div>
						<div class="single-address-link">
							<a href="#">click here</a>
						</div>
					</div>
				</div>
				<!-- end col -->
			</div>
			<!-- end row -->

			<div class="row">
				<div class="col-12 text-center">
					<div class="section-title-2">
						<h3>Send Us Message</h3>
					</div>
				</div>
				<div class="col-lg-7 mx-auto">
					<div class="contact-form-wrapper">
						<div class="contact-form">
							<form id="contact-form" class="form" name="enq" method="POST" action="http://skullysmusic.com/tm/ft/bt/bitfonix-preview3/Bitfonix/form-process.php">
								<div class="row">
									<div class="form-group col-12 mb-3">
										<label>First Name:</label>
										<input name="name" class="form-control" id="cname" required="required" type="text">
									</div>
									<div class="form-group col-12 mb-3">
										<label>Your Email:</label>
										<input name="email" class="form-control" id="cemail" required="required" type="email">
									</div>
									<div class="form-group col-12 mb-3">
										<label>Phone Number:</label>
										<input name="number" class="form-control" id="cnumber" required="required" type="text">
									</div>
									<div class="form-group col-12 mb-3">
										<label>Subject:</label>
										<input name="subject" class="form-control" id="csubject" required="required" type="text">
									</div>
									<div class="form-group col-12 mb-3">
										<label>Message:</label>
										<textarea rows="6" name="message" class="form-control" id="cmessage" placeholder="Your Message Here..." required="required"></textarea>
									</div>
									<div class="form-group col-lg-12 mb-0 text-center">
										<div class="actions">
											<input value="Submit Message" name="submit" id="submitButton" class="btn btn-contact-bg" title="Click here to submit your message!" type="submit">
											<img src="assets/img/ajax-loader.gif" id="loader" style="display:none" alt="loading" width="16" height="16">
										</div>
									</div>
								</div>
							</form>								
						</div>
					</div>
				</div>
			</div>
			<!-- end row -->
        </div>
        <!--- END CONTAINER -->
    </section>
    <!-- END CONTACT SECTION -->
	
	<!-- GOOGLE MAP -->
	<div class="gmap_canvas">
		<iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Bardstown%20Road%2C%20Louisville&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe>
	</div>
	<!-- END GOOGLE MAP -->
	<?php
include ('footer.php');
?>