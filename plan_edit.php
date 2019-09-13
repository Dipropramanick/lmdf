<?php
  error_reporting(0);
  session_start();
  if($_SESSION['login'] == 0){
    header("Location:index.php");
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
    <script type="text/javascript" src="js/angular.js"></script>
    <script type="text/javascript" src="js/plan.js"></script>
</head>

<body>

<!-- header -->
  <?php include "header.php"?>
<!-- //header -->
<!-- banner -->
<section class="inner-page-banner" id="home">
</section>
<!-- //banner -->

<!-- page details -->
<div class="breadcrumb-agile">
	<ol class="breadcrumb mb-0">
		<li class="breadcrumb-item">
			<a href="index.php">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Edit Plan</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->
    <section class="content-info py-5" ng-app="planEditApp" ng-controller="planEditCtrl">
        <div class="container py-md-5">
            <div class="text-center px-lg-5">
                <h3 class="heading text-center mb-3 mb-sm-5">Edit Plan</h3>
                <p>All fields are compulsory</p>
            </div>
            <div class="contact-w3pvt-form mt-5">
                <form class="w3layouts-contact-fm" method="post">
                  <p style="color:red;">{{planError}}</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="userid">Plan Name</label>
                                <input class="form-control" type="text" name="Name" id="userid" placeholder="Enter Plan name" ng-model="name" >
                            </div>
                          </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Price</label>
                                <input class="form-control" type="number" ng-model="price" name="Name" id="name" placeholder="Enter Price Amount" ng-change="planChange()">
                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="phone">Plan Category</label>
                                    <select class="form-control" ng-model="category" ng-options="cg for cg in categories">
                                    </select>
                                </div>
                              </div>
                                <!-- <div class="col-lg-6">
                                  <div class="form-group">
                                      <label for="taxt">Tax Type</label>
                                      <select class="form-control" id="taxt" ng-model="taxt" ng-change="planChange()">
                                        <option value="Inclusive">Inclusive</option>
                                        <option value="Exclusive">Exclusive</option>
                                        <option value="None">None</option>
                                      </select>
                                  </div>
                            </div> -->
                            </div>

                            <!-- <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="email">Tax Percentage</label>
                                        <input class="form-control" type="number" min="1" name="email" id="taxp" placeholder="Enter Tax Percentage" ng-model="taxp" ng-change="planChange()">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="salary">Final Price</label>
                                            <input class="form-control" type="number" min="1" name="salary" id="salary" placeholder="Final Price" ng-model="finalPrice" disabled>
                                        </div>
                                      </div>
                                    </div> -->


                                        <p style="color:red;">{{passError}}</p>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="password">Years</label>
                                                    <input class="form-control" type="text" name="password" id="password" placeholder="Enter Years" ng-model="year" ng-change="passChange()">
                                                </div>
                                              </div>
                                              <div class="col-lg-6">
                                                <label for="months">Months</label>
                                                <select class="form-control" id="months" ng-model="months">
                                                  <option value="0">0</option>
                                                  <option value="1">1</option>
                                                  <option value="2">2</option>
                                                  <option value="3">3</option>
                                                  <option value="4">4</option>
                                                  <option value="5">5</option>
                                                  <option value="6">6</option>
                                                  <option value="7">7</option>
                                                  <option value="8">8</option>
                                                  <option value="9">9</option>
                                                  <option value="10">10</option>
                                                  <option value="11">11</option>
                                                </select>
                                                </div>
                                                <div class="form-group mx-auto mt-3">
                                                    <button ng-click="pUpClick()" class="btn submit" style="background-color:red;">Update</button>
                                                    <button ng-click="pDelClick()" class="btn submit" style="background-color:red;">Delete</button>
                                                </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-6">
                                  </div>
                                  <div class="col-lg-6">
                                  </div>
                                </div>





                </form>
            </div>
        </div>
    </section>
    <!-- //banner-botttom -->

<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->

</body>
</html>
