<?php
  error_reporting(0);
  session_start();
  if($_SESSION['login'] == 0){
    header("Location:index.php");
  }
?>

<html>
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
    <script type="text/javascript" src="js/employee_add.js"></script>
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
		<li class="breadcrumb-item active" aria-current="page">Add Employee</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->
    <section class="content-info py-5" ng-app="employeeAddApp" ng-controller="employeeAddCtrl">
        <div class="container py-md-5">
            <div class="text-center px-lg-5">
                <h3 class="heading text-center mb-3 mb-sm-5">Add New Employee</h3>
                <p>All fields are compulsory</p>
            </div>
            <div class="contact-w3pvt-form mt-5">
                <form class="w3layouts-contact-fm" method="post">
                  <p style="color:red;">{{error}}</p>
<!--
                  <div class="row">
                    <div class="col-lg-6">
                      <label for="">Profile Picture:&nbsp;&nbsp;</label>
                      <input id="inp" type="file" accept="image/*" value="capture/upload image" onchange="loadFile(event)"/>
                    </div>
                  </div>
-->
                  <div class="row">
                    <div class="col-sm-12">
                      <img id="out" style="margin:auto;margin-left:40%;height:200px;width:200px;display:none;border-radius:50%;">
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="userid">User Id</label>
                                <input class="form-control" type="number" min="1" name="Name" id="userid" placeholder="Enter User Id" ng-model="id" disabled>
                            </div>
                          </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" ng-model="name" name="Name" id="name" placeholder="Enter Employee Name" >
                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <p style="color:red;">{{mobError}}</p>
                                    <label for="phone">Mobile Number</label>
                                    <input class="form-control" type="number" min="1" name="Name" id="phone" placeholder="Enter Mobile Number" ng-model="phone" ng-change="mobChange()">
                                </div>
                              </div>
                                <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type">Employee Type</label>
                                    <select style="" id="type" class="form-control" ng-model="type">
                                      <option value="admin" style="height:57px;">Admin</option>
                                      <option value="trainer" style="height:57px;">Trainer</option>
                                      <option value="sales" style="height:57px;">Sales Respresentative</option>
                                    </select>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p style="color:red;">{{emailError}}</p>
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" min="1" name="email" id="email" placeholder="Enter Email" ng-model="email" ng-change="emailCheck()">
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <label for="dob">Date Of Birth</label>
                                    <input class="form-control" type="date" min="1" name="dob" id="dob" placeholder="Enter Date of Birth" ng-model="dob" style="height:57px;">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="salary">Salary</label>
                                            <input class="form-control" type="number" min="1" name="salary" id="salary" placeholder="Enter Salary" ng-model="salary">
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <label for="join">Date Of Joining</label>
                                        <input class="form-control" type="date" min="1" name="join" id="join" ng-model="join" style="height:57px;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <p style="color:red;">{{verError}}</p>
                                                <label for="verificaton">Aadhaar/Passport Number</label>
                                                <input class="form-control" type="text" min="1" name="verificaton" id="verificaton" placeholder="Enter Aadhaar/Passport Number" ng-model="verificaton" ng-change="verCheck()">
                                            </div>
                                          </div>
                                        </div>
                                        <p style="color:red;">{{passError}}</p>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password" ng-model="password" ng-change="passChange()">
                                                </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="form-group">
                                                      <label for="Cpassword">Confirm Password</label>
                                                      <input class="form-control" type="password" name="Cpassword" id="Cpassword" placeholder="Enter Confirm Password" ng-model="Cpassword" ng-change="passChange()">
                                                  </div>
                                                </div>
                                              </div>

                                              <div class="row">
                                                  <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label>Schedule: </label><br>
                                                          <label for="no">
                                                          <input type="radio" id="no" name="sch" ng-model="sch" ng-change="schChange()" value="0" style="height:20px;">None</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <label for="one">
                                                          <input type="radio" id="one" name="sch" ng-model="sch" ng-change="schChange()" value="1" style="height:20px;">One</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <label for="two">
                                                          <input type="radio" id="two" name="sch" ng-model="sch" ng-change="schChange()" value="2" style="height:20px;">Twice</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                      </div>
                                                    </div>
                                                    </div>
                                                    <h5 class="fsch">First Schedule</h5>
                                                    <div class="fsch1">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="ftimein">Time In</label>
                                                                <input type="time" id="ftimein" placeholder="Enter time" ng-model="ftimein">
                                                            </div>
                                                          </div>
                                                          <div class="col-lg-6">
                                                              <div class="form-group">
                                                                  <label for="ftimeout">Time Out</label>
                                                                  <input type="time" id="ftimeout" placeholder="Enter time" ng-model="ftimeout">
                                                              </div>
                                                            </div>
                                                        </div>
                                                        </div>

                                                        <h5 class="ssch">Second Schedule</h5>
                                                        <div class="ssch1">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="ftimein">Time In</label>
                                                                    <input type="time" id="ftimein" placeholder="Enter time" ng-model="stimein">
                                                                </div>
                                                              </div>
                                                              <div class="col-lg-6">
                                                                  <div class="form-group">
                                                                      <label for="ftimeout">Time Out</label>
                                                                      <input type="time" id="ftimeout" placeholder="Enter time" ng-model="stimeout">
                                                                  </div>
                                                                </div>
                                                            </div>
                                                          </div>
                                        <div class="form-group mx-auto mt-3">
                                            <button ng-click="employeeAddClick()" class="btn submit" style="background-color:red;">Add Employee</button>
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
