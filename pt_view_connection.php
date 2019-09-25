<?php

include 'db.php';

function getClients($conn)
{
  session_start();
  $id = $_SESSION['userid'];
  $sql = "SELECT * from user where trainer=$id and pt=1";
  $result = $conn->query($sql);
  $arr = [];
  $count = 0;
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $obj = new stdClass();
        $obj->id = $row['id'];
        $obj->name = $row['name'];
        $obj->phone = $row['phone']  ;
        $arr[$count] = $obj;
        $count = $count + 1;
      }
  }
  echo json_encode($arr);
}

function start($conn)
{
  $sql = "INSERT INTO pt (userid,start) VALUES";
  $result = $conn->query($sql);
  $arr = [];
  $count = 0;
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $obj = new stdClass();
        $obj->id = $row['id'];
        $obj->name = $row['name'];
        $obj->phone = $row['phone']  ;
        $arr[$count] = $obj;
        $count = $count + 1;
      }
  }
  echo json_encode($arr);
}



$post = file_get_contents('php://input');
$request = json_decode($post);
$fun = $request->fun;
if($fun == "getClients"){
  getClients($conn);
}elseif ($fun == "start") {
  start($conn,$request);
}
//elseif ($fun == "phoneCheck") {
//  phoneCheck($conn,$request);
//}elseif ($fun == "addUser") {
//  addUser($conn,$request);
//}elseif ($fun == "getPlanC") {
//  getPlanC($conn);
//}elseif ($fun == "getPlans") {
//  getPlans($conn,$request);
//}elseif ($fun == "getTrainer") {
//  getTrainer($conn,$request);
//}
//

 ?>
