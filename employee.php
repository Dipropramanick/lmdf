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
    <script type="text/javascript" src="js/employee.js"></script>
    <style>
      #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;

      }

      #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }

      #customers tr:nth-child(even){background-color: #f2f2f2;}

      #customers tr:hover {background-color: #ddd;}

      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
      }
    </style>
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
		<li class="breadcrumb-item active" aria-current="page">Employees</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->
    <section class="content-info py-5" ng-app="employeeApp" ng-controller="employeeCtrl">
      <div class="container">
        <div class="contact-w3pvt-form mt-5">
            <form class="w3layouts-contact-fm" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group search">
                            <label for="userid">Search Employee</label>
                            <!-- <span class="fa fa-search"></span> -->
                            <input class="form-control" type="text"  name="Name" id="userid" placeholder="Enter UserId/Name/Mobile/Type" ng-model="empSearch">
                        </div>
                    </div>
                </div>

            </form>
        </div>
      </div>
      <div style="height:500px;overflow-y:scroll;">
        <table id="customers">
          <tr >
            <th>ID</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Type</th>
          </tr>

          <tr ng-repeat="emp in empList | filter:empSearch" style="cursor:pointer;" ng-click="empClick(emp)">
            <td >{{emp.id}}</td>
            <td>{{emp.name}}</td>
            <td>{{emp.phone}}</td>
            <td>{{emp.type}}</td>
          </tr>
</table>
</div>
    <div class="container">
      <a href="employee_add.php" class="btn btn-danger btn-block"><span class="fa fa-plus"></span> Add New Employee</a>&nbsp;
    </div>
    </section>
    <!-- //banner-botttom -->

<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->

</body>
</html>
