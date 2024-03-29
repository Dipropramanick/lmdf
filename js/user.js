var heightListArr = [];
for(var i =130; i<=220;i++){
  heightListArr.push(i);
}



var userAddApp = angular.module("userAddApp", []);

userAddApp.controller('userAddCtrl', function($scope, $http) {

    $scope.id = null;
    $scope.name = "";
    $scope.phone = null;
    $scope.gender = "";
    $scope.address = "";
    $scope.email = "";
    $scope.dob = null;
    $scope.emerNum = null;
    $scope.emerName = "";
    $scope.nationality = "IN";
    $scope.verificaton = "";
    $scope.blood = "O+";
    $scope.heightList = heightListArr;
    $scope.height = 150;
    $scope.weight = null;
    $scope.other = ""
    $scope.password = "";
    $scope.Cpassword = "";
    $scope.plans = "Plan 1";
    $scope.joind = new Date();
    $scope.discp = 0;
    $scope.method = 0;
    $scope.dued = new Date();
    var emailCheck = 0;
    var phoneCheck = 0;
    var passCheck = 0;
    var config = {
      method : "POST",
      url : "user_add_connection.php",
      data : {
        "fun" : "getId",
      }
    }
    var request = $http(config);
    request.then(function mySuccess(response) {
      // console.log(response.data);
      $scope.id = Number(response.data) + 1;
    }, function myError(response) {
      alert("Try again later");
    });

    var config1 = {
      method : "POST",
      url : "user_add_connection.php",
      data : {
        "fun" : "getPlanC",
      }
    }
    var request1 = $http(config1);
    request1.then(function mySuccess(response) {
      // console.log(response.data);
      if (response.data == "failed") {
        alert("Please add plan category to continue");
      }else {
        $scope.planCList = response.data;
        $scope.planC = response.data[0];
        $scope.pcChange();
        $scope.discpFun();
      }
    }, function myError(response) {
      alert("Try again later");
    });

    var config2 = {
      method : "POST",
      url : "user_add_connection.php",
      data : {
        "fun" : "getTrainer",
      }
    }
    var request2 = $http(config2);
    request2.then(function mySuccess(response) {
      if (response.data == "failed") {
        alert("Please add a trainer to continue");
      }else {
        $scope.trainerList = response.data;
        $scope.trainer = response.data[0];

      }
    }, function myError(response) {
      alert("Try again later");
    });

    $scope.discpFun = function() {
      if ($scope.discp <= 100) {
        $scope.discc = $scope.price - (($scope.price * $scope.discp)/100);
        $scope.discpError = "";
      }else {
        $scope.discpError = "Please Enter A Valid Discount";
        $scope.discp = 0;
        $scope.discpFun();
      }
    }

    $scope.disccFun = function() {
      if ($scope.discc <= $scope.price) {
        // $scope.discc = $scope.price - (($scope.price * $scope.discp)/100);
        $scope.discp = (($scope.price-$scope.discc)/$scope.price)*100;
        $scope.apc = $scope.discc;
        $scope.apcFun();
        $scope.discpError = "";
      }else {
        $scope.discpError = "Please Enter A Valid Discount";
        $scope.discp = 0;
        $scope.discpFun();
      }
    }

    
    $scope.userAddClick = function() {    
          var check1 = 0;
          var check2 = 0;
          var check3 = 0;
          var ptv = 0;
          if($scope.pt == true){
              ptv = 1;
          }else{
              ptv = 0;
          }    
          if($scope.name == "" || $scope.phone == null || $scope.gender == "" || $scope.email == "" || $scope.dob == "" || $scope.address == "" || $scope.emerNum == null || $scope.emerName == "" || $scope.verificaton == "" || $scope.weight == null || $scope.other == "" || $scope.password == "" || $scope.Cpassword == ""){
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
            check2 = 0;
            passCheck = 1;
            $scope.passError = "Passwords not matching";
          }

          if($scope.planC == "" || $scope.plans == "" || $scope.joind == "" || $scope.exp == ""){
            check3 = 0;
            $scope.planError = "Please enter the plan details."
          }else {
            check3 = 1;
            $scope.planError = ""
          }

          if(check1 == 1 && check2 == 1 && phoneCheck ==1 && emailCheck == 1){ // && verCheck == 1

            var configure = {
              method : "POST",
              url : "user_add_connection.php",
              data : {
                'fun' : 'addUser',
                'id' : $scope.id,
                'name' : $scope.name,
                'phone' : $scope.phone,
                'email' : $scope.email,
                'gender' : $scope.gender,
                'address' : $scope.address,
                'emerNum' : $scope.emerNum,
                'emerName' : $scope.emerName,
                'dob' : $scope.dob,
                'nationality' : $scope.nationality,
                'verification' : $scope.verificaton,
                'password' : $scope.password,
                'blood' : $scope.blood,
                'height' : $scope.height,
                'weight' : $scope.weight,
                'other' : $scope.other,
                'password' : $scope.password,
                'planC' : $scope.planC.id,
                'plans' : $scope.plans.id,
                'joind' : $scope.joind,
                'exp' : $scope.exp,
                'trainer' : $scope.trainer.id,
                'discp' : $scope.discp,
                'discc' : $scope.discc,
                'method' : $scope.method,
                'pt' : ptv,
                'apc' : $scope.apc,
                'dued' : $scope.dued,  
              }
            }
            var request = $http(configure);

            request.then(function mySuccess(response) {
                window.location.href = "user_profile.php?id="+$scope.id;
            }, function myError(response) {
              alert("Please Check your Internet connectivity.");
            });
          }

    }

    $scope.emailCheck = function() {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (re.test(String($scope.email).toLowerCase())) {
        $scope.emailError = "";
        var configure = {
          method : "POST",
          url : "user_add_connection.php",
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
      }else {
        $scope.emailError = "Please Enter Valid Email."
      }
    }
    $scope.mobChange = function() {
      var str = ($scope.phone).toString();
      if(str.length == 10){
        var configure = {
          method : "POST",
          url : "user_add_connection.php",
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
    $scope.passChange = function() {
      if(passCheck == 1){
        if($scope.password == $scope.Cpassword){
          $scope.passError = "";
        }else{
          $scope.passError = "Passwords not matching";
        }
      }
    }
    $scope.pcChange = function () {
      var config1 = {
        method : "POST",
        url : "user_add_connection.php",
        data : {
          "fun" : "getPlans",
          "pc" : $scope.planC.category
        }
      }
      var request1 = $http(config1);
      request1.then(function mySuccess(response) {
        if (response.data == "failed") {
          alert("Please add plan to this category to continue");
          $scope.planList = [];
        }else {
          $scope.planList = response.data;
          $scope.plans = response.data[0];
          $scope.pChange();
        }
      }, function myError(response) {
        alert("Try again later");
      });
    }
    $scope.pChange = function () {
      var yrs = $scope.plans.years;
      var months = $scope.plans.months;
      var dt = new Date($scope.joind);
      dt.setDate( dt.getDate() - 1);
      dt.setMonth( dt.getMonth() + Number(months) );
      dt.setYear( dt.getFullYear() + Number(yrs));
      $scope.exp = dt;
      $scope.price = Number($scope.plans.price);
      $scope.discpFun();
      $scope.apc = $scope.discc; 
      $scope.apcFun();    
    }
    $scope.trainerChange = function () {
      var arr = [];
      var in1 = new Date($scope.trainer.ftimein)
      var in2 = new Date($scope.trainer.stimein)
      arr[0] = in1.toLocaleTimeString();
      arr[1] = in2.toLocaleTimeString();
      if(arr[0] == "Invalid Date"){
        arr.pop();
      }
      if(arr[1] == "Invalid Date"){
        arr.pop();
      }
      $scope.timeList = arr;
      $scope.ftimin = arr[0];
    }
    
    $scope.apcFun = function(){
        if($scope.apc > $scope.discc){
            $scope.apc = $scope.discc;
            $scope.apcFun();
        }else{
            $scope.due = $scope.discc - $scope.apc;
        }
    }

});




//===================================== USER VIEW =========================================================================//

var userApp = angular.module("userApp", []);

userApp.controller('userCtrl', function($scope, $http) {
  var config1 = {
    method : "POST",
    url : "user_connection.php",
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
    document.location.href = "user_edit.php?id=" + user.id;
  }
  
  $scope.invoice = function(usr){
      document.location.href = "invoice.php?id=" + usr.id;
  }


});



//===================================== USER EDIT =========================================================================//

var userEditApp = angular.module("userEditApp", []);

userEditApp.controller('userEditCtrl', function($scope, $http) {
  $scope.options = "0";
  $scope.ctcfin = 0;
  var pid = 0;
  var change = 1;    
  var expd = ""
  var url = window.location.href;
  var url_id = (url.split("?")[1]).split("=")[1];
  $scope.id = Number(url_id);
  $scope.heightList = heightListArr;

  var config = {
    method : "POST",
    url : "user_edit_connection.php",
    data : {
      "fun" : "getClient",
      'id' : $scope.id
    }
  }
  var planCG,plansG;
  var trG;
  var request = $http(config);
  request.then(function mySuccess(response) {
    console.log(response.data[0].name);
    $scope.name = response.data[0].name;
    $scope.phone = Number(response.data[0].phone);
    $scope.gender = response.data[0].gender;
    $scope.address = response.data[0].address;
    $scope.email = response.data[0].email;
    $scope.dob = new Date(response.data[0].dob);
    $scope.emerNum = Number(response.data[0].emerNum);
    $scope.emerName = response.data[0].emerName;
    $scope.nationality = response.data[0].nationality;
    $scope.verificaton = response.data[0].verification;
    $scope.blood = response.data[0].blood;
    $scope.height = Number(response.data[0].height);
    $scope.weight = Number(response.data[0].weight);
    $scope.other = response.data[0].others;
    $scope.password = response.data[0].password;
    $scope.Cpassword = response.data[0].password;
    $scope.plans = response.data[0].planC;
    $scope.joind = new Date(response.data[0].joind);
    $scope.discp = Number(response.data[0].discp);
    var a = Math.ceil(Number(response.data[0].discc));
    $scope.discc = a;
    $scope.method = response.data[0].method;
    $scope.exp = new Date(response.data[0].expd);
    expd = response.data[0].expd;
    planCG = response.data[0].planC;
    plansG = response.data[0].plans;
    if(response.data[0].pt == 1){
        $scope.pt = true;
    }else{
        $scope.pt = false;
    }  
    pid = plansG;
    trG = response.data[0].trainer;
    // console.log(trG);
  }, function myError(response) {
    alert("Try again later");
  });



  var emailCheck = 0;
  var phoneCheck = 0;
  var passCheck = 0;

  document.querySelector(".user_upgrade").style.display = "none";
  document.querySelector(".user_renewal").style.display = "none";
  document.querySelector(".user_payments").style.display = "none";
  $scope.optionsChange = function(){
      var edit = document.querySelector(".user_edit");      
      if($scope.options == "0"){
          document.querySelector(".user_edit").style.display = "block";
          document.querySelector(".user_upgrade").style.display = "none";
          document.querySelector(".user_renewal").style.display = "none";
          document.location.href = "user_edit.php?id="+$scope.id;
          document.querySelector(".user_payments").style.display = "none";
      }
      else if($scope.options == "1"){
          document.querySelector(".user_edit").style.display = "none";
          document.querySelector(".user_upgrade").style.display = "block";
          document.querySelector(".user_renewal").style.display = "none";
          document.querySelector(".user_payments").style.display = "none";
      }
      else if($scope.options == "2"){
          document.querySelector(".user_edit").style.display = "none";
          document.querySelector(".user_upgrade").style.display = "none";
          document.querySelector(".user_renewal").style.display = "block";
          $scope.joind_renew = new Date();
          $scope.pChange_renew();
          document.querySelector(".user_payments").style.display = "none";
      }else{
          document.querySelector(".user_edit").style.display = "none";
          document.querySelector(".user_upgrade").style.display = "none";
          document.querySelector(".user_renewal").style.display = "none";
          document.querySelector(".user_payments").style.display = "block";
          $scope.viewPays();
      }
  }

//$scope.optionsChange();
  
  $scope.viewPays = function(){
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
      console.log(response.data)
      $scope.userList = response.data;
      }, function myError(response) {
        alert("Try again later");
    });
  }

 

  var config1 = {
    method : "POST",
    url : "user_add_connection.php",
    data : {
      "fun" : "getPlanC",
    }
  }
  var request1 = $http(config1);
  request1.then(function mySuccess(response) {
//     console.log(response.data);
      console.log(planCG)
    if (response.data == "failed") {
      alert("Please add plan category to continue");
    }else {
      for (var i = 0; i < response.data.length; i++) {
        if (response.data[i].id == planCG) {
          $scope.planC = response.data[i];
          break;
        }
      }
      $scope.planCList = response.data;

      $scope.pcChange();
      $scope.discpFun();
    }
  }, function myError(response) {
    alert("Try again later");
  });
  $scope.exp = new Date(expd);
  var config2 = {
    method : "POST",
    url : "user_add_connection.php",
    data : {
      "fun" : "getTrainer",
    }
  }
  var request2 = $http(config2);
  request2.then(function mySuccess(response) {
    if (response.data == "failed") {
      alert("Please add a trainer to continue");
    }else {
      $scope.trainerList = response.data;
      for (var i = 0; i < response.data.length; i++) {
        if (response.data[i].id == trG) {
          $scope.trainer = response.data[i];
          $scope.trainerChange();
          break;
        }
      }
    }
  }, function myError(response) {
    alert("Try again later");
  });

  $scope.discpFun = function() {
    if ($scope.discp <= 100) {
      $scope.discc = Math.ceil($scope.price - (($scope.price * $scope.discp)/100));
      $scope.apc = $scope.discc;
      $scope.apcFun();
      $scope.apcFun_up();    
      $scope.discpError = "";
    }else {
      $scope.discpError = "Please Enter A Valid Discount";
      $scope.discp = 0;
      $scope.discpFun();
    }
  }

  $scope.disccFun = function() {
    if ($scope.discc <= $scope.price) {
      // $scope.discc = $scope.price - (($scope.price * $scope.discp)/100);
      $scope.discp = (($scope.price-$scope.discc)/$scope.price)*100;
      $scope.discpError = "";
      $scope.apc = $scope.discc;
      $scope.apcFun();
        
    }else {
      $scope.discpError = "Please Enter A Valid Discount";
      $scope.discp = 0;
      $scope.discpFun();
    }
  }
  
  
   $scope.discpFun_up = function() {
    if ($scope.discp_up <= 100) {
      $scope.discc_up = $scope.ctcfin - (($scope.ctcfin * $scope.discp_up)/100);
      $scope.apc = $scope.discc;
      $scope.apcFun();
      $scope.apcFun_up();    
//      $scope.discpError = "";
    }else {
//      $scope.discpError = "Please Enter A Valid Discount";
      $scope.discp_up = 0;
      $scope.discpFun_up();
    }
  }

  $scope.disccFun_up = function() {
    if ($scope.discc_up <= $scope.ctcfin) {
      // $scope.discc = $scope.price - (($scope.price * $scope.discp)/100);
      $scope.discp_up = Number(Number((($scope.ctcfin-$scope.discc_up)/$scope.ctcfin)*100).toFixed(2));
      $scope.apc = $scope.discc;
      $scope.apcFun();
      $scope.apcFun_up();    
//      $scope.discpError = "";
    }else {
//      $scope.discpError = "Please Enter A Valid Discount";
      $scope.discp_up = 0;
      $scope.discpFun_up();
    }
  }


  $scope.userEditClick = function() {
        var check1 = 0;
        var check2 = 0;
        var check3 = 0;
        var ptv = 0;
        if($scope.pt == true){
          ptv = 1;
        }else{
          ptv = 0;
        } 
        if($scope.name == "" || $scope.phone == null || $scope.gender == "" || $scope.email == "" || $scope.dob == "" || $scope.address == "" || $scope.emerNum == null || $scope.emerName == "" || $scope.verificaton == "" || $scope.weight == null || $scope.other == "" || $scope.password == "" || $scope.Cpassword == ""){
           $scope.error = "Please fill all the fields.";
           window.location.href = "#home";
        }else{
          $scope.error = "";
          check1 = 1;
        }
        console.log(check1);
        if($scope.password == $scope.Cpassword){
          check2 = 1;
          $scope.passError = "";
        }else{
          check2 = 0;
          passCheck = 1;
          $scope.passError = "Passwords not matching";
        }
        console.log(check2);
        if($scope.planC == "" || $scope.plans == "" || $scope.joind == "" || $scope.exp == ""){
          check3 = 0;
          $scope.planError = "Please enter the plan details."
        }else {
          check3 = 1;
          $scope.planError = ""
        }

        if(check1 == 1 && check2 == 1 ){ // && verCheck == 1 && phoneCheck ==1 && emailCheck == 1
          console.log($scope.plans.id);
          var configure = {
            method : "POST",
            url : "user_edit_connection.php",
            data : {
              'fun' : 'editUser',
              'id' : $scope.id,
              'name' : $scope.name,
              'phone' : $scope.phone,
              'email' : $scope.email,
              'gender' : $scope.gender,
              'address' : $scope.address,
              'emerNum' : $scope.emerNum,
              'emerName' : $scope.emerName,
              'dob' : $scope.dob,
              'nationality' : $scope.nationality,
              'verification' : $scope.verificaton,
              'password' : $scope.password,
              'blood' : $scope.blood,
              'height' : $scope.height,
              'weight' : $scope.weight,
              'other' : $scope.other,
              'password' : $scope.password,
              'planC' : $scope.planC.id,
              'plans' : $scope.plans.id,
              'joind' : $scope.joind,
              'exp' : $scope.exp,
              'trainer' : $scope.trainer.id,
              'discp' : $scope.discp,
              'discc' : $scope.discc,
              'method' : $scope.method,
              'pt' : ptv,    
            }
          }
          var request = $http(configure);

          request.then(function mySuccess(response) {
              console.log(response.data);
              // if (response.data == "success") {
                  window.location.href = "user.php";
              // }
          }, function myError(response) {
            alert("Please Check Your Internet Connectivity.");
          });
        }

  }

  $scope.emailCheck = function() {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(String($scope.email).toLowerCase())) {
      $scope.emailError = "";
      var configure = {
        method : "POST",
        url : "user_edit_connection.php",
        data : {
          'fun' : 'emailCheck',
          'email' : $scope.email,
          'id' : $scope.id
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
    }else {
      $scope.emailError = "Please Enter Valid Email."
    }
  }
  $scope.mobChange = function() {
    var str = ($scope.phone).toString();
    if(str.length == 10){
      var configure = {
        method : "POST",
        url : "user_edit_connection.php",
        data : {
          'fun' : 'phoneCheck',
          'phone' : ($scope.phone).toString(),
          'id' : $scope.id
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
  $scope.passChange = function() {
    if(passCheck == 1){
      if($scope.password == $scope.Cpassword){
        $scope.passError = "";
      }else{
        $scope.passError = "Passwords not matching";
      }
    }
  }
  $scope.pcChange = function () {
    var config1 = {
      method : "POST",
      url : "user_add_connection.php",
      data : {
        "fun" : "getPlans",
        "pc" : $scope.planC.category
      }
    }
    var request1 = $http(config1);
    request1.then(function mySuccess(response) {
      if (response.data == "failed") {
        alert("Please add plan to this category to continue");
        $scope.planList = [];
      }else {
        $scope.planList = response.data;
        for (var i = 0; i < response.data.length; i++) {
          if (response.data[i].id == plansG) {
            $scope.plans = response.data[i];
            break;
          }
        }
        $scope.pChange()
      }
    }, function myError(response) {
      alert("Try again later");
    });
  }
  
  
   
   
 
  $scope.pChange1 = function(){
      change = 0;
      $scope.pChange();
  }
  
  $scope.pChange = function () {
    var yrs = $scope.plans.years;
    var months = $scope.plans.months;
    var dt = new Date($scope.joind);
    dt.setDate( dt.getDate() - 1);
    dt.setMonth( dt.getMonth() + Number(months) );
    dt.setYear( dt.getFullYear() + Number(yrs));
    if(change === 1){
        $scope.exp = new Date(expd);
    }else{
        $scope.exp = dt;
    } 
    $scope.price = Number($scope.plans.price);
    $scope.discpFun();
  }
  
  $scope.pChange_renew = function () {
    var yrs = $scope.plans.years;
    var months = $scope.plans.months;
    var dt = new Date($scope.joind_renew);
    dt.setDate( dt.getDate() - 1);
    dt.setMonth( dt.getMonth() + Number(months) );
    dt.setYear( dt.getFullYear() + Number(yrs));
    $scope.exp_renew = dt;
    $scope.price = Number($scope.plans.price);
    $scope.discpFun();
  }
  
  $scope.ctc = function(){
//      alert(pid)
      var curPrice = 0;
      var getPrice_config = {
      method : "POST",
      url : "user_edit_connection.php",
      data : {
        "fun" : "getPlanOriginalPrice",
        "pc" : pid
      }
    }
    var request1 = $http(getPrice_config);
    request1.then(function mySuccess(response) {
      curPrice = Number(response.data);
      $scope.ctcfin = $scope.price - curPrice;
      $scope.discp_up = 0;
      $scope.discpFun_up();
    }, function myError(response) {
      alert("Try again later");
    });
     
  }
  
  $scope.trainerChange = function () {
    var arr = [];
    var in1 = new Date($scope.trainer.ftimein)
    var in2 = new Date($scope.trainer.stimein)
    arr[0] = in1.toLocaleTimeString();
    arr[1] = in2.toLocaleTimeString();
    if(arr[0] == "Invalid Date"){
      arr.pop();
    }
    if(arr[1] == "Invalid Date"){
      arr.pop();
    }
    $scope.timeList = arr;
    $scope.ftimin = arr[0];
  }

  $scope.userDelClick = function () {
    var r = confirm("Are you sure you want to delete the client?");
    if(r){
      var config1 = {
        method : "POST",
        url : "user_edit_connection.php",
        data : {
          "fun" : "delClient",
          "id" : Number(url_id)
        }
      }
      var request1 = $http(config1);
      request1.then(function mySuccess(response) {
        console.log(url_id,response.data);
        window.location.href = "user.php"
      }, function myError(response) {
        alert("Try again later");
      });
    }
  }

  $scope.method_up = 0;
  $scope.userUpgradeClick = function(){
      if($scope.ctcfin <=100){
          alert("Please enter valid plan for upgrading.");
      }else{
        var upgrade_config = {
            method : "POST",
            url : "user_edit_connection.php",
            data : {
                "fun" : "upgradePlan",
                "id" : $scope.id,
                "planC" : $scope.planC.id,
                "plans" : $scope.plans.id,
                "joind" : $scope.joind,
                "exp" : $scope.exp,
                "discp": $scope.discp_up,
                "discc" : $scope.discc_up,
                "method" : $scope.method_up,
                "apc" : $scope.apc_up,
                "due" : $scope.due_up,
                "dued" : $scope.dued
            }
        }
    var request1 = $http(upgrade_config);
    request1.then(function mySuccess(response) {
      window.location.href = "user.php"
    }, function myError(response) {
      alert("Try again later");
    });

      }
  }
    
  $scope.dued = new Date((new Date()).getTime()+ 7 * 24 * 60 * 60 * 1000);
  
   $scope.userRenewClick = function(){
      var res = confirm("Are you sure to renew?");
      if(res == true){
           var chk = 0;     
           var config1 = {
               method : "POST",
            url : "user_edit_connection.php",
            data : {
                "fun" : "renewPlan",
                "id" : $scope.id,
                "planC" : $scope.planC.id,
                "plans" : $scope.plans.id,
                "joind" : $scope.joind_renew,
                "exp" : $scope.exp_renew,
                "discp": $scope.discp,
                "discc" : $scope.discc,
                "method" : $scope.method,
                "trainer" : $scope.trainer.id,
                "apc" : $scope.apc,
                "due" : $scope.due,
                "dued" : $scope.dued
            }
           }
         var request1 = $http(config1);
         request1.then(function mySuccess(response) {
            console.log(response.data)
            if(response.data == "success"){
                alert("Renewed Successfully")
                window.location.href = "user_edit.php?id=" + $scope.id;
                chk = 1;
            }else{
                alert("Contact Developers.")
            }
         }, function myError(response) {
            alert("Try again later");
        });
//          if(chk == 0){
//            alert("Please fill all the details.")
//       }
      }
       
  }
   
       $scope.apcFun = function(){
        if($scope.apc > $scope.discc){
            $scope.apc = $scope.discc;
            $scope.apcFun();
        }else{
            $scope.due = $scope.discc - $scope.apc;
        }
    }
       
     $scope.apcFun_up = function(){
        if($scope.apc_up > $scope.discc_up){
            $scope.apc_up = $scope.discc_up;
            $scope.apcFun_up();
        }else{
            $scope.due_up = $scope.discc_up - $scope.apc_up;
        }
    }   

});
