<?php
  error_reporting(0);
  session_start();
  if($_SESSION['login'] == 0 || !($_SESSION['user_type'] == "user")){
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
    <style>
        .checked {
            color: orange;
    
        }
</style>
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
<?php 
    include "db.php";
    
    
    $id = $_GET['id'];
    if(empty($id)){
        echo "<script>window.location.href = 'index.php';</script>";
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
    
    $sql = "SELECT * from pt where userid=$id and fb=1";
    $result = $conn->query($sql);
    if ($result->num_rows <= 0) {
        echo "<script>window.location.href = 'index.php';</script>";
    }
?>
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
    <section class="content-info py-5">
        
        <h1 align="center">Feedback: Session <?php echo $sess_count-1;?></h1>
      <div class="container" style="margin-top:50px;">
           <p>Ratings:</p>
            <span  onmouseover="starmark(this)" onclick="starmark(this)" id="1" style="font-size:40px;cursor:pointer;"  class="fa fa-star checked"></span>
            <span onmouseover="starmark(this)" onclick="starmark(this)" id="2"  style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
            <span onmouseover="starmark(this)" onclick="starmark(this)" id="3"  style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
            <span onmouseover="starmark(this)" onclick="starmark(this)" id="4"  style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
            <span onmouseover="starmark(this)" onclick="starmark(this)" id="5"  style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
      </div>
    <div class="container" style="margin-top:30px;">
        <p id="fb_err" style="color:red;display:none;" >Please comment on the issue to submit</p>
        <div class="row">
            <div class="col-lg-12">
                <textarea class="form-control" id="feedback_text" rows="10" name="Message" placeholder="" required="" style="resize:none;"></textarea>
            </div>
        </div>
    </div>    
    <div class="container" style="margin-top:30px;">
      <button onclick="result()" class="btn btn-danger btn-block"><span class="fa fa-plus"></span> Submit Feedback</button>&nbsp;
    </div>
    </section>
    <!-- //banner-botttom -->

<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->
<script>
var count;
function starmark(item)
{
count=item.id[0];
sessionStorage.starRating = count;
var subid= item.id.substring(1);
for(var i=0;i<5;i++)
{
if(i<count)
{
document.getElementById((i+1)+subid).style.color="orange";
}
else
{
document.getElementById((i+1)+subid).style.color="black";
}
}
    
if(count<=4){
    document.getElementById('feedback_text').style.display = "block";
}else{
    document.getElementById('feedback_text').style.display = "none";
}    
}
function result()
{
    var fb_text = document.getElementById('feedback_text').value;
//    alert(fb_text);
    if(count<=4){
        if(fb_text == ""){
            document.getElementById('fb_err').style.display = "block";
        }else{
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
//                document.getElementById("txtHint").innerHTML = this.responseText;
                window.location.href = "dashboard.php";
            }
            };
        xmlhttp.open("GET", "savefb.php?c=" +count+"&t="+fb_text, true);
        xmlhttp.send();
        }
    }else{
        var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
//                document.getElementById("txtHint").innerHTML = this.responseText;
                window.location.href = "dashboard.php";
            }
            };
        xmlhttp.open("GET", "savefb.php?c=" +count+"&t="+"nil", true);
        xmlhttp.send();
    }
    
}
</script>
</body>
</html>
