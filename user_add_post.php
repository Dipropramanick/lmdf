<?php
  error_reporting(0);
 session_start();
  if($_SESSION['login'] != 1){
    header("Location:login.php");
  }
?>
<?php
include "includes/header.php";
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Leon Maestro De Fitness</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Leone Maestro De Fitness" />
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
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Add Blog</li>
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

    move_uploaded_file($post_image_temp, "images/$post_image");
    session_start();
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];
//    $query = "INSERT INTO posts(post_category_id,post_title, post_author,post_date, post_image, post_content, post_tags,post_comment_count,post_status, user_id)";
    $query = "INSERT INTO posts(post_title, post_author,post_date, post_image, post_content, post_comment_count, user_id)";

    $query .= "VALUES('{$post_title}','{$username}',now(),'{$post_image}','{$post_content}',{$post_comment_count},{$userid})";

    $create_post_query = mysqli_query($connect, $query);

    header("Location:user_blog.php");

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
    <label for="post_image">Post Image</label>
    <input type="file" id="fname" name="image">
    </div>
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
