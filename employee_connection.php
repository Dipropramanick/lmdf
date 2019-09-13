<?php
  // $servername = "localhost";
  // $username = "root";
  // $password = "";
  // $dbname = "gym";
  // $conn = new mysqli($servername, $username, $password, $dbname);
  // if ($conn->connect_error) {
  //   echo("Connection failed: " . $conn->connect_error);
  // }
  include 'db.php';

function getEmployee($conn)
{
  $sql = "SELECT * FROM employee";
  $result = $conn->query($sql);
  $res = [];
  $count = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $obj = new stdClass();
      $obj->id = $row['id'];
      $obj->name = $row['name'];
      $obj->phone = $row['phone'];
      $obj->type = $row['type'];
      $res[$count] = $obj;
      $count = $count + 1;
    }
} else {
  echo "empty";
  exit();
}
$results = json_encode($res);
echo $results;
$conn->close();
  exit();
}

function editEmployee($conn,$request)
{
  $sql = "UPDATE employee SET edit=0";
  $result = $conn->query($sql);
  $id = $request->id;
  $sql = "UPDATE employee SET edit=1 WHERE id=$id";
  $result = $conn->query($sql);
  $conn->close();
  exit();
}



$post = file_get_contents("php://input");
$request = json_decode($post);
$fun = $request->fun;

if($fun == "getEmployee"){
  getEmployee($conn);
}elseif ($fun == "editEmployee") {
  editEmployee($conn,$request);
}







?>
