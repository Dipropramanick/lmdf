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
        $obj->pt = $row['pt'];   
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
  $blood = $request->blood;
  $height = $request->height;
  $weight = $request->weight;
  $other = $request->other;
  $nationality = $request->nationality;
  $planC = $request->planC;
  $plans = $request->plans;
  $joind = $request->joind;
  $expd = $request->exp;
  $trainer = $request->trainer;
  $discc = $request->discc;
  $discp = $request->discp;
  $method = $request->method;
  $pt = $request->pt;
  $sql = "UPDATE user SET name='$name',phone='$phone',email='$email',gender='$gender',address='$address',dob='$dob',emerNum='$emerNum',emerName='$emerName',
  country = '$nationality',verification='$verification',password='$password',blood='$blood',height=$height,weight=$weight,others='$other',planC=$planC,
  plans=$plans,joind='$joind',expd='$expd',trainer=$trainer, discc=$discc, discp=$discp, method=$method, pt=$pt WHERE id=$id";
  $result = $conn->query($sql);
  echo mysqli_error($conn);
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
  $sql = "DELETE FROM pt WHERE userid=$id";
  $result = $conn->query($sql);
  $sql = "DELETE FROM payments WHERE userid=$id";
  $result = $conn->query($sql);
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


function getPlanOriginalPrice($conn,$request){
    $pid = $request->pc;
    $sql = "SELECT price from plan WHERE id=$pid";
    $result = $conn->query($sql);
    $abc = 0; 
//    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo  $row['price'];
      }
//  }
//    echo $abc;
}

function upgradePlan($conn,$request){
    $id = $request->id;
    $planC = $request->planC;
    $plans = $request->plans;
    $joind = $request->joind;
    $exp = $request->exp;
    $discp = $request->discp;
    $discc = $request->discc;
    $method = $request->method;
    $apc = $request->apc;
    $due = $request->due;
    $dued = $request->dued; 
    $regd = date("d-m-Y");
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
    $sql = "UPDATE user SET planC=$planC,plans=$plans,joind='$joind',expd='$exp',discp=$discp,discc=$discc,method=$method,apc=$apc,invoice=$invoice WHERE id=$id";
    $result = $conn->query($sql);
    if($due>0){
      $dued = date('Y-m-d',strtotime($dued));
      $sql = "INSERT INTO due (user_id,due_amt,date) VALUES ($id,$due,'$dued')";
      $result = $conn->query($sql);
    }
    $result = $conn->query($sql);
    
    session_start();
    $crep = $_SESSION['userid']; 
    $sql = "INSERT INTO payments (userid,planC,plans,joind,expd,discp,discc,method,regd,invoice,apc,reason,crep) VALUES ($id,$planC,$plans,'$joind','$exp',$discp,$discc,$method,'$regd',$invoice,$apc,'upgrade',$crep)";
    $result = $conn->query($sql);
    echo "success";
}


function renewPlan($conn,$request){
    $id = $request->id;
    $planC = $request->planC;
    $plans = $request->plans;
    $joind = $request->joind;
    $exp = $request->exp;
    $discp = $request->discp;
    $discc = $request->discc;
    $method = $request->method;
    $trainer = $request->trainer;
    $apc = $request->apc;
    $due = $request->due;
    $dued = $request->dued;
    $regd = date("d-m-Y");
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
    $sql = "UPDATE user SET planC=$planC,plans=$plans,joind='$joind',expd='$exp',discp=$discp,discc=$discc,method=$method,trainer=$trainer,regd='$regd',invoice=$invoice,apc=$apc WHERE id=$id";
    $result = $conn->query($sql);
    if($due>0){
      $dued = date('Y-m-d',strtotime($dued));
      $sql = "INSERT INTO due (user_id,due_amt,date) VALUES ($id,$due,'$dued')";
      $result = $conn->query($sql);
    }
    
    session_start();
    $crep = $_SESSION['userid']; 
    $result = $conn->query($sql);
    $sql = "INSERT INTO payments (userid,planC,plans,joind,expd,discp,discc,method,regd,invoice,apc,reason,crep) VALUES ($id,$planC,$plans,'$joind','$exp',$discp,$discc,$method,'$regd',$invoice,$apc,'renew',$crep)";
    $result = $conn->query($sql);
    echo "success";
}


function getPays($conn,$request){
    $id = $request->id;
    $sql = "SELECT * FROM payments WHERE userid=$id ORDER BY id DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $arr = [];
        $count = 0;
        while($row = $result->fetch_assoc()) {
            $obj = new stdClass();
            $obj->invoice = $row['invoice'];
            $obj->id = $row['userid'];
            $obj->reason = $row['reason'];
            $obj->apc= $row['apc'];
            $exp = $row['expired'];
            if($row['reason'] == "due"){
                $obj->status = "-";
            }else{
                if($exp == 0){
                    $obj->status = "Active";    
                }else{
                    $obj->status = "Expired";    
                }
            }
            $planC = $row['planC'];
            $sql1 = "SELECT category FROM plan_category where id=$planC";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) {
                    $obj->planC = $row1['category'];
                }
            }else {
                $obj->planC = "Not available";
            }
            $plans = $row['plans'];
            $sql1 = "SELECT name FROM plan where id=$plans";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) {
                    $obj->plans = $row1['name'];
                }
            }else {
                $obj->planC = "Not available";
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
}else if($fun == "getPlanOriginalPrice"){
  getPlanOriginalPrice($conn,$request);  
}else if($fun == "upgradePlan"){
  upgradePlan($conn,$request);  
}else if($fun == "renewPlan"){
  renewPlan($conn,$request);  
}else if($fun == "getPays"){
  getPays($conn,$request);  
}


 ?>
