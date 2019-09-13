<?php
  error_reporting(0);
  session_start();
  if($_SESSION['login'] == 0){
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
    <!-- <script type="text/javascript" src="js/angular.js"></script> -->
    <!-- <script type="text/javascript" src="js/plan.js"></script> -->
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
		<li class="breadcrumb-item active" aria-current="page">Taxes</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->
<?php
  include 'db.php';
  $sql = "SELECT * FROM tax";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $cgst = $row['cgst'];
        $sgst = $row['sgst'];
      }
  }
  if(isset($_POST['taxUpdate'])){

      $cgst = $_POST['cgst'];
      $sgst = $_POST['sgst'];
      $sql = "UPDATE tax SET cgst=$cgst,sgst=$sgst WHERE id=$id";
      $result = $conn->query($sql);
      // echo "<script>alert('Tax Updated');</script>";
      $resString = "Tax Updated.";
  }
 ?>
    <section class="content-info py-5" >
        <div class="container py-md-5">
            <div class="text-center px-lg-5">
                <h3 class="heading text-center mb-3 mb-sm-5">Taxes</h3>
                <p>All fields are compulsory</p>
            </div>
            <div class="contact-w3pvt-form mt-5">
              <p style="color:red;"><?php echo $resString; ?></p>
                <form action="" method="post" enctype="multipart/form-data">
                   <!-- class="w3layouts-contact-fm" method="POST"  -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="userid">CGST %</label>
                                <input class="form-control" type="number" name="cgst" id="userid" placeholder="Enter CGST%" value="<?php echo $cgst; ?>">
                            </div>
                          </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">SGST %</label>
                                <input class="form-control" type="number" name="sgst" id="name" placeholder="Enter SGST%" value="<?php echo $sgst; ?>" >
                            </div>
                        </div>
                        </div>




                                        <div class="row">
                                          <div class="col-lg-12">
                                            <input type="submit" class="btn submit btn-block" style="background-color:red;" name="taxUpdate" value="update">
                                          </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6">
                                  </div>
                                  <div class="col-lg-6">
                                  </div>
                                </div>

                </form>
            </div>
        </div>
    </section>
    <!-- //banner-botttom -->

<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->
<script type="text/javascript">
  function taxUpdate() {
    console.log("hi");
    alert("<?php echo $_GET['sgst']; ?>")
  }
</script>
</body>
</html>
