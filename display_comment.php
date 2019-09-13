<?php
 if(isset($_GET['c_id'])){
     $the_c_id = $_GET['c_id'];
 }
?>



<div class="comment-sec-w3ls">
                    <h4 class="leave-w3ls mb-5">3 Comments</h4>
                    <ul class="list-unstyled">
                       <?php
include 'db.php';
session_start();
$query = "SELECT * FROM comments WHERE comment_post_id=$the_c_id";
$select_c_id = mysqli_query($connect,$query);
while($row = mysqli_fetch_assoc($select_c_id)){
    $comment_id = $row['comment_id'];
    $comment_post_id = $row['comment_post_id'];
    // $comment_author = $row['comment_author'];
    $comment_email = $row['comment_email'];
    $comment_content = $row['comment_content'];
    $comment_status = $row['comment_status'];
    $comment_date = $row['comment_date'];
    $comment_userid = $row['userid'];
    if($comment_userid  < 2000){
      $query1 = "SELECT * FROM employee WHERE id=$comment_userid";
      // echo "<script>alert('hello')</script>";
      $dp = "abc1.php?id={$comment_userid}";
    }else {
      $query1 = "SELECT * FROM user WHERE id=$comment_userid";
      $dp = "userProf.php?id={$comment_userid}";
    }

    $result = $conn->query($query1);
    while($row = mysqli_fetch_assoc($result)){
      $comment_author = $row['name'];
    }
?>
                        <li class="media">
                            <img class="mr-3 img-fluid" style="height:40px;" src="<?php echo $dp;?>" alt="">

                            <div class="media-body">
                                <h5 class="mt-0 mb-1"><?php echo $comment_author;?></h5>
                                <p class="mt-3"><?php
                                    echo $comment_content;?></p>
                                <?php
                                if($_SESSION['login'] == 1 && ($_SESSION['user_type'] == "admin" || $_SESSION['userid'] == $comment_userid)){
                                 echo "<a href='single.php?delete=$comment_id&c_id=" . $_GET['c_id'] . "'>Delete</a>";
                               }

                               ?>
                                <?php  deleteComments(); ?>
                            </div>
                        </li><br><br>
    <?php }

                        ?>


    <?php

    ?>
                        <!--<li class="media my-5 ml-3">
                            <img class="mr-3 img-fluid" src="images/sb2.jpg" alt="">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Jacke M
                                asito</h5>
                                <p class="mt-3">Integer pulvinar leo id viverra feugiat. Pellentesque Libero Justo, Semper At Tempus Vel, Ultrices In Sed Ligula. Nulla Uter Sollicitudin Velit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod magna.</p>
                            </div>
                        </li>
                        <li class="media ml-5">
                            <img class="mr-3 img-fluid" src="images/sb3.jpg" alt="">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">William James</h5>
                                <p class="mt-3">Integer pulvinar leo id viverra feugiat. Pellentesque Libero Justo, Semper At Tempus Vel, Ultrices In Sed Ligula. Nulla Uter Sollicitudin Velit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod magna.</p>
                            </div>
                        </li>-->
                    </ul>
                </div>
