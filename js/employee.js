var employeeApp = angular.module("employeeApp", []);

employeeApp.controller('employeeCtrl', function($scope, $http) {
  var configure = {
    method : "POST",
    url : "employee_connection.php",
    data: {
      'fun' : "getEmployee"
    }
  }
  var request = $http(configure);

  request.then(function mySuccess(response) {
    $scope.empList = response.data;
    console.log(response.datalength);
  }, function myError(response) {
    alert("Try again later");
  });

  $scope.empClick = function(emp) {
    var configure = {
      method : "POST",
      url : "employee_connection.php",
      data: {
        'fun' : "editEmployee",
        'id' : emp.id
      }
    }
    var request = $http(configure);

    request.then(function mySuccess(response) {
      window.location.href = "employee_up_del.php"
    }, function myError(response) {
      alert("Try again later");
    });
  }
});
