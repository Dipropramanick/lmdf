<?php
if(isset($_GET['c_id'])){

 $the_c_id = $_GET['c_id'];

}

$query = "SELECT * FROM posts WHERE post_id =$the_c_id";
$select_c_id = mysqli_query($connect,$query);
while($row = mysqli_fetch_assoc($select_c_id)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_date = $row['post_date'];

}


if(isset($_SERVER['HTTPS']) &&
      $_SERVER['HTTPS'] === 'on')
$wlink = "https";
else
  $wlink = "http";

// Here append the common URL
// characters.
$wlink .= "://";

// Append the host(domain name,
// ip) to the URL.
$wlink .= $_SERVER['HTTP_HOST'];

// Append the requested resource
// location to the URL
$wlink .= $_SERVER['PHP_SELF'];
$wlink .= "?c_id={$the_c_id}";


?>
<div class="content-sing-w3ls px-lg-5">

                    <center><img class="img-fluid" src="images/<?php echo $post_image;?>" alt=""></center>
                    <center><h2><?php echo $post_title?></h2></center>
                    <center><h3>Posted By:-<?php echo $post_author?></h3></center>
                    <center><h4>Posted On:<?php echo $post_date?></h4></center>
                    <p class="mt-3"><?php echo $post_content;?></p>



                    <ul class="w3ls_social_list list-unstyled mt-4">
                        <li class="lead">
                            Catch On Social :
                        </li>
                        <li>
                            <a href="https://www.facebook.com/sharer/sharer.php?app_id=407361273223625&sdk=joey&u=<?php echo $wlink;?>" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=580')" class="w3pvt_facebook">
                                <span class="fa fa-facebook-f"></span>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="<?php echo $post_title;?>&#x85;" data-via="lmdf" data-hashtags="motivation,fitness,gym" data-lang="en" data-show-count="true">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </li>
                        <li>
                            <a href="#" class="w3pvt_dribble">
                                <span class="fa fa-instagram"></span>
                            </a>
                        </li>
                        <!-- <li class="ml-2">
                            <a href="#" class="w3pvt_google">
                                <span class="fa fa-google-plus"></span>
                            </a>
                        </li> -->
                    </ul>
        </div>
