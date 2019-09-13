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

    $id = $_GET['id'];
    $sql = "SELECT pic from user WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $pic = $row['pic'];
        }
    }
    $img = explode(";base64", $pic);
    $image_base64 = base64_decode($img[1] );
    // print_r($img);
    // mysqli_error($conn);
    // // exit();
    echo "$image_base64";
 ?>
