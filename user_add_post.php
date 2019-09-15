<?php
  error_reporting(0);
  session_start();
  if($_SESSION['login'] != 1){
    header("Location:dashboard.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
    <script type="text/javascript" src="js/login.js"></script>
    <style>
        .post_img_size{
            height:300px;
            width=300px;
        }
        .post_img_show{            
            display:none;
        }
        
    </style>
</head>

<body>

<!-- header -->
  <?php include "header.php";
        include "includes/header.php"?>
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
		<li class="breadcrumb-item active" aria-current="page">Login</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->
        <section class="content-info py-5">
        <?php

if(isset($_POST['submit_post'])){

    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
  //  $post_category_id = $_POST['post_category_id'];
  //  $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];


  //  $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $_post_date = date('d-m-y');
    $post_comment_count = 0;

    move_uploaded_file($post_image_temp, "blog_images/$post_image");
    session_start();
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];
    
    $query = "INSERT INTO posts(post_title,post_date, post_image, post_content, post_comment_count, user_id)";

    $query .= "VALUES('{$post_title}',now(),'{$post_image}','{$post_content}',{$post_comment_count},{$userid})";

    $create_post_query = mysqli_query($connect, $query);

    echo "<script>window.location.href='blog.php';</script>";

}





?>

<h3 style="text-align: center;">Add Post</h3>

<div class="container">
  <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="fname" name="title">
    </div>


<!--
    <div class="form-group">
    <label for="title">Author</label>
    <input type="text" id="fname" name="author">
    </div>
-->

<!--
    <div class="form-group">
    <label for="post_category_id">Category Id</label>
    <input type="text" id="fname" name="post_category_id">
    </div>
-->
<!--

    <div class="form-group">
    <label for="post_status">Status</label>
    <input type="text" id="fname" name="post_status">
    </div>
-->


    <div class="form-group">
    <label for="post_image">Post Image</label><br>
    <img src="images/ab1.jpg" class="post_img_size post_img_show post_img_load" ><br class="post_img_show"><br class="post_img_show">
    <input type="file" id="fname" onchange="readURL(this)" name="image">
    </div>
      <script type="text/javascript">
          
            function readURL(input) {
                $('.post_img_show').show();
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
            $('.post_img_load').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
    }
      </script>
<!--

    <div class="form-group">
    <label for="post_tags">Tags</label>
    <input type="text" id="fname" name="post_tags">
    </div>

-->
    <div class="form-group">
    <label for="post_content">Content</label>
    <textarea id="subject" name="post_content" style="height:200px;width:100%;"></textarea>
    </div>

    <input type="submit" name="submit_post"  value="Submit">
  </form>
</div>

    </section>
    <!-- //banner-botttom -->

<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->

</body>
</html>
  














