
var loginApp = angular.module("employeeAddApp", []);
loginApp.controller('employeeAddCtrl', function($scope, $http) {

  $scope.id = 120;
    var idconfig = {
      method : "POST",
      url : "employee_add_connection.php",
      data : {
        'fun' : 'getId'
      }
    }
    var idRequest = $http(idconfig);

    idRequest.then(function mySuccess(response) {
       $scope.id = Number(response.data) + 1;
    }, function myError(response) {
      alert("Try again later");
    });
  $scope.name = "";
  $scope.phone = null;
  $scope.type = "trainer";
  $scope.email = ""
  // $scope.dob = ";
  $scope.salary = null;
  $scope.join = new Date();
  $scope.verificaton = "";
  $scope.password = "";
  $scope.Cpassword = "";
  $scope.error = "";
  $scope.mobError = "";
  $scope.emailError = "";
  $scope.sch = 2;
  $scope.re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var passCheck = 0;
  var emailCheck = 0;
  var phoneCheck = 0;
  var verCheck = 0;

  $scope.employeeAddClick = function() {
    var ftimein = "";
    var ftimeout = "";
    var stimein = "";
    var stimeout = "";

    var check1 = 0;
    var check2 = 0;

    if($scope.name == "" || $scope.phone == null || $scope.type == "" || $scope.email =="" || $scope.dob == "" || $scope.salary == null || $scope.join == "" || $scope.verificaton == "" || $scope.password == "" || $scope.Cpassword == ""){
       $scope.error = "Please fill all the fields.";
       window.location.href = "#home";
    }else{
      $scope.error = "";
      check1 = 1;
    }

    if($scope.password == $scope.Cpassword){
      check2 = 1;
      $scope.passError = "";
    }else{
      passCheck = 1;
      $scope.passError = "Passwords not matching";
    }

    if($scope.sch == 1){
      ftimein = $scope.ftimein;
      ftimeout = $scope.ftimeout;
    }else if ($scope.sch == 2) {
      ftimein = $scope.ftimein;
      ftimeout = $scope.ftimeout;
      stimein = $scope.stimein;
      stimeout = $scope.stimeout;
    }

    if(check1 == 1 && check2 == 1 && phoneCheck ==1 && emailCheck == 1 && verCheck == 1){

      var configure = {
        method : "POST",
        url : "employee_add_connection.php",
        data : {
          'fun' : 'addEmployee',
          'id' : $scope.id,
          'name' : $scope.name,
          'phone' : $scope.phone,
          'email' : $scope.email,
          'type' : $scope.type,
          'salary' : $scope.salary,
          'dob' : $scope.dob,
          'joind' : $scope.join,
          'verification' : $scope.verificaton,
          'password' : $scope.password,
          'ftimein' : ftimein,
          'ftimeout' : ftimeout,
          'stimein' : stimein,
          'stimeout' : stimeout,
          'sch' : $scope.sch
        }
      }
      var request = $http(configure);

      request.then(function mySuccess(response) {
        console.log(response.data);
        // if(response.data == "success"){
          window.location.href = "employee_profile.php?id="+$scope.id;
        // }
      }, function myError(response) {
        alert("Please contact website maintance for repairs.");
      });
    }


  }

  $scope.passChange = function() {
    if(passCheck == 1){
      if($scope.password == $scope.Cpassword){
        $scope.passError = "";
      }else{
        $scope.passError = "Passwords not matching";
      }
    }
  }


  $scope.mobChange = function() {
    var str = ($scope.phone).toString();
    if(str.length == 10){
      var configure = {
        method : "POST",
        url : "employee_add_connection.php",
        data : {
          'fun' : 'phoneCheck',
          'phone' : ($scope.phone).toString(),
        }
      }
      var request = $http(configure);

      request.then(function mySuccess(response) {
        if(response.data == "success"){
          $scope.mobError = "";
          phoneCheck = 1;
        }else{
          $scope.mobError = "The phone number already exists.";
          phoneCheck = 0;
        }
      }, function myError(response) {
        alert("Please contact website maintance for repairs.");
        phoneCheck = 0;
      });
    }else{
      phoneCheck = 0;
      $scope.mobError = "Enter appropriate mobile number.";
    }
  }

  $scope.emailCheck = function() {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(String($scope.email).toLowerCase())) {
      $scope.emailError = "";
      var configure = {
        method : "POST",
        url : "employee_add_connection.php",
        data : {
          'fun' : 'emailCheck',
          'email' : $scope.email
        }
      }
      var request = $http(configure);

      request.then(function mySuccess(response) {
        if(response.data == "success"){
          $scope.mobError = "";
          emailCheck = 1;
        }else{
          $scope.emailError = "The email id already exists.";
          emailCheck = 0;
        }
      }, function myError(response) {
        alert("Please contact website maintance for repairs.");
        emailCheck = 0;
      });


    }else{
      $scope.emailError = "Enter vaild email address.";
      emailCheck = 0;
    }
  }

  $scope.verCheck = function() {
    var configure = {
      method : "POST",
      url : "employee_add_connection.php",
      data : {
        'fun' : 'verCheck',
        'verification' : $scope.verificaton
      }
    }
    var request = $http(configure);

    request.then(function mySuccess(response) {
      if(response.data == "success"){
        $scope.verError = "";
        verCheck = 1;
      }else if(response.data == "failed"){
        $scope.verError = "The verification id already exists.";
        verCheck = 0;
      }else {
        console.log(response.data);
      }
    }, function myError(response) {
      alert("Please contact website maintance for repairs.");
      verCheck = 0;
    });
  }

  $scope.schChange = function() {
    if ($scope.sch == 0) {
      document.querySelector(".fsch").style.display = "none";
      document.querySelector(".fsch1").style.display = "none";
      document.querySelector(".ssch").style.display = "none";
      document.querySelector(".ssch1").style.display = "none";
    }else if ($scope.sch == 1) {
      document.querySelector(".fsch").style.display = "block";
      document.querySelector(".fsch1").style.display = "block";
      document.querySelector(".ssch").style.display = "none";
      document.querySelector(".ssch1").style.display = "none";
    }else{
      document.querySelector(".ssch").style.display = "block";
      document.querySelector(".ssch1").style.display = "block";
      document.querySelector(".fsch").style.display = "block";
      document.querySelector(".fsch1").style.display = "block";
    }

  }

  // $scope.pic = "https://www.ibts.org/wp-content/uploads/2017/08/iStock-476085198.jpg"


});
