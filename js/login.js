var loginApp = angular.module("loginApp", []);

loginApp.controller('loginCtrl', function($scope, $http) {
  $scope.id = null;
  $scope.password = "";
  $scope.loginError = "";
  var redC = {
    "border" : "1px solid red"
  }
  var greyC = {
    "border" : "1px solid grey"
  }
  var check = 0;
  $scope.loginClick = function() {

    check = 1;
    if($scope.id == null){
      $scope.idStyle = redC;
    }else{
      $scope.idStyle = greyC;
    }

    if($scope.password == ""){
      $scope.passStyle = redC;
    }else{
      $scope.passStyle = greyC;
    }

    if($scope.id == null || $scope.password == ""){
      $scope.loginError = "Fill the following details."
    }else{
      $scope.loginError = "";
      var configure = {
        method : "POST",
        url : "login_connection.php",
        data : {
          'id' : $scope.id,
          'password' : $scope.password
        }
      }
      var request = $http(configure);

      request.then(function mySuccess(response) {
        if(response.data == "success"){
          window.location.href = "dashboard.php"
        }else{
          $scope.loginError = response.data;
        }
      }, function myError(response) {
        alert("Try again later");
      });
    }
  }

});
