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


/* ============================================= ADD PLAN =========================================*/


  function getPlanCategory($conn)
  {
    $sql = "SELECT * FROM plan_category";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $count = 0;
      $arr = [];
      while($row = $result->fetch_assoc()) {
        // $obj = new stdClass();
        // $obj->category = $row['category'];
        $arr[$count] = $row['category'];
        $count = $count + 1;
      }
      $results = json_encode($arr);
      echo $results;
      $conn->close();
      exit();
    }else {
      echo "failed";
    }

  }

  function addPlan($conn,$request)
  {
    $category = $request->category;
    $name = $request->name;
    $price = $request->price;
    // $taxt = $request->taxt;
    // $taxp = $request->taxp;
    // $final = $request->final;
    $year = $request->year;
    $months = $request->months;

    $sql = "SELECT name FROM plan WHERE category='$category'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        if($name == $row['name']){
          echo "failed";
          exit();
        }
      }
    }
    $sql = "INSERT INTO plan (name,price,category,years,months) VALUES ('$name',$price,'$category',$year,$months)";
    $result = $conn->query($sql);
    echo "success";
    exit();
  }

/* ============================================= //ADD PLAN =========================================*/


/* ============================================= GET PLAN =========================================*/

function getPlan($conn)
{
  $sql = "SELECT * FROM plan";
  $result = $conn->query($sql);
  $res = [];
  $count = 0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $obj = new stdClass();
      $obj->id = $row['id'];
      $obj->name = $row['name'];
      $obj->category = $row['category'];
      // $obj->taxType = $row['taxType'];
      $obj->price = $row['price'];
      $res[$count] = $obj;
      $count = $count + 1;
    }
} else {
    echo "empty";
  exit();
  }
  $results = json_encode($res);
  echo $results;
  // echo mysqli_error($conn);
  $conn->close();
  exit();
}
/* ============================================= //GET PLAN =========================================*/

/* ============================================= EDIT PLAN =========================================*/

function editPlan($conn,$request)
{
  $sql = "UPDATE plan SET edit=0";
  $result = $conn->query($sql);
  $id = $request->id;
  $sql1 = "UPDATE plan SET edit=1 WHERE id=$id";
  $result1 = $conn->query($sql1);
  echo "success";
}

function getPlanEdit($conn)
{
  $sql = "SELECT * FROM plan WHERE edit=1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $obj = new stdClass();
        $obj->id = $row['id'];
        $obj->name = $row['name'];
        $obj->price = $row['price'];
        $obj->category = $row['category'];
        // $obj->taxt = $row['taxType'];
        // $obj->taxp = $row['taxPercentage'];
        // $obj->final = $row['final'];
        $obj->years = $row['years'];
        $obj->months = $row['months'];
      }
  }
  $results = json_encode($obj);
  echo $results;
}

function planDel($conn,$request)
{
  $id = $request->id;
  $sql = "DELETE FROM plan WHERE id=$id";
  $result = $conn->query($sql);
  echo "success";
  exit();
  // echo mysqli_error($conn);
}

function updatePlan($conn,$request)
{
  $category = $request->category;
  $name = $request->name;
  $price = $request->price;
  // $taxt = $request->taxt;
  // $taxp = $request->taxp;
  // $final = $request->final;
  $year = $request->year;
  $months = $request->months;
  $id = $request->id;
  $sql = "SELECT name FROM plan WHERE category='$category' AND NOT id=$id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      if($name == $row['name']){
        echo "failed";
        exit();
      }
    }
  }
  $sql = "UPDATE plan SET name='$name',price=$price,category='$category',years=$year,months=$months WHERE id=$id";
  $result = $conn->query($sql);
  echo "success";
  exit();
}


/* ============================================= //EDIT PLAN =========================================*/

  $post = file_get_contents('php://input');
  $request = json_decode($post);
  $fun = $request->fun;
  if($fun == "getPlanCategory"){
    getPlanCategory($conn);
  }elseif ($fun == "addPlan") {
    addPlan($conn,$request);
  }elseif($fun == "getPlan"){
    getPlan($conn);
  }elseif($fun == "editPlan"){
    editPlan($conn,$request);
  }elseif($fun == "getPlanEdit"){
    getPlanEdit($conn);
  }elseif ($fun == "planDel") {
    planDel($conn,$request);
  }elseif ($fun == "updatePlan") {
    updatePlan($conn,$request);
  }
?>
