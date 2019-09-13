<?php
  session_start();
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
<header>
	<div class="container">
		<div class="header d-lg-flex justify-content-between align-items-center">
			<div class="header-agile">
				<h1>
					<a class="navbar-brand logo" href="index.php" style="color:#ff3a3a;">
					 <img src="images/logo.png" alt="" style="height:50px;"><img src="images/logo1.png" alt="" style="width:170px;">
					</a>
				</h1>
			</div>
			<div class="nav_w3ls">
				<nav>
					<label for="drop" class="toggle mt-lg-0 mt-1"><span class="fa fa-bars" aria-hidden="true"></span></label>
					<input type="checkbox" id="drop" />
						<ul class="menu">
              <!-- ============================= ADMIN NAVBAR ====================================== -->
              <?php if(isset($_SESSION['login']) && $_SESSION['user_type'] == "admin"){?>
                <li class="mr-lg-3 mr-2"><a >Welcome, <?php session_start(); echo $_SESSION['username']; ?></a></li>
                <li class="mr-lg-3 mr-2 p-0">
  							<label for="drop-2" class="toggle">Employees <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
  							<a href="#">Employees <span class="fa fa-angle-down" aria-hidden="true"></span></a>
  							<input type="checkbox" id="drop-2"/>
  							<ul class="inner-dropdown">
  								<li><a href="employee_add.php">Add Employee</a></li>
  								<li><a href="employee.php">Edit/Delete Employee</a></li>
  							</ul>
  							</li>

                <li class="mr-lg-3 mr-2 p-0">
  							<label for="drop-3" class="toggle">Plans <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
  							<a href="#">Plans <span class="fa fa-angle-down" aria-hidden="true"></span></a>
  							<input type="checkbox" id="drop-3"/>
  							<ul class="inner-dropdown">
  								<li><a href="services.html">Plan Category</a></li>
                  <li><a href="single.html">Add Plan</a></li>
  								<li><a href="single.html">Edit/Delete Plan</a></li>
  							</ul>
  							</li>

                <li class="mr-lg-3 mr-2 p-0">
  							<label for="drop-4" class="toggle">Clients <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
  							<a href="#">Client <span class="fa fa-angle-down" aria-hidden="true"></span></a>
  							<input type="checkbox" id="drop-4"/>
  							<ul class="inner-dropdown">
  								<li><a href="services.html">Add Client</a></li>
                  <li><a href="single.html">Edit/Delete Client</a></li>
  							</ul>
  							</li>
                <li class="mr-lg-3 mr-2"><a href="dashboard.php">Dashboard</a></li>
                <li class="mr-lg-3 mr-2 p-0">
  							<label for="drop-5" class="toggle">Blog <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
  							<a href="#">Blog <span class="fa fa-angle-down" aria-hidden="true"></span></a>
  							<input type="checkbox" id="drop-5"/>
  							<ul class="inner-dropdown">
  								<li><a href="blog.php">All Blogs</a></li>
  								<li><a href="user_add_post.php">Add Blog</a></li>
  								<li><a href="user_blog.php">Your Blogs</a></li>
  							</ul>
  							</li>
              <!-- ============================= //ADMIN NAVBAR ====================================== -->


              <!-- ============================= SALES NAVBAR ====================================== -->
              <?php }else if(isset($_SESSION['login']) && $_SESSION['user_type'] == "sales"){?>
              <li class="mr-lg-3 mr-2"><a >Welcome, <?php session_start(); echo $_SESSION['username']; ?></a></li>
							<li class="mr-lg-3 mr-2"><a href="login.php">Add Client</a></li>
              <li class="mr-lg-3 mr-2"><a href="contact.php">Edit/Delete Client</a></li>
              <li class="mr-lg-3 mr-2"><a href="contact.php">Attendance</a></li>
              <li class="mr-lg-3 mr-2"><a href="dashboard.php">Dashboard</a></li>
              <li class="mr-lg-3 mr-2 p-0">
  							<label for="drop-2" class="toggle">Blog <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
  							<a href="#">Blog <span class="fa fa-angle-down" aria-hidden="true"></span></a>
  							<input type="checkbox" id="drop-2"/>
  							<ul class="inner-dropdown">
  								<li><a href="blog.php">All Blogs</a></li>
  								<li><a href="user_add_post.php">Add Blog</a></li>
  								<li><a href="user_blog.php">Your Blogs</a></li>
  							</ul>
  							</li>
              <!-- ============================= //SALES NAVBAR ====================================== -->

              <!-- ============================= TRAINER NAVBAR ====================================== -->
            <?php }else if(isset($_SESSION['login']) && $_SESSION['user_type'] == "trainer"){?>
              <li class="mr-lg-3 mr-2"><a >Welcome, <?php session_start(); echo $_SESSION['username']; ?></a></li>
              <li class="mr-lg-3 mr-2"><a href="login.php">My Clients</a></li>
              <li class="mr-lg-3 mr-2"><a href="contact.php">Attendance</a></li>
              <li class="mr-lg-3 mr-2"><a href="dashboard.php">Dashboard</a></li>
              <li class="mr-lg-3 mr-2 p-0">
  							<label for="drop-2" class="toggle">Blog <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
  							<a href="#">Blog <span class="fa fa-angle-down" aria-hidden="true"></span></a>
  							<input type="checkbox" id="drop-2"/>
  							<ul class="inner-dropdown">
  								<li><a href="blog.php">All Blogs</a></li>
  								<li><a href="user_add_post.php">Add Blog</a></li>
  								<li><a href="user_blog.php">Your Blogs</a></li>
  							</ul>
  							</li>
              <!-- ============================= //TRAINER NAVBAR ====================================== -->
            <?php }else if(isset($_SESSION['login']) && $_SESSION['user_type'] == "user"){?>
              <li class="mr-lg-3 mr-2"><a >Welcome, <?php session_start(); echo $_SESSION['username']; ?></a></li>
              <li class="mr-lg-3 mr-2"><a href="login.php">My Trainer</a></li>
              <li class="mr-lg-3 mr-2"><a href="contact.php">Attendance</a></li>
              <li class="mr-lg-3 mr-2 p-0">
  							<label for="drop-2" class="toggle">Blog <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
  							<a href="#">Blog <span class="fa fa-angle-down" aria-hidden="true"></span></a>
  							<input type="checkbox" id="drop-2"/>
  							<ul class="inner-dropdown">
  								<li><a href="blog.php">All Blogs</a></li>
  								<li><a href="user_add_post.php">Add Blog</a></li>
  								<li><a href="user_blog.php">Your Blogs</a></li>
  							</ul>
  							</li>
              <li class="mr-lg-3 mr-2"><a href="dashboard.php">Dashboard</a></li>
              <?php }?>

              <?php if(isset($_SESSION['login']) && $_SESSION['login'] == 1){?>
                <!-- <li class="mr-lg-3 mr-2"><a href="logout.php">Blog</a></li> -->
                <li class="mr-lg-3 mr-2"><a href="logout.php">Logout</a></li>

              <?php }else{ ?>
              <li class="mr-lg-3 mr-2 active"><a href="index.php">Home</a></li>
							<li class="mr-lg-3 mr-2"><a href="login.php">Login</a></li>
             <li class="mr-lg-3 mr-2"><a href="blog.php">Blogs</a></li>
              <li class="mr-lg-3 mr-2"><a href="contact.php">Contact Us</a></li>
            <?php }?>
						</ul>
				</nav>
			</div>

		</div>
	</div>
</header>
</body>
</html>
