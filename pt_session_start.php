<?php
  include 'db.php';

  $id = file_get_contents("php://input");
  $sql = "SELECT fb FROM pt WHERE userid=$id ORDER BY id DESC LIMIT 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {        
        $fb = $row['fb'];
    }
  }else{
      $fb = 0;
  }
  if($fb == 1){
      echo "no";
  }else{
      session_start();
      $sess = $_SESSION["sess_num"];
      $sql = "UPDATE user SET status=1 WHERE id=$id";
      $result = $conn->query($sql);

//  $sql = "UPDATE user SET status=1 WHERE id=$id";
//  $result = $conn->query($sql);  
      session_start();
      $trainerid = $_SESSION['userid'];
      $currentDateTime = date('d-m-Y H:i:s');     
      $sql = "INSERT INTO pt (userid,start,fb,session_num,trainerid) VALUES($id,'$currentDateTime',1,$sess,$trainerid)";
      $result = $conn->query($sql);  
      echo "yes";
  }
  
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
