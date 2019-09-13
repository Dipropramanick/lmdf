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
