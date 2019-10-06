<?php
  error_reporting(0);
  session_start();
  if($_SESSION['login'] == 0 || ($_SESSION['user_type'] != "admin" && $_SESSION['user_type'] != "trainer")){
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
<!--    <script type="text/javascript" src="js/angular.js"></script>-->
<!--    <script type="text/javascript" src="js/pt_trainer_view.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>

<!-- header -->
  <?php include "header.php"?>
<!-- //header -->
<!-- banner -->
<section class="inner-page-banner" id="home">
</section>
<!-- //banner -->
 <?php
    include "db.php";
    $id = $_GET['id'];
    $sql = "SELECT * from user where id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $phone = $row['phone'];
            $pic = $row['pic'];
            $status = $row['status'];
      }
    }
    
    $sql = "SELECT * from pt where userid=$id";
    $result = $conn->query($sql);
    $sess_count = 0;
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $sess_count += 1;    
      }
    }
    if($status == 0){
        $sess_count += 1;
    }
    session_start();
    $_SESSION["sess_num"] = $sess_count;

 ?>
<!-- page details -->
<div class="breadcrumb-agile">
	<ol class="breadcrumb mb-0">
		<li class="breadcrumb-item">
			<a href="index.php">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">About Personal Trainee</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->
    <section class="content-info py-5" style="padding:10px;">
      <div class="container" style="border: 1px solid black;padding:20px;margin-top:15px;" >
        <div class="" style="display: flex;">
          <div class="">
            <img src="profile_images/<?php echo $pic;?>" alt="" style="margin-left:auto;margin-right: auto;margin-top: 20px;height:100px;width:100px;border-radius:50%;">
          </div>
          <div class="" style="padding-left:20px;padding-top:30px;">
            <h4>ID:&nbsp;<?php echo $id;?></h4>
            <br>
            <h4>Name : <?php echo $name; ?></h4>
            <br>
            <h4>Mobile : <?php echo $phone; ?></h4>
            <br>
            <h4>Session No : <?php echo $sess_count; ?></h4>
            <br>
            <button class="btn btn-lg btn-block btn-warning startBtn" onclick="start()">Start Session</button>  
            <button class="btn btn-lg btn-block btn-warning endBtn" onclick="endf()">End Session</button> 
          </div>
        </div>

      </div>
    </section>
    <!-- //banner-botttom -->
    <script>
        if(Number('<?php echo $status;?>') == 0){           
            document.querySelector(".startBtn").style.display = "block";
            document.querySelector(".endBtn").style.display = "none";
        }else{
            document.querySelector(".startBtn").style.display = "none";
            document.querySelector(".endBtn").style.display = "block";
        }
        
        function start(){
            var id = Number('<?php echo $id;?>')
            $.ajax({
                type: 'POST',
                url: "pt_session_start.php", 
                data: id.toString(),
                dataType: "text",
                success: function(result){  
                   if(result == "no"){
                       alert("Personal Trainee Feedback Not Given");
                   }else{
                       document.querySelector(".startBtn").style.display = "none";
                       document.querySelector(".endBtn").style.display = "block"; 
                   }
                },
                error: function(result){
                    alert("failed")
                }
            });
        }
        
        function endf(){
            var id = Number('<?php echo $id;?>')
            $.ajax({
                type: 'POST',
                url: "pt_session_end.php", 
                data: id.toString(),
                dataType: "text",
                success: function(result){
                    window.location.href = "pt_detail.php?id=" + id.toString();
                },
                error: function(result){
                    alert("failed")
                }
            });
        }
    </script>
<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->

</body>
</html>
