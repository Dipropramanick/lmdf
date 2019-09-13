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

  function getId($conn)
  {
    $sql = "SELECT id FROM employee";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $res = $row['id'];
        }
        echo $res;
        exit();
    }
  }

  function phoneCheck($conn,$request)
  {
    $phone = $request->phone;

    $sql = "SELECT phone from employee";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($phone == $row['phone']){
              echo "failed";
              exit();
            }
        }
    }
    echo "success";
    exit();
  }

  function emailCheck($conn,$request)
  {
    $email = $request->email;

    $sql = "SELECT email from employee";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($email == $row['email']){
              echo "failed";
              exit();
            }
        }
    }
    echo "success";
    exit();
  }

  function verCheck($conn,$request)
  {
    $verification = $request->verification;

    $sql = "SELECT verification from employee";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($verification == $row['verification']){
              echo "failed";
              exit();
            }
        }
    }
    echo "success";
    exit();
  }


  function addEmployee($conn,$request)
  {
    $conn->query( 'SET GLOBAL max_allowed_packet=1073741824' );
    $id = $request->id;
    $name = $request->name;
    $phone = $request->phone;
    $email = $request->email;
    $type = $request->type;
    $salary = $request->salary;
    $dob = $request->dob;
    $joind = $request->joind;
    $verification = $request->verification;
    $password = $request->password;
    $ftimein = $request->ftimein;
    $ftimeout = $request->ftimeout;
    $stimein = $request->stimein;
    $stimeout = $request->stimeout;
    $sch = $request->sch;
    $profile = $request->profile;
    // $img = explode(";base64,", $profile);
    // $image_base64 = base64_decode($img[1]);
    // echo $image_base64;
    $sql = "INSERT INTO employee (id,name,phone,email,type,salary,dob,joind,verification,password,ftimein,ftimeout,stimein,stimeout,sch,pic)
    VALUES ($id,'$name','$phone','$email','$type',$salary,'$dob','$joind','$verification','$password','$ftimein','$ftimeout','$stimein','$stimeout',$sch,'$profile')";
    $result = $conn->query($sql);
    // echo mysqli_error($conn);
    // echo "hello ".$profile;
    echo mysqli_error($conn);
    $sql = "INSERT INTO login (id,password,type) VALUES ($id,'$password','$type')";
    $result = $conn->query($sql);
    // echo mysqli_error($conn);
    echo "success";
    exit();
  }



  $post = file_get_contents('php://input');
  $request = json_decode($post);
  $fun = $request->fun;
  if($fun == "getId"){
    getId($conn);
  }elseif ($fun == "addEmployee") {
    addEmployee($conn,$request);
  }elseif ($fun == "phoneCheck") {
    phoneCheck($conn,$request);
  }elseif ($fun == "emailCheck") {
    emailCheck($conn,$request);
  }elseif ($fun == "verCheck") {
    verCheck($conn,$request);
  }


?>
