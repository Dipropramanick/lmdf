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
    <script type="text/javascript" src="js/plan_category_add.js"></script>
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
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Plan Category</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->
    <section class="content-info py-5" ng-app="planCategoryApp" ng-controller="planCategoryCtrl">
        <div class="container py-md-5">
            <div class="text-center px-lg-5">
                <h3 class="heading text-center mb-3 mb-sm-5">Add New Plan Category</h3>
            </div>
            <div class="contact-w3pvt-form mt-5">
                <form class="w3layouts-contact-fm" method="post">
                  <p style="color:red;">{{planError}}</p>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="userid">Add Plan Category</label>
                                <input class="form-control" type="text" min="1" name="Name" id="userid" placeholder="Enter a plan Category" ng-model="plan">
                            </div>
                        </div>
                        <div class="form-group mx-auto mt-3">
                            <button ng-click="addPlanClick()" class="btn btn-danger btn-lg" ><i class="fa fa-plus"> </i> Add Plan Category</button>
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
