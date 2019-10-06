<?php
  error_reporting(0);
  session_start();
  if($_SESSION['login'] == 0 || !($_SESSION['user_type'] == "admin")){
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
    <script type="text/javascript" src="js/due.js"></script>
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
		<li class="breadcrumb-item active" aria-current="page">Due Payments</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->
    <?php 
        include "db.php";
        $id = $_GET['id'];
        $sql = "SELECT * FROM due WHERE user_id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $due_amt = $row['due_amt'];
            }
        }
        
    ?>
    <section class="content-info py-5" ng-app="duePayApp" ng-controller="duePayCtrl">
      <div class="container">
          <h1 align="center">Due Payment</h1>
          <br><br>
          <h3>USER ID : <?php echo $id;?></h3><br>
          <h3>DUE AMOUNT : <?php echo $due_amt;?></h3>
          <br>
        <div class="row">
              <div class="col-lg-12">
                  <div class="form-group">
                      <h3>Payment: </h3><br>
                      <label for="no">
                      <input type="radio" id="no" name="sch" ng-model="method" value="0" style="height:20px;">Cash</label>&nbsp;&nbsp;&nbsp;&nbsp;
                      <label for="one">
                      <input type="radio" id="one" name="sch" ng-model="method" value="1" style="height:20px;">Credit/Debit Card</label>&nbsp;&nbsp;&nbsp;&nbsp;
                      <label for="two">
                      <input type="radio" id="two" name="sch" ng-model="method" value="2" style="height:20px;">Cheque/UPI/Other</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
              </div>
       </div> 
       <div class="row">
            <div class="col-lg-12">
                <button class="btn btn-lg btn-block btn-danger" ng-click="duePayClick()">Pay Amount</button>
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
