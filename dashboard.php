<?php
  error_reporting(0);
  session_start();
  if(isset($_SESSION['login']) == 0){
      
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
    <!-- <script type="text/javascript" src="js/dashboard.js"></script> -->
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
		<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->
    <section class="content-info py-5" >
        <div class="container py-md-5">
            <div class="text-center px-lg-5">
                <h3 class="heading text-center mb-3 mb-sm-5">Dashboard</h3>
            </div>

            <!-- ============================================== ADMIN DASHBOARD =========================== -->
      <?php if(isset($_SESSION['login']) && $_SESSION['user_type'] == "admin"){?>
        <div class="row">
          <div class="col-lg-6">
            <a href="user_add.php" class="btn btn-success" style="width:100%;padding:100px;"><span class="fa fa-plus"></span> Add Client</a>&nbsp;
          </div>
          <div class="col-lg-6">
            <a href="user.php" class="btn btn-primary" style="width:100%;padding:100px;"><span class="fa fa-edit"></span> Edit / <span class="fa fa-trash"></span> Delete Client</a>&nbsp;
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <a href="employee_add.php" class="btn btn-warning" style="width:100%;padding:100px;"><span class="fa fa-plus"></span> Add Employee</a>&nbsp;
          </div>
          <div class="col-lg-6">
            <a href="employee.php" class="btn btn-danger" style="width:100%;padding:100px;"><span class="fa fa-edit"></span> Edit / <span class="fa fa-trash"></span> Delete Employee</a>&nbsp;
          </div>
        </div>
        <!-- <br>  -->
        <div class="row">
          <div class="col-lg-6">
            <a href="plan_category_add.php" class="btn btn-primary" style="width:100%;padding:100px;"><span class="fa fa-plus"></span> Add Plan Category</a>&nbsp;
          </div>
          <div class="col-lg-6">
            <a href="plan_category.php" class="btn btn-success" style="width:100%;padding:100px;"><span class="fa fa-edit"></span> Edit / <span class="fa fa-trash"></span> Delete Plan Category</a>&nbsp;
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <a href="plan_add.php" class="btn btn-danger" style="width:100%;padding:100px;"><span class="fa fa-plus"></span> Add Plan</a>&nbsp;
          </div>
          <div class="col-lg-6">
            <a href="plan.php" class="btn btn-warning" style="width:100%;padding:100px;"><span class="fa fa-edit"></span> Edit / <span class="fa fa-trash"></span> Delete Plans</a>&nbsp;
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-6">
            <a href="blog.php" class="btn btn-primary" style="width:100%;padding:100px;"><span class="fa fa-edit"></span> Blog</a>&nbsp;
          </div>
          <div class="col-lg-6">
            <a href="user_blog.php" class="btn btn-danger" style="width:100%;padding:100px;"><span class="fa fa-trash"></span> Delete Blogs/Comments</a>&nbsp;
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <a href="user_blog.php" class="btn btn-success" style="width:100%;padding:100px;"><span class="fa fa-edit"></span> Your Blogs</a>&nbsp;
          </div>
          <div class="col-lg-6">
            <a href="pt_view.php" class="btn btn-primary" style="width:100%;padding:100px;">Personal Trainees</a>&nbsp;
          </div>
        <div class="col-lg-6">
            <a href="pt_fb_view.php" class="btn btn-secondary" style="width:100%;padding:100px;">Feedbacks About You</a>&nbsp;
          </div>    
         <div class="col-lg-6">
            <a href="about_client.php" class="btn btn-warning" style="width:100%;padding:100px;"><span class="fa fa-address-card"></span> About Clients</a>&nbsp;
          </div>
        <div class="col-lg-6">
            <a href="pt_fb_view_admin.php" class="btn btn-primary" style="width:100%;padding:100px;">All Feedbacks</a>&nbsp;
          </div>
          <div class="col-lg-6">
            <a href="user.php" class="btn btn-danger" style="width:100%;padding:100px;">Attendance</a>&nbsp;
          </div>
          <div class="col-lg-6">
            <a href="due_view.php" class="btn btn-success" style="width:100%;padding:100px;">Due Payments</a>&nbsp;
          </div>    

        </div>    
      <?php }else if(isset($_SESSION['login']) && $_SESSION['user_type'] == "sales") {?>
        <div class="row">
          <div class="col-lg-6">
            <a href="user_add.php" class="btn btn-warning" style="width:100%;padding:100px;"><span class="fa fa-plus"></span> Add Client</a>&nbsp;
          </div>
          <div class="col-lg-6">
            <a href="user.php" class="btn btn-danger" style="width:100%;padding:100px;"><span class="fa fa-edit"></span> Edit / <span class="fa fa-trash"></span> Delete Client</a>&nbsp;
          </div>
            <div class="col-lg-6">
            <a href="due_view.php" class="btn btn-success" style="width:100%;padding:100px;">Due Payments</a>&nbsp;
          </div>
        </div>
            

      <?php }else if(isset($_SESSION['login']) && $_SESSION['user_type'] == "trainer") {?>
        <div class="row">
          <div class="col-lg-6">
            <a href="about_client.php" class="btn btn-warning" style="width:100%;padding:100px;"><span class="fa fa-address-card"></span> About Clients</a>&nbsp;
          </div>
          <div class="col-lg-6">
            <a href="user.php" class="btn btn-danger" style="width:100%;padding:100px;">Attendance</a>&nbsp;
          </div>
        <div class="col-lg-6">
            <a href="pt_view.php" class="btn btn-primary" style="width:100%;padding:100px;">Personal Trainees</a>&nbsp;
          </div>
        <div class="col-lg-6">
            <a href="pt_fb_view.php" class="btn btn-success" style="width:100%;padding:100px;">Feedbacks About You</a>&nbsp;
          </div>
        </div>
            

    <?php }else if(isset($_SESSION['login']) && $_SESSION['user_type'] == "user") {?>
      <div class="row">
        <?php
            include "db.php";
            $id = $_SESSION['userid'];
            $sql = "SELECT fb FROM pt WHERE userid=$id ORDER BY id DESC LIMIT 1";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {        
                $fb = $row['fb'];
            }
            if($fb == 1){
          ?>
          <div class="col-lg-6">
          <a href="feedback.php?id=<?php echo $id;?>" class="btn btn-success" style="width:100%;padding:100px;">Give Feedback</a>&nbsp;
          </div>
          <?php } ?>  
        <div class="col-lg-6">
          <a href="about_trainer.php" class="btn btn-warning" style="width:100%;padding:100px;"><span class="fa fa-address-card"></span>&nbsp;About Trainer</a>&nbsp;
        </div>
        <div class="col-lg-6">
            <?php $id = $_SESSION['userid'];?>
          <a href="view_pay_user.php?id=<?php echo $id;?>" class="btn btn-primary" style="width:100%;padding:100px;">View Payments</a>&nbsp;
        </div>
        <div class="col-lg-6">
          <a href="login.php" class="btn btn-danger" style="width:100%;padding:100px;">Attendance</a>&nbsp;
        </div>
          
      </div>
    <?php } ?>


        </div>
    </section>
    <!-- //banner-botttom -->

<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->

</body>
</html>
