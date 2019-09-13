/* ============================================= ADD PLAN =========================================*/
var planApp = angular.module("planAddApp", []);

planApp.controller('planAddCtrl', function($scope, $http) {
  var config = {
    method : "POST",
    url : "plan_connection.php",
    data : {
      "fun" : "getPlanCategory",
    }
  }
  var pcCheck = 0;
  var request = $http(config);
  request.then(function mySuccess(response) {
    console.log(response.data);
    if(response.data == "failed"){
      $scope.planError = "Plan Category is Empty, Please add a new Category to Continue."
      $("#taxp").attr('disabled','disabled')
      pcCheck = 1;
    }else{
      $scope.categories = response.data;
      $scope.category = response.data[0];
      $scope.planError = ""
      $("#taxp").removeAttr('disabled');
      pcCheck = 0;
    }
  }, function myError(response) {
    alert("Try again later");
  });

  $scope.name = "";
  $scope.price = null;
  // $scope.taxt = "Inclusive";
  // $scope.taxp = null;
  // $scope.finalPrice = null;
  $scope.year = null;
  $scope.months = "0";
  // $scope.planChange = function () {
  //   if($scope.taxt == "Inclusive"){
  //     $scope.finalPrice = $scope.price;
  //     $("#taxp").removeAttr('disabled');
  //   }else if($scope.taxt == "Exclusive"){
  //     $scope.finalPrice = $scope.price + ($scope.price * $scope.taxp)/100;
  //     $("#taxp").removeAttr('disabled');
  //   }else{
  //     $scope.taxp = 0;
  //     $("#taxp").attr('disabled','disabled')
  //   }
  // }

  $scope.planAddClick = function() {
    if(pcCheck == 1){
      $scope.planError = "Plan Category is Empty, Please add a new Category to Continue."
    }else{
      $scope.planError = "";
    }
    var check1 = 0;
    var check2 = 0;
    if($scope.name == "" || $scope.price == null || $scope.price == 0){
      $scope.planError = $scope.planError + " Please Fill All the Columns.";
    }else{
      $scope.planError = "";
      check1 = 1;
    }

    if(($scope.year == 0 || $scope.year == null) && $scope.months == "0"){
      $scope.planError = $scope.planError + "Please Enter Valid Period";
    }else {
      check2 = 1;
    }
    if(check1 == 1 && check2 == 1){
      // if($scope.taxp == null){
      //   $scope.taxp = 0;
      // }
      if($scope.year == null){
        $scope.year = 0;
      }
      var config = {
        method : "POST",
        url : "plan_connection.php",
        data : {
          "fun" : "addPlan",
          "name" : $scope.name,
          "price" : $scope.price,
          "category" : $scope.category,
          // "taxp" : $scope.taxp,
          // "taxt" : $scope.taxt,
          // "final" : $scope.finalPrice,
          "year" : $scope.year,
          "months" : $scope.months
        }
      }
      var request = $http(config);
      request.then(function mySuccess(response) {
        if(response.data == "success"){
          window.location.href = "plan.php";
        }else{
          $scope.planError = "The Plan Already Exits"
        }
      }, function myError(response) {
        alert("Try again later");
      });

    }
  }


});


/* ============================================= //ADD PLAN =========================================*/

/* ============================================= VIEW PLAN =========================================*/
var planAppV = angular.module("planApp", []);

planAppV.controller('planCtrl', function($scope, $http) {
  var configure = {
    method : "POST",
    url : "plan_connection.php",
    data: {
      'fun' : "getPlan"
    }
  }
  var request = $http(configure);

  request.then(function mySuccess(response) {
    console.log(response.data);
    $scope.planList = response.data;
  }, function myError(response) {
    alert("Try again later");
  });

  $scope.planClick = function(plan) {
    var configure = {
      method : "POST",
      url : "plan_connection.php",
      data: {
        'fun' : "editPlan",
        'id' : plan.id
      }
    }
    var request = $http(configure);

    request.then(function mySuccess(response) {
      if (response.data == "success") {
        window.location.href = "plan_edit.php";
      }else {
        alert("Error: Contact the owners.")
      }
    }, function myError(response) {
      alert("Try again later");
    });
  }
});
/* ============================================= //VIEW PLAN =========================================*/


