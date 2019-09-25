<?php
  include 'db.php';

  $id = file_get_contents("php://input");
  $sql = "UPDATE user SET status=1 WHERE id=$id";
  $result = $conn->query($sql);

  $sql = "UPDATE user SET status=1 WHERE id=$id";
  $result = $conn->query($sql);  
  
  $currentDateTime = date('d-m-Y H:i:s');     
  $sql = "INSERT INTO pt (userid,start,fb) VALUES($id,'$currentDateTime',1)";
  $result = $conn->query($sql);  
  echo mysqli_error($conn);
//  $arr = [];
//  $count = 0;
//  if ($result->num_rows > 0) {
//      while($row = $result->fetch_assoc()) {
//        $obj = new stdClass();
//        $obj->id = $row['id'];
//        $obj->name = $row['name'];
//        $obj->pic = $row['pic']  ;
//        $arr[$count] = $obj;
//        $count = $count + 1;
//      }
//  }

//    echo $post;

?>
