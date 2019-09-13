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


  function addPlanCategory($conn,$request)
  {
    $category = $request->category;
    $sql = "SELECT * FROM plan_category WHERE category='$category'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if(strtolower($category) == strtolower($row['category'])){
              echo "failed";
              exit();
            }
        }
    }
    $sql = "INSERT INTO plan_category (category) VALUES ('$category')";
    $result = $conn->query($sql);
    echo "success";
    exit();
  }

  function getPlanCategory($conn)
  {
    $sql = "SELECT * FROM plan_category";
    $result = $conn->query($sql);
    $res = [];
    $count = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $obj = new stdClass();
          $obj->category = $row['category'];
          $res[$count] = $obj;
          $count = $count + 1;
        }
    } else {
      echo "empty";
      exit();
    }
    $results = json_encode($res);
    echo $results;
    $conn->close();
      exit();
  }


  function editPC($conn,$request)
  {
    $sql = "UPDATE plan_category SET edit=0";
    $result = $conn->query($sql);
    $category = $request->category;
    $sql = "UPDATE plan_category SET edit=1 WHERE category='$category'";
    $result = $conn->query($sql);
    $conn->close();
    exit();
  }


  function getPlanCategoryEdit($conn)
  {
    $sql = "SELECT * FROM plan_category WHERE edit=1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $obj = new stdClass();
        $obj->category = $row['category'];
        $obj->id = $row['id'];
      }
    }
    $results = json_encode($obj);
    echo $results;
    $conn->close();
    exit();
  }


  function deletePlanCategory($conn)
  {
    $sql = "DELETE FROM plan_category WHERE edit=1";
    $result = $conn->query($sql);
    echo mysqli_error($conn);
    $conn->close();
    exit();
  }

  function updatePlanCategory($conn,$request)
  {
    $category = $request->category;
    $id = $request->id;
    $sql = "SELECT * FROM plan_category";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if(strtolower($category) == strtolower($row['category'])){
              echo "failed";
              exit();
            }
        }
    }
    $sql = "UPDATE plan_category SET category = '$category' WHERE id=$id";
    $result = $conn->query($sql);
    echo "success";
    exit();
  }


  $post = file_get_contents('php://input');
  $request = json_decode($post);
  $fun = $request->fun;
  if($fun == "addPlanCategory"){
    addPlanCategory($conn,$request);
  }elseif ($fun == "getPlanCategoryEdit") {
    getPlanCategoryEdit($conn);
  }elseif ($fun == "editPC") {
    editPC($conn,$request);
  }elseif ($fun == "deletePlanCategory") {
    deletePlanCategory($conn);
  }elseif ($fun == "getPlanCategory") {
    getPlanCategory($conn);
  }elseif ($fun == "deletePlanCategory") {
    deletePlanCategory($conn);
  }elseif ($fun == "updatePlanCategory") {
    updatePlanCategory($conn,$request);
  }
?>
