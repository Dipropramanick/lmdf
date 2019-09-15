<?php
function deletePosts()
{
    global $connect;
    if(isset($_GET['delete'])){
                            $the_post_id = $_GET['delete'];
                            $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
                            $delete_query = mysqli_query($connect,$query);
                            header("Location: blog.php");
                               }
}

function updatePosts(){
        global $connect;
        
        header("Location: user_blog.php");
}

function deleteComments()
{
    global $connect;
    if(isset($_GET['delete'])){
                            $the_comment_id = $_GET['delete'];
                            $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
                            $delete_query = mysqli_query($connect,$query);
                            header("Location: single.php?c_id=" . $_GET['c_id'] . "");

}
}

function addComments()
{
    global $connect;
    if(isset($_POST['comment_c'])){
        echo $_POST['comment_author'];
        $the_c_id = $_GET['c_id'];

        // $comment_author = $_POST['comment_author'];
        session_start();
        // $comment_author = $_POST['comment_author'];
        $comment_author_id = $_SESSION['userid'];
        $comment_content = $_POST['comment_content'];
        // $comment_email = $_POST['comment_email'];

$query = "INSERT INTO comments (comment_post_id,comment_content,comment_status,comment_date,userid)";
$query .= "VALUES($the_c_id,'{$comment_content}','Unapproved',now(),{$comment_author_id})";

            $comment_query = mysqli_query($connect,$query);
            echo "<script>alert('{$the_c_id}')</script>";            
            header("Location: single.php?c_id=" . $_GET['c_id'] . "");
        if(!$comment_query){
            die('QUERY FAILED'.mysql_error($connect));
                            }
}
}
?>
