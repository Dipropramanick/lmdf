<?php
  include 'db.php';

  $id = file_get_contents("php://input");
  $sql = "UPDATE user SET status=0 WHERE id=$id";
  $result = $conn->query($sql);

  $currentDateTime = date('d-m-Y H:i:s');         
  $sql = "UPDATE pt SET end='$currentDateTime' WHERE userid=$id ORDER BY id DESC LIMIT 1";
  $result = $conn->query($sql);
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
