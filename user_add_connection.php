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
  $sql = "SELECT id FROM user";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $res = $row['id'];
      }
      echo $res;
  }else{
    echo "4999";
  }
  echo mysqli_error($conn);
  exit();
}

function emailCheck($conn,$request)
{
  $email = $request->email;

  $sql = "SELECT email from user";
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

  $sql = "SELECT phone from user";
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


function addUser($conn,$request)
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
  $sql = "INSERT INTO user (id,name,phone,email,gender,address,dob,emerNum,emerName,country,verification,password,blood,height,weight,others,planC,plans,joind,expd,trainer, discc, discp, method)
  VALUES ($id,'$name','$phone','$email','$gender','$address','$dob','$emerNum','$emerName','$nationality','$verification','$password','$blood','$height','$weight','$other',$planC,$plans,'$joind','$expd'
  ,$trainer, $discc, $discp, $method)";
  $result = $conn->query($sql);
  $sql = "INSERT INTO login (id,password,type) VALUES ($id,'$password','user')";
  $result = $conn->query($sql);
  exit();
}


function getPlanC($conn)
{
  $sql = "SELECT * FROM plan_category";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $arr = [];
      $count = 0;
      while($row = $result->fetch_assoc()) {
        $obj = new stdClass();
        $obj->id = $row['id'];
        $obj->category = $row['category'];
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


function getPlans($conn,$request)
{
  $pc = $request->pc;
  $sql = "SELECT * FROM plan WHERE category='$pc'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $arr = [];
      $count = 0;
      while($row = $result->fetch_assoc()) {
        $obj = new stdClass();
        $obj->id = $row['id'];
        $obj->name = $row['name'];
        $obj->price = $row['price'];
        // $obj->taxType = $row['taxType'];
        // $obj->taxPercentage = $row['taxPercentage'];
        // $obj->final = $row['final'];
        $obj->years = $row['years'];
        $obj->months = $row['months'];
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


function getTrainer($conn,$request)
{
  $sql = "SELECT * FROM employee WHERE type='trainer'";
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
        $obj->ftimein = $row['ftimein'];
        $obj->stimein = $row['stimein'];
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


$post = file_get_contents('php://input');
$request = json_decode($post);
$fun = $request->fun;
if($fun == "getId"){
  getId($conn);
}elseif ($fun == "emailCheck") {
  emailCheck($conn,$request);
}elseif ($fun == "phoneCheck") {
  phoneCheck($conn,$request);
}elseif ($fun == "addUser") {
  addUser($conn,$request);
}elseif ($fun == "getPlanC") {
  getPlanC($conn);
}elseif ($fun == "getPlans") {
  getPlans($conn,$request);
}elseif ($fun == "getTrainer") {
  getTrainer($conn,$request);
}


 ?>
