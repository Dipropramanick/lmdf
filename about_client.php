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
    <script type="text/javascript" src="js/abtClient.js"></script>

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
		<li class="breadcrumb-item active" aria-current="page">About Client</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->
    <section class="content-info py-5" ng-app="trainerApp" ng-controller="trainerCtrl" style="padding:10px;">
      <div class="container" style="border: 1px solid black;padding:20px;margin-top:15px;" ng-repeat="cl in clientList">
        <div class="" style="display: flex;">
          <div class="">
            <img src="userProf.php?id={{cl.id}}" alt="" style="margin-left:auto;margin-right: auto;margin-top: 20px;height:100px;width:100px;border-radius:50%;">
          </div>
          <div class="" style="padding-left:20px;padding-top:30px;">
            <h4>ID:&nbsp;{{ cl.id }}</h4>
            <br>
            <h4>{{ cl.name }}</h4>
          </div>
        </div>

      </div>
    </section>
    <!-- //banner-botttom -->

<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->

</body>
</html>
