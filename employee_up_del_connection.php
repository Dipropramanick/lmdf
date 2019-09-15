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


  function getEmployee($conn)
  {
    $sql = "SELECT * FROM employee WHERE edit=1";
    $result = $conn->query($sql);
    // $res = [];
    // $count = 0;
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $obj = new stdClass();
        $obj->id = $row['id'];
        $obj->name = $row['name'];
        $obj->phone = $row['phone'];
        $obj->type = $row['type'];
        $obj->email = $row['email'];
        $obj->dob = $row['dob'];
        $obj->salary = $row['salary'];
        $obj->join = $row['joind'];
        $obj->verification = $row['verification'];
        $obj->password = $row['password'];
        $obj->sch = $row['sch'];
        $obj->ftimein = $row['ftimein'];
        $obj->ftimeout = $row['ftimeout'];
        $obj->stimein = $row['stimein'];
        $obj->stimeout = $row['stimeout'];
        // $res[$count] = $obj;
        // $count = $count + 1;
      }
    }
    $results = json_encode($obj);
    echo $results;
    $conn->close();
    exit();
  }

  function phoneCheck($conn,$request)
  {
    $phone = $request->phone;
    $id = $request->id;
    $sql = "SELECT phone from employee WHERE NOT id=$id";
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
    $id = $request->id;
    $sql = "SELECT email from employee WHERE NOT id=$id";
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
    $id = $request->id;
    $sql = "SELECT verification from employee WHERE NOT id=$id";
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

  function delFun($conn,$request)
  {
    $id = $request->id;

    $sql = "DELETE FROM employee WHERE id=$id";
    $result = $conn->query($sql);
    $sql = "DELETE FROM login WHERE id=$id";
    $result = $conn->query($sql);
    echo mysqli_error($conn);
    exit();
  }


  function editEmployee($conn,$request)
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
    $sch = $request->sch;
    $ftimein = $request->ftimein;
    $ftimeout = $request->ftimeout;
    $stimein = $request->stimein;
    $stimeout = $request->stimeout;
    $sql = "UPDATE employee SET name='$name',phone='$phone',email='$email',type='$type',salary=$salary,dob='$dob',joind='$joind',verification='$verification',password='$password',sch=$sch, ftimein='$ftimein', ftimeout='$ftimeout', stimein='$stimein'
    , stimeout='$stimeout'  WHERE id=$id";
    $result = $conn->query($sql);
    $sql = "UPDATE login SET password=$password,type='$type' WHERE id=$id";
    $result = $conn->query($sql);
    $result = $conn->query($sql);
    exit();
  }



  $post = file_get_contents('php://input');
  $request = json_decode($post);
  $fun = $request->fun;
  if($fun == "getEmployee"){
    getEmployee($conn);
  }elseif ($fun == "editEmployee") {
    editEmployee($conn,$request);
  }elseif ($fun == "phoneCheck") {
    phoneCheck($conn,$request);
  }elseif ($fun == "emailCheck") {
    emailCheck($conn,$request);
  }elseif ($fun == "verCheck") {
    verCheck($conn,$request);
  }elseif ($fun == "delFun") {
    delFun($conn,$request);
  }






?>
