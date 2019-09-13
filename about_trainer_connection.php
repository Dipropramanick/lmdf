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
  $sql = "SELECT trainer from user where id=$id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
            $trainerid = $row['trainer'];
      }
  }

  $sql = "SELECT * from employee where id=$trainerid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $obj = new stdClass();
        $obj->id = $row['id'];
        $obj->name = $row['name'];
        $obj->phone = $row['phone'];
        $obj->email = $row['email'];
      }
  }

  echo json_encode($obj);
  // $post = file_get_contents('php://input');
  // $request = json_decode($post);
  //

?>
