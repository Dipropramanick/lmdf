<?php
  error_reporting(0);
  session_start();
  // if($_SESSION['login'] == 0){
  //   header("Location:index.php");
  // }
?>
<?php
include "includes/Comment_header.php";
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
    <script type="text/javascript" src="js/user.js"></script>
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
		<li class="breadcrumb-item active" aria-current="page">Post</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->

<section class="banner-bottom py-5">
    <div class="container py-md-5">
<h3 class="heading text-center mb-3 mb-sm-5"></h3>
        <div class="single-w3pvt-page mt-md-5 mt-4 px-lg-5">
<?php
include "display_content.php";
?>
           <!-- <div class="row my-lg-5 mt-3 mx-0">
                <div class="col-lg-6 text-info pl-0">
                    <p>Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus suscipit tortor eget felis porttitor volutpat Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus suscipit tortor eget felis porttitor elementum id enim volutpat...</p>
                </div>
                <div class="col-lg-6 mt-3 team-img">
                    <div class="row">
                        <div class="col-6">
                            <img src="images/s1.jpg" class="img-fluid" alt="user-image">
                        </div>
                        <div class="col-6">
                            <img src="images/s2.jpg" class="img-fluid" alt="user-image">
                        </div>
                    </div>
                </div>
            </div>-->

<?php
include "comment.php";
?>
<?php
include "display_comment.php";
?>



        </div>


    </div>
</section>




    <!-- //banner-botttom -->
<script type="text/javascript">
// var profile = "";
// var loadFiles = function(event) {
//   var reader = new FileReader();
//   reader.onload = function(){
//     var output = document.getElementById('out1');
//     if(reader.result == null){
//       output.style.display = "none";
//     }else {
//       output.style.display = "block";
//       output.src = reader.result;
//       profile = reader.result;
//     }
//   };
//   reader.readAsDataURL(event.target.files[0]);
// };
</script>
<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->

</body>
</html>
