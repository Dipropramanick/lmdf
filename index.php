<?php
  error_reporting(0);
  session_start();
  if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
    header("Location:dashboard.php");
  }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Leon Maestro De Fitness</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Beardo Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
   <link href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
   <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //Fonts -->
</head>

<body>

<!-- header -->
  <?php include "header.php"?>
<!-- //header -->
<!-- banner -->
<div class="banner_w3lspvt" id="home">
	<div class="csslider infinity" id="slider1">
		<ul class="banner_slide_bg">
			<li>
				<div class="slider-info bg1">
					<div class="bs-slider-overlay">
						<div class="banner-text">
							<div class="container">
								<h2 class="movetxt agile-title text-capitalize">The Gym of its own kind</h2>
								<p>Stay fit with the all new Leon Maestro De Fitness.<br>Existing Customer? Then click on Login, or click Contact Us and be a part of LMDF Family.</p>
								<a href="contact.php" class="btn btn-danger" style="background-color:red ;"> Contact Us </a>
                <a href="login.php" class="btn btn-danger" style="background-color:red ;"> Login  </a>
							</div>
						</div>
					</div>
				</div>
			</li>


		</ul>

	</div>
</div>
<!-- //banner -->
 <!-- banner bottom grids -->
    <section class="content-info py-5" id="about">
        <div class="container py-md-5">
		<h3 class="heading text-center mb-3 mb-sm-5">About us</h3>

            <div class="info-w3pvt-mid text-center px-lg-5">

                <div class="title-desc text-center px-lg-5">
					<img src="images/about.png" alt="news image" style="height:300px;" class="img-fluid">
                    <p class="px-lg-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    <!-- <a class="btn mt-lg-4 mt-3 read scroll" href="#services" role="button" style="background-color:red;">Learn More</a> -->
                </div>
            </div>
        </div>
    </section>
    <!-- //banner bottom grids -->

 <!-- /services -->
    <!-- <section class="services py-5" id="services">
        <div class="container py-md-5">
		<h3 class="heading text-center mb-3 mb-sm-5">Services</h3>
            <div class="row ab-info">
                <div class="col-md-6 ab-content ab-content1">
                    <div class="ab-content-inner">
                        <a href="single.html"><img src="images/services2.jpg" alt="news image" class="img-fluid"></a>
                        <div class="ab-info-con">
                            <h4> Trim your Hair</h4>
                            <a href="single.html" class="read-more two btn m-0 px-3"><span class="fa fa-arrow-circle-o-right"> </span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ab-content ab-content1">
                    <div class="ab-content-inner">
                        <a href="single.html"><img src="images/services1.jpg" alt="news image" class="img-fluid"></a>
                        <div class="ab-info-con">
                            <h4>Trim your Beard</h4>
                            <a href="single.html" class="read-more two btn m-0 px-3"><span class="fa fa-arrow-circle-o-right"> </span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ab-info second mt-lg-4">
                <div class="col-md-3 ab-content">
                    <div class="ab-content-inner">
                        <a href="single.html"><img src="images/ser3.jpg" alt="news image" class="img-fluid"></a>
                        <div class="ab-info-con">
                            <h4>colouring</h4>
                            <a href="single.html" class="read-more two btn m-0 px-3"><span class="fa fa-arrow-circle-o-right"> </span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ab-content">
                    <div class="ab-content-inner">
                        <a href="single.html"><img src="images/ser4.jpg" alt="news image" class="img-fluid"></a>
                        <div class="ab-info-con">
                            <h4>Bathing</h4>
                            <a href="single.html" class="read-more two btn m-0 px-3"><span class="fa fa-arrow-circle-o-right"> </span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ab-content">
                    <div class="ab-content-inner">
                        <a href="single.html"><img src="images/ser5.jpg" alt="news image" class="img-fluid"></a>
                        <div class="ab-info-con">
                            <h4>drying</h4>
                            <a href="single.html" class="read-more two btn m-0 px-3"><span class="fa fa-arrow-circle-o-right"> </span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ab-content">
                    <div class="ab-content-inner">
                        <a href="single.html"><img src="images/ser6.jpg" alt="news image" class="img-fluid"></a>
                        <div class="ab-info-con">
                            <h4>Creams</h4>
                            <a href="single.html" class="read-more two btn m-0 px-3"><span class="fa fa-arrow-circle-o-right"> </span></a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section> -->
    <!-- /services -->

	<!-- pricing -->
