var trainerApp = angular.module("trainerApp", []);
trainerApp.controller('trainerCtrl', function($scope, $http) {
  var config = {
    method : "POST",
    url : "pt_view_connection.php",
    data : {
        "fun" : "getClients"
    }
  }

  var request = $http(config);
  request.then(function mySuccess(response) {
    console.log(response.data);
    $scope.clientList = response.data;
  }, function myError(response) {
    alert("Please contact the administrator.");
  });
    
  $scope.traineeClick = function(usr){
      window.location.href = "pt_detail.php?id="+usr.id;
  }    
 
});
