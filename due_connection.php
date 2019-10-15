<?php

include 'db.php';

function getUsers($conn)
{
  $sql = "SELECT * FROM due ORDER BY date ASC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $arr = [];
      $count = 0;
      while($row = $result->fetch_assoc()) {
        $obj = new stdClass();
        $id = $row['user_id'];  
        $obj->id = $id;
        $obj->due = $row['due_amt'];
        $obj->expd = $row['date'];
        $obj->expired = $row['expired'];   
        $sql1 = "SELECT * FROM user WHERE id=$id";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            while($row1 = $result1->fetch_assoc()) {
              $obj->name = $row1['name'];
              $obj->phone = $row1['phone'];
            }
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

function payDue($conn,$request){
    $id = $request->id;
    $method = $request->method;
    $sql = "SELECT * FROM user WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $planC = $row['planC'];
          $plans = $row['plans'];
          $joind = $row['joind'];
          $expd = $row['expd'];
          $discp = $row['discp'];
          $discc = $row['discc'];
          
      }
    }
    $regd = date('Y-m-d');
    $sql = "SELECT * FROM due WHERE user_id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $apc = $row['due_amt'];
        }
    }
    $discp = 0;
    $discc = $apc;
    $sql = "SELECT * FROM invoice_num";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {    
        while($row = $result->fetch_assoc()) {
            $invoice = $row['number'];  
        }
    }
    $invoice += 1;
    $sql = "UPDATE invoice_num SET number=$invoice";
    $result = $conn->query($sql);
    session_start();
    $crep = $_SESSION['userid']; 
    $sql = "INSERT INTO payments (userid,planC,plans,joind,expd,discp,discc,method,regd,invoice,apc,reason,crep
) VALUES ($id,$planC,$plans,'$joind','$expd',$discp,$discc,$method,'$regd',$invoice,$apc,'due',$crep)";
    $result = $conn->query($sql);
    echo mysqli_error($conn);
    $sql = "DELETE FROM due WHERE user_id=$id";
    $result = $conn->query($sql);
}

$post = file_get_contents('php://input');
$request = json_decode($post);
$fun = $request->fun;
if($fun == "getUsers"){
  getUsers($conn);
}else if($fun == "payDue"){
  payDue($conn,$request);
}

 ?>
