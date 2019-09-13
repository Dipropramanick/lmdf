<?php

include 'db.php';


function getClient($conn,$request)
{
  $id = $request->id;
  $sql = "SELECT * FROM user WHERE id=$id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $arr = [];
      $count = 0;
      while($row = $result->fetch_assoc()) {
        $obj = new stdClass();
        $obj->id = $row['id'];
        $obj->name = $row['name'];
        $obj->phone = $row['phone'];
        $obj->email = $row['email'];
        $obj->address = $row['address'];
        $obj->gender = $row['gender'];
        $obj->dob = $row['dob'];
        $obj->emerNum = $row['emerNum'];
        $obj->emerName = $row['emerName'];
        $obj->nationality = $row['country'];
        $obj->verification = $row['verification'];
        $obj->blood = $row['blood'];
        $obj->height = $row['height'];
        $obj->weight = $row['weight'];
        $obj->others = $row['others'];
        $obj->password = $row['password'];
        $obj->planC = $row['planC'];
        $obj->plans = $row['plans'];
        $obj->joind = $row['joind'];
        $obj->expd = $row['expd'];
        $obj->pic = $row['pic'];
        $obj->trainer = $row['trainer'];
        $obj->discp = $row['discp'];
        $obj->discc = $row['discc'];
        $obj->method = $row['method'];
        $arr[$count] = $obj;
        $count = $count + 1;
      }
      echo json_encode($arr);
  }else{
    echo "failed";
  }
  echo mysqli_error($conn);
  exit();
}


function editUser($conn,$request)
{
  $id = $request->id;
  $name = $request->name;
  $phone = $request->phone;
  $email = $request->email;
  $gender = $request->gender;
  $address = $request->address;
  $dob = $request->dob;
  $emerNum = $request->emerNum;
  $emerName = $request->emerName;
  $verification = $request->verification;
  $password = $request->password;
  // $profile = $request->profile;
  $blood = $request->blood;
  $height = $request->height;
  $weight = $request->weight;
  $other = $request->other;
  $nationality = $request->nationality;
  $planC = $request->planC;
  $plans = $request->plans;
  $joind = $request->joind;
  $expd = $request->exp;
  $profile = $request->profile;
  $trainer = $request->trainer;
  $discc = $request->discc;
  $discp = $request->discp;
  $method = $request->method;
  $sql = "UPDATE user SET name='$name',phone='$phone',email='$email',gender='$gender',address='$address',dob='$dob',emerNum='$emerNum',emerName='$emerName',
  country = '$nationality',verification='$verification',password='$password',blood='$blood',height=$height,weight=$weight,others='$other',planC=$planC,
  plans=$plans,joind='$joind',expd='$expd',trainer=$trainer, discc=$discc, discp=$discp, method=$method WHERE id=$id";
  $result = $conn->query($sql);
  // $sql = "UPDATE user SET pic='$profile' WHERE id=$id";
  // $result = $conn->query($sql);
  echo mysqli_error($conn);
  // echo $profile;
  $sql = "UPDATE login SET password='$password' WHERE id=$id";
  $result = $conn->query($sql);
  // echo mysqli_error($conn);
  // echo "success";
  exit();
}



function delClient($conn,$request)
{

  $id = $request->id;
  $sql = "DELETE FROM user WHERE id=$id";
  $result = $conn->query($sql);
  $sql = "DELETE FROM login WHERE id=$id";
  $result = $conn->query($sql);
  // echo mysqli_error($conn);
  // echo $profile;
  // echo "success";
  exit();
}

function emailCheck($conn,$request)
{
  $email = $request->email;
  $id = $request->id;
  $sql = "SELECT email from user WHERE NOT id=$id";
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

function phoneCheck($conn,$request)
{
  $phone = $request->phone;
  $id = $request->id;
  $sql = "SELECT phone from user WHERE NOT id=$id";
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


$post = file_get_contents('php://input');
$request = json_decode($post);
$fun = $request->fun;
if($fun == "getClient"){
  getClient($conn,$request);
}elseif ($fun == "delClient") {
  delClient($conn,$request);
}elseif ($fun == "editUser") {
  editUser($conn,$request);
}elseif ($fun == "emailCheck") {
  emailCheck($conn,$request);
}
elseif ($fun == "phoneCheck") {
  phoneCheck($conn,$request);
}


 ?>
