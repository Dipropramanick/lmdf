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

  session_start();
  $id = $_SESSION['userid'];
  $sql = "SELECT * from user where trainer=$id";
  $result = $conn->query($sql);
  $arr = [];
  $count = 0;
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $obj = new stdClass();
        $obj->id = $row['id'];
        $obj->name = $row['name'];
        $arr[$count] = $obj;
        $count = $count + 1;
      }
  }

  echo json_encode($arr);
  // $post = file_get_contents('php://input');
  // $request = json_decode($post);
  //

?>
