var trainerApp = angular.module("trainerApp", []);
trainerApp.controller('trainerCtrl', function($scope, $http) {
  var config = {
    method : "POST",
    url : "about_trainer_connection.php",
  }

  var request = $http(config);
  request.then(function mySuccess(response) {
    $scope.trainerList = response.data;
  }, function myError(response) {
    alert("Please contact the administrator");
  });
});


//=================================== VIEW PAYS =======================================//


var userPayApp = angular.module("userPayApp", []);

userPayApp.controller('userPayCtrl', function($scope, $http) {
  var url = window.location.href;
  var url_id = (url.split("?")[1]).split("=")[1];
  $scope.id = Number(url_id);
  alert($scope.id)
  var config1 = {
        method : "POST",
        url : "user_edit_connection.php",
        data : {
            "fun" : "getPays",
            "id" : $scope.id,
        }
  }
  var request1 = $http(config1);
  request1.then(function mySuccess(response) {
    $scope.userList = response.data;
  }, function myError(response) {
    alert("Try again later");
  });

  $scope.userClick = function (user) {
    document.location.href = "user_edit.php?id=" + user.id;
  }
  
  $scope.invoice = function(usr){
      document.location.href = "invoice.php?id=" + usr.id;
  }


});