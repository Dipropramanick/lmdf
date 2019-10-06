<?php
  error_reporting(0);
  session_start();
  if($_SESSION['login'] == 0 || $_SESSION['user_type'] == "trainer" || $_SESSION['user_type'] == "user"){
    header("Location:index.php");
  }
?>


<?php
    if(isset($_POST['insert'])){
        echo "<script>console.log('".$_POST['image']."');</script>";
    }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/angular.js"></script>
    <script type="text/javascript" src="js/employee_add.js"></script>
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
		<li class="breadcrumb-item active" aria-current="page">Add Client</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->
    <section class="content-info py-5" ng-app="employeeAddApp" ng-controller="employeeAddCtrl">
        <div class="container py-md-5">
            <div class="text-center px-lg-5">
                <h3 class="heading text-center mb-3 mb-sm-5">Client Profile Picture</h3>

            </div>
            <?php
                        include "db.php";
                        $id = $_GET['id'];
                        if(isset($_POST['insert'])){                        
                            $info = getimagesize($_FILES['image']['tmp_name']);
    
                            if ($info === FALSE) {
                                echo "<script>window.location.href='user_profile.php?id=$id'</script>";
                            }else{
                                $pname = $_FILES['image']['name'];                                
                                $profileImageName = (string)$id;
                                $format = explode(".",$pname)[1];
                                $profileImageName = $profileImageName .".".$format;
                                $target = 'profile_images/'.$profileImageName;
                                move_uploaded_file($_FILES['image']['tmp_name'],$target);
                                $sql = "UPDATE user SET pic='$profileImageName' WHERE id=$id";
                                $result = $conn->query($sql);
                                echo "<script>window.location.href='user.php'</script>";
                            }
                        }
                    ?>
            <div class="contact-w3pvt-form mt-5" style="margin:auto;width:40%;">
                 <form method="post" action="" enctype="multipart/form-data"> 
                     <img src="images/prof.jpg" alt="Try later" style="margin:auto;min-height:200px; min-width:200px;height:200px; width:200px;border-radius:50%;" id="img_view" onclick="triggerClick()"><br><br>
                     <input type="file" name="image" onchange="displayImage(this)" id="image" style="display:none;" />  
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info btn-block" />  
                </form>    
            </div>
        </div>
    </section>
    <!-- //banner-botttom -->

<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->
<script>
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }
           }  
      });  
 });
    
function triggerClick(){
    document.querySelector('#image').click();
}    
function displayImage(e){
    if(e.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            document.querySelector('#img_view').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}    
 </script>  
</body>
</html>
