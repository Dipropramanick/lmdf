<?php
addComments();
?>

<?php
  session_start();
  if ($_SESSION['login'] == 1) {
 ?>
                   <div class="comment-bottom w3pvt_mail_grid_right p-0 my-lg-5 my-4">
                    <h4 class="leave-w3ls mb-5">Leave a Reply</h4>
                    <form action="" class="w3ls-contact-fm" method="post">


                        <div class="form-group">
                            <label>Write Message</label>
                            <textarea class="form-control" name="comment_content" placeholder="" required=""></textarea>
                        </div>
                        <!-- <div class="row leave-comment">
                            <div class="col-lg-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" name="comment_author" placeholder="" required="">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="comment_email" placeholder="" required="">
                            </div>
                        </div> -->

                        <button type="submit" class="btn read mt-3" name="comment_c"> Submit</button>
                    </form>
                </div>
<?php
}
 ?>
