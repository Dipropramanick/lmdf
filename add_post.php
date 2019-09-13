<?php 

if(isset($_POST['submit_post'])){
    
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    
    
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $_post_date = date('d-m-y');
    $post_comment_count = 5;
    
    move_uploaded_file($post_image_temp, "images/$post_image");
    session_start();
    $userid = $_SESSION['userid'];
    
    $query = "INSERT INTO posts(post_category_id,post_title, post_author,post_date, post_image, post_content, post_tags,post_comment_count,post_status, user_id)";
    
    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}', {$userid})";
    
    $create_post_query = mysqli_query($connect, $query);

}





?>

<h3 style="text-align: center;">Add Post</h3>

<div class="container">
  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="fname" name="title">
    </div>
    
    
    <div class="form-group">
    <label for="title">Author</label>
    <input type="text" id="fname" name="author">
    </div>
     
    <div class="form-group">
    <label for="post_category_id">Category Id</label>
    <input type="text" id="fname" name="post_category_id">
    </div>
    
    <div class="form-group">
    <label for="post_status">Status</label>
    <input type="text" id="fname" name="post_status">
    </div> 
     
     
    <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" id="fname" name="image">
    </div>
     
    <div class="form-group">
    <label for="post_tags">Tags</label>
    <input type="text" id="fname" name="post_tags">
    </div> 
     
    <div class="form-group">
    <label for="post_content">Content</label>
    <textarea id="subject" name="post_content" style="height:200px"></textarea>
    </div>

    <input type="submit" name="submit_post"  value="Submit">
  </form>
</div>    
