var dueApp = angular.module("dueApp", []);

dueApp.controller('dueCtrl', function($scope, $http) {
  var config1 = {
    method : "POST",
    url : "due_connection.php",
    data : {
      "fun" : "getUsers",
    }
  }
  var request1 = $http(config1);
  request1.then(function mySuccess(response) {
    $scope.userList = response.data;
  }, function myError(response) {
    alert("Try again later");
  });

  $scope.userClick = function (user) {
    document.location.href = "due_pay.php?id=" + user.id;
  }
  
  
  $scope.expStyle = function(usr){
      if(usr.expired == "1"){
          return {
              'color' : 'red'
          };
      }
  }


});

// ==================================   DUE PAYMENT =================================/

var duePayApp = angular.module("duePayApp", []);

duePayApp.controller('duePayCtrl', function($scope, $http) {

  $scope.method = 0;    
  var url = window.location.href;
  var url_id = (url.split("?")[1]).split("=")[1];
  var id = Number(url_id);
  $scope.duePayClick = function(){
      var config1 = {
          method : "POST",
          url : "due_connection.php",
          data : {
              "fun" : "payDue",
              "id" : id,
              "method" : $scope.method
          }
      }
    var request1 = $http(config1);
    request1.then(function mySuccess(response) {
//        alert("success")
//        console.log(response.data)
        window.location.href = "due_view.php";
//        $scope.userList = response.data;
    }, function myError(response) {
        alert("Try again later");
    });
  }    
});
