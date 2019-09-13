<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "gym";
//
// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
//   echo("Connection failed: " . $conn->connect_error);
// }
include 'db.php';

function getUsers($conn)
{
  $sql = "SELECT * FROM user";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $arr = [];
      $count = 0;
      while($row = $result->fetch_assoc()) {
        $obj = new stdClass();
        $obj->id = $row['id'];
        $obj->name = $row['name'];
        $obj->phone = $row['phone'];
        $trainerId = $row['trainer'];
        $sql1 = "SELECT name FROM employee where id=$trainerId";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            while($row1 = $result1->fetch_assoc()) {
              $obj->trainer = $row1['name'];
            }
        }else {
          $obj->trainer = "No Trainer";
        }
        $arr[$count] = $obj;
        $count = $count + 1;
      }
      echo json_encode($arr);
      exit();
  }
  echo mysqli_error($conn);
  exit();
}


$post = file_get_contents('php://input');
$request = json_decode($post);
$fun = $request->fun;
if($fun == "getUsers"){
  getUsers($conn);
}

 ?>
