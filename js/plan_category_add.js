var planApp = angular.module("planCategoryApp", []);

planApp.controller('planCategoryCtrl', function($scope, $http) {
  $scope.plan = "";
  $scope.planError = "";
  $scope.addPlanClick = function () {
    var config = {
      method : "POST",
      url : "plan_category_connection.php",
      data : {
        "fun" : "addPlanCategory",
        "category" : $scope.plan
      }
    }

    var request = $http(config);
    request.then(function mySuccess(response) {
      console.log(response.data);
      if(response.data == "success"){
        window.location.href = "plan_category.php"
      }else{
        $scope.planError = "This category already exists."
      }
    }, function myError(response) {
      alert("Try again later");
    });

  }
});


var planApp1 = angular.module("planCApp", []);

planApp1.controller('planCCtrl', function($scope, $http) {
  var configure = {
    method : "POST",
    url : "plan_category_connection.php",
    data: {
      'fun' : "getPlanCategory"
    }
  }
  var request = $http(configure);

  request.then(function mySuccess(response) {
    $scope.pcList = response.data;
    // console.log(response.data);
  }, function myError(response) {
    alert("Try again later");
  });

  $scope.pcClick = function (pc) {
    var configure = {
      method : "POST",
      url : "plan_category_connection.php",
      data: {
        'fun' : "editPC",
        'category' : pc.category
      }
    }
    var request = $http(configure);
    request.then(function mySuccess(response) {
      window.location.href = "plan_category_updel.php"
    }, function myError(response) {
      alert("Try again later");
    });
  }

});



var planApp2 = angular.module("pcEditApp", []);

planApp2.controller('pcEditCtrl', function($scope, $http) {
  $scope.category = ""
  var config = {
    method : "POST",
    url : "plan_category_connection.php",
    data : {
      "fun" : "getPlanCategoryEdit",
    }
  }
  var id = null;
  var request = $http(config);
  request.then(function mySuccess(response) {
    $scope.category = response.data.category;
    id = response.data.id
  }, function myError(response) {
    alert("Try again later");
  });

  $scope.pcDelClick = function () {
    var r = confirm("Are you sure you want to delete?");
    if(r == true){
      var config = {
        method : "POST",
        url : "plan_category_connection.php",
        data : {
          "fun" : "deletePlanCategory",
        }
      }

      var request = $http(config);
      request.then(function mySuccess(response) {
        // console.log(response.data)
        window.location.href = "plan_category.php"
      }, function myError(response) {
        alert("Try again later");
      });
    }
  }

  $scope.pcUpClick = function () {
    var config = {
      method : "POST",
      url : "plan_category_connection.php",
      data : {
        "fun" : "updatePlanCategory",
        "category" : $scope.category,
        "id" : Number(id)
      }
    }

    var request = $http(config);
    request.then(function mySuccess(response) {
      console.log(response.data);
      if (response.data == "success") {
        window.location.href = "plan_category.php"
      }else{
        $scope.planError = "This plan category already exists";
      }
    }, function myError(response) {
      alert("Try again later");
    });
  }

});
