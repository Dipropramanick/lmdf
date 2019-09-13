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

  $post = file_get_contents('php://input');
  $request = json_decode($post);
  $id = $request->id;
  $pass = $request->password;
  $sql = "SELECT * FROM login WHERE id=$id";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($pass == $row['password']){
          echo "success";
          session_start();
          $_SESSION['login'] = 1;
          $_SESSION['userid'] = $row['id'];
          $_SESSION['user_type'] = $row['type'];
          if ($id>=1000 && $id<=2000) {
            $sql1 = "SELECT * FROM employee WHERE id=$id";
          }else {
            $sql1 = "SELECT * FROM user WHERE id=$id";
          }
          $result1 = $conn->query($sql1);
          while($row1 = $result1->fetch_assoc()) {
                $_SESSION['username'] = $row1['name'];
              }
        }else {
          echo "Please enter correct user id or password.";
        }
    }
} else {
  echo "Please enter correct user id or password.";

}
$conn->close();
  exit();

?>
