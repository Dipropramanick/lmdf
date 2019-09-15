
<?php   
if(isset($_GET['p_id'])){
    
 $the_post_id = $_GET['p_id'];    
    
}


$query = "SELECT * FROM posts WHERE post_id =$the_post_id ";
$select_posts_by_id = mysqli_query($connect,$query);

while($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    
}
if(isset($_POST['update_post'])){
    
    $post_title = $_POST['title'];
//    $post_author = $_POST['author'];
//    $post_category_id = $_POST['post_category_id'];
//    $post_status = $_POST['post_status'];
    
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    
    
//    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    
    move_uploaded_file($post_image_temp, "blog_images/$post_image");
    
    if(empty($post_image)) {
        
        $query = "SELECT * FROM posts WHERE post_id=$the_post_id ";
        $select_image = mysqli_query($connect,$query); 
        while($row = mysqli_fetch_assoc($select_image)){
            $post_image = $row['post_image'];
        }
    }
        
        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}' ,";
//        $query .= "post_category_id = '{$post_category_id}' ,";
//        $query .= "post_author = '{$post_author}' ,";
//        $query .= "post_tags = '{$post_tags}' ,";
        $query .= "post_content = '{$post_content}' ,";
        $query .= "post_image = '{$post_image}' ,";
        $query .= "post_date = now() ";
//        $query .= "post_status = '{$post_status}' ";
        $query .="WHERE post_id={$the_post_id} ";
        
       $update_post = mysqli_query($connect,$query); 
//        echo "<script>console.log('".mysqli_error($connect)."')</script>";
       updatePosts();
     if(!$update_post){
                    die("QUERY FAILED" . mysqli_error($connect));
                       }
}
#updatePosts();
 
?>  

<h3 style="text-align: center;">Edit Post</h3>

<div class="container">
  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" value="<?php echo $post_title;?>" id="fname" name="title">
    </div>
    
<!--
    <div class="form-group">
    <label for="title">Author</label>
    <input type="text" value="" id="fname" name="author">
    </div>
-->
     
<!--
    <div class="form-group">
    <label for="post_category_id">Category Id</label>
    <input type="text" value="" id="fname" name="post_category_id">
    </div>
-->
<!--
    
    <div class="form-group">
    <label for="post_status">Status</label>
    <input type="text" id="fname" value="" name="post_status">
    </div> 
     
-->
     
    <div class="form-group">
    <!--<label for="post_image">Post Image</label>-->
    <img src = "blog_images/<?php echo $post_image;?>" alt="" id="fname" class="post_img_load" name="image" style="height:300px;max-width:300px;"><br><br>
    <input type="file" id="fname" onchange="readURL(this)" name="image">
    </div>
           <script type="text/javascript">
          
            function readURL(input) {
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
    <input type="text" id="fname" value="" name="post_tags">
    </div> 
     
-->
    <div class="form-group">
    <label for="post_content">Content</label>
    <textarea id="subject" name="post_content" style="height:200px"><?php echo $post_content; ?></textarea>
    </div>

    <input type="submit" name="update_post"  value="Update">
  </form>
</div>    