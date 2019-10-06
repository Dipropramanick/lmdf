<?php
  error_reporting(0);
  session_start();
  if($_SESSION['login'] == 0  || $_SESSION['user_type'] != "admin"){
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
    <script type="text/javascript" src="js/user.js"></script>
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
		<li class="breadcrumb-item active" aria-current="page">Feedback</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->
    <section class="content-info py-5">
    <h1 align="center">Feedback About You.</h1><br>

    
        <?php
            include "db.php";
            session_start();
            $id = $_SESSION['userid'];
            $sql = "SELECT * FROM pt WHERE trainerid=$id ORDER BY trainerid, rating DESC";
            $result = $conn->query($sql);
            $avg_rating = 0;
            $count = 0;
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $avg_rating += $row['rating'];
                    $count += 1;
                }
                $avg_rating = round($avg_rating/$count,1);
                echo "<h2 align='center'>Average Rating : $avg_rating <h2>";
            }
            $sql = "SELECT * FROM pt ORDER BY trainerid,rating DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 jumbotron"> 
                            <h2>Ratings: <?php echo $row['rating'];?></h2>
                            <br>
                            <h3>Trainer: 
                            <?php
                                $tid = $row['trainerid'];
                                $sql1 = "SELECT name FROM employee WHERE id=$tid";
                                $result1 = $conn->query($sql1);                                                   if ($result1->num_rows > 0) {
                                    while($row1 = $result1->fetch_assoc()) {   
                                        $name = $row1['name'];
                                    }
                                }  
                            echo $name;?></h3>
                            <br>
                            <h3>Feedback: <?php echo $row['fb_text'];?></h3>
                        </div>
                    </div>
                </div>
            <?php
                }
            }else{
        ?>
        <h3 align="center">No Feedbacks Given</h3>
        <?php }?>
    
    </section>
    <!-- //banner-botttom -->

<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->

</body>
</html>
