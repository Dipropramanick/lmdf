<?php
  error_reporting(0);
  session_start();
  if( $_SESSION['login'] != 1){
    header("Location:login.php");
  }
?>
<?php ob_start();  ?>
<?php include "includes/function.php";?>
<?php include "includes/db.php";?>
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
<!--    <script type="text/javascript" src="js/login.js"></script>-->
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
		<li class="breadcrumb-item active" aria-current="page">Your Blog</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->

    <section class="services py-5" id="services">
        <div class="container py-md-5">
		<h3 class="heading text-center mb-3 mb-sm-5">Blogs</h3>
            <div class="row ab-info">
    
                       
            <?php
        session_start();
        $userid = $_SESSION['userid'];
        $query = "SELECT * FROM posts WHERE user_id={$userid}";
        $select_all_posts = mysqli_query($connect,$query);
        while($row = mysqli_fetch_assoc($select_all_posts)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_image = $row['post_image'];  
        ?>
        
            <div class="col-md-6 ab-content ab-content1">
                    <div class="ab-content-inner">
                       
                        <?php echo "<a href='single.php?c_id={$post_id}'>"?><img src="images/<?php echo $post_image; ?>" alt="news image" class="img-fluid"></a>
                        <div class="ab-info-con">
                                                   
                            <h4><?php echo $post_title ?></h4>
                            
                            <?php echo "<a href='user_edit_post.php?p_id={$post_id}'>Edit</a>"?>
                          <a href="single.php" class="read-more two btn m-0 px-3"><span class="fa fa-arrow-circle-o-right"> </span></a>
                         <?php echo "<a href='blog.php?delete=$post_id'>Delete</a>"?>
                         <?php  deletePosts();?> 
                        </div> 
                    </div>
                </div>
                <?php          }

     ?>

            </div>
</section>
    <!-- //banner-botttom -->

<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->

</body>
</html>