/* ============================================= //UPDATE PLAN =========================================*/

var planAppE = angular.module("planEditApp", []);

planAppE.controller('planEditCtrl', function($scope, $http) {
  var config = {
    method : "POST",
    url : "plan_connection.php",
    data : {
      "fun" : "getPlanCategory",
    }
  }
  var pcCheck = 0;
  var request = $http(config);
  request.then(function mySuccess(response) {
    console.log(response.data);
    if(response.data == "failed"){
      $scope.planError = "Plan Category is Empty, Please add a new Category to Continue."
      $("#taxp").attr('disabled','disabled')
      pcCheck = 1;
    }else{
      $scope.categories = response.data;
      $scope.category = response.data[0];
      $scope.planError = ""
      $("#taxp").removeAttr('disabled');
      pcCheck = 0;
    }
  }, function myError(response) {
    alert("Try again later");
  });


  var id = 0;
  var config = {
    method : "POST",
    url : "plan_connection.php",
    data : {
      "fun" : "getPlanEdit",
    }
  }
  var request = $http(config);
  request.then(function mySuccess(response){
    console.log(response.data);
    id = response.data.id;
    $scope.name = response.data.name;
    $scope.price = Number(response.data.price);
    // $scope.taxt = response.data.taxt;
    // $scope.taxp = Number(response.data.taxp);
    // $scope.finalPrice = Number(response.data.final);
    $scope.year = Number(response.data.years);
    $scope.months = response.data.months;
    $scope.category = response.data.category;

  }, function myError(response) {
    alert("Try again later");
  });


  $scope.pUpClick = function() {
    if(pcCheck == 1){
      $scope.planError = "Plan Category is Empty, Please add a new Category to Continue."
    }else{
      $scope.planError = "";
    }
    var check1 = 0;
    var check2 = 0;
    if($scope.name == "" || $scope.price == null || $scope.price == 0){
      $scope.planError = $scope.planError + " Please Fill All the Columns.";
    }else{
      $scope.planError = "";
      check1 = 1;
    }

    if(($scope.year == 0 || $scope.year == null) && $scope.months == "0"){
      $scope.planError = $scope.planError + "Please Enter Valid Period";
    }else {
      check2 = 1;
    }
    if(check1 == 1 && check2 == 1){
      if($scope.taxp == null){
        $scope.taxp = 0;
      }
      if($scope.year == null){
        $scope.year = 0;
      }
      var config = {
        method : "POST",
        url : "plan_connection.php",
        data : {
          "fun" : "updatePlan",
          "id" : id,
          "name" : $scope.name,
          "price" : $scope.price,
          "category" : $scope.category,
          // "taxp" : $scope.taxp,
          // "taxt" : $scope.taxt,
          // "final" : $scope.finalPrice,
          "year" : $scope.year,
          "months" : $scope.months
        }
      }
      var request = $http(config);
      request.then(function mySuccess(response) {
        console.log(response.data);
        if(response.data == "success"){
          window.location.href = "plan.php";
        }else{
          $scope.planError = "The Plan Already Exits"
        }
      }, function myError(response) {
        alert("Try again later");
      });

    }
  }

  $scope.pDelClick = function () {
    var r = confirm("Are you sure you want to delete?")
    if (r == true) {
      var config = {
        method : "POST",
        url : "plan_connection.php",
        data : {
          "fun" : "planDel",
          "id" : id
        }
      }

      var request = $http(config);
      request.then(function mySuccess(response){
        // console.log(response.data);
        window.location.href = "plan.php"
      }, function myError(response) {
        alert("Try again later");
      });
    }

  }


});
