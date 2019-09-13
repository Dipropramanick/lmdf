var trainerApp = angular.module("trainerApp", []);
trainerApp.controller('trainerCtrl', function($scope, $http) {
  var config = {
    method : "POST",
    url : "about_client_connection.php",
  }

  var request = $http(config);
  request.then(function mySuccess(response) {
    console.log(response.data);
    $scope.clientList = response.data;
  }, function myError(response) {
    alert("Please contact the administrator");
  });
});