<section class="pricing py-5">
	<div class="container py-md-5">
		<h3 class="heading text-capitalize text-center mb-3 mb-sm-5"> Our Pricing</h3>
		<div class="row pricing-grids">
			<div class="col-lg-6  mb-lg-0 mb-5">
				<div class="padding">
					 <h3>PRICES FOR WEIGHT TRAINING</h3>
					<!-- Item starts -->
					<div class="menu-item">
						<div class="row border-dot no-gutters">
							<div class="col-8 menu-item-name">
								<h6>Plan 1</h6>
							</div>
							<div class="col-4 menu-item-price text-right">
								<h6>₹7</h6>
							</div>
						</div>

					</div>
					<!-- Item ends -->
					<!-- Item starts -->
					<div class="menu-item my-4">
						<div class="row border-dot no-gutters">
							<div class="col-8 menu-item-name">
								<h6>Plan 2</h6>
							</div>
							<div class="col-4 menu-item-price text-right">
								<h6>₹10</h6>
							</div>
						</div>
					</div>
					<!-- Item ends -->
					<!-- Item starts -->
					<div class="menu-item">
						<div class="row border-dot no-gutters">
							<div class="col-8 menu-item-name">
								<h6>Plan 3</h6>
							</div>
							<div class="col-4 menu-item-price text-right">
								<h6>₹15</h6>
							</div>
						</div>

					</div>
					<!-- Item ends -->
					<!-- Item starts -->
					<div class="menu-item mt-4">
						<div class="row border-dot no-gutters">
							<div class="col-8 menu-item-name">
								<h6>Plan 4</h6>
							</div>
							<div class="col-4 menu-item-price text-right">
								<h6>₹15</h6>
							</div>
						</div>
					</div>
					<!-- Item ends -->

				</div>
			</div>
			<div class="col-lg-6  mb-lg-0 mb-5">
				<div class="padding">
					<h3>PRICES FOR ZUMBA</h3>
					<!-- Item starts -->
					<div class="menu-item">
						<div class="row border-dot no-gutters">
							<div class="col-8 menu-item-name">
								<h6>Plan 1</h6>
							</div>
							<div class="col-4 menu-item-price text-right">
								<h6>₹27</h6>
							</div>
						</div>

					</div>
					<!-- Item ends -->
					<!-- Item starts -->
					<div class="menu-item my-4">
						<div class="row border-dot no-gutters">
							<div class="col-8 menu-item-name">
								<h6>Plan 2</h6>
							</div>
							<div class="col-4 menu-item-price text-right">
								<h6>₹21</h6>
							</div>
						</div>

					</div>
					<!-- Item ends -->
					<!-- Item starts -->
					<div class="menu-item">
						<div class="row border-dot no-gutters">
							<div class="col-8 menu-item-name">
								<h6>Plan 3</h6>
							</div>
							<div class="col-4 menu-item-price text-right">
								<h6>₹25</h6>
							</div>
						</div>
					</div>
					<!-- Item ends -->
					<!-- Item starts -->
					<div class="menu-item mt-4">
						<div class="row border-dot no-gutters">
							<div class="col-8 menu-item-name">
								<h6>Plan 4</h6>
							</div>
							<div class="col-4 menu-item-price text-right">
								<h6>₹28</h6>
							</div>
						</div>
					</div>
					<!-- Item ends -->
				</div>
			</div>

		</div>
	</div>
</section>
<!-- //pricing -->
  <!--/order-now-->
    <section class="order-sec py-5">
        <div class="container py-md-5">
            <div class="test-info text-center">
                <h3 class="tittle order" style="color:red;">
                    <span>CALL US FOR ANY QUERIES</span>Our team will contact back immediately to clear queries</h3>
                <h4 class="tittle my-2">987654321</h4>

                <div class="read-more mx-auto m-0 text-center">
                    <a href="contact.php" class="read-more scroll btn" >Click here</a> </div>
            </div>
        </div>
    </section>
    <!--//order-now-->

 <!--/testimonials-->
    <section class="testimonials py-5" id="testimonials">
        <div class="container py-md-5">
               <h3 class="heading text-center mb-3 mb-sm-5">Client Reviews</h3>
            <div class="row mt-3">

                <div class="col-md-4 test-grid text-left px-lg-3">
                    <div class="test-info">

                        <p>Lorem Ipsum has been the industry's standard since the 1500s. Praesent ullamcorper dui turpis.</p>
                        <h3 class="mt-md-4 mt-3"> Abraham Smith</h3>

                        <div class="test-img text-center mb-3">
                            <img src="images/test1.jpg" class="img-fluid" alt="user-image">
                        </div>
                        <div class="mobl-footer test-soc text-center">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">
							<span class="fa fa-facebook-f"></span>
						</a>
                                </li>
                                <li class="mx-1">
                                    <a href="#">
							<span class="fa fa-twitter"></span>
						</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 test-grid text-left px-lg-3 py-sm-5 py-md-0 py-3">
                    <div class="test-info">

                        <p>Lorem Ipsum has been the industry's standard since the 1500s. Praesent ullamcorper dui turpis.</p>
                        <h3 class="mt-md-4 mt-3"> Mariana Noe</h3>
                        <div class="test-img text-center mb-3">
                            <img src="images/test2.jpg" class="img-fluid" alt="user-image">
                        </div>
                        <div class="mobl-footer test-soc text-center">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">
							<span class="fa fa-facebook-f"></span>
						</a>
                                </li>
                                <li class="mx-1">
                                    <a href="#">
							<span class="fa fa-twitter"></span>
						</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 test-grid text-left px-lg-3">
                    <div class="test-info">

                        <p>Lorem Ipsum has been the industry's standard since the 1500s. Praesent ullamcorper dui turpis.</p>
                        <h3 class="mt-md-4 mt-3">Nebula Nairobi</h3>

                        <div class="test-img text-center mb-3">
                            <img src="images/test3.jpg" class="img-fluid" alt="user-image">
                        </div>
                        <div class="mobl-footer test-soc text-center">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">
							<span class="fa fa-facebook-f"></span>
						</a>
                                </li>
                                <li class="mx-1">
                                    <a href="#">
							<span class="fa fa-twitter"></span>
						</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

<!--//testimonials-->
<!-- subscribe -->
<!-- <section class="subscribe" id="subscribe"  style="background-color:red;">
	<div class="container-fluid"  style="background-color:red;">
		<div class="row"  style="background-color:red;">
			<div class="col-md-5 d-flex subscribe-left p-lg-5 py-sm-5 py-4">
				<div class="news-icon mr-3">
					<span class="fa fa-paper-plane" aria-hidden="true"></span>
				</div>
				<div class="text" >
					<h3>Subscribe To Our Newsletter</h3>
				</div>
			</div>
			<div class="col-md-7 subscribe-right p-lg-5 py-sm-5 py-4">
				<form action="#" method="post">
					<input type="email" name="email" placeholder="Enter your email here" required="">
					<button class="btn1"><span class="fa fa-paper-plane" aria-hidden="true"></span></button>
				</form>
				<p>we never share your email with anyone else</p>
			</div>
		</div>
	</div>
</section> -->
<!-- //subscribe -->

<!-- footer -->
      <?php include "footer.php"?>
    <!-- //footer -->
</body>
</html>
