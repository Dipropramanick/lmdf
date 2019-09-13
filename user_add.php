<?php
  error_reporting(0);
  session_start();
  if($_SESSION['login'] == 0){
    header("Location:index.php");
  }
?>

<html>
<head>
    <title>Leon Maestro De Fitness</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Beardo Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
   <link href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
   <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //Fonts -->
    <script type="text/javascript" src="js/angular.js"></script>
    <script type="text/javascript" src="js/user.js"></script>
</head>

<body>

<!-- header -->
  <?php include "header.php"?>
<!-- //header -->
<!-- banner -->
<section class="inner-page-banner" id="home">
</section>
<!-- //banner -->

<!-- page details -->
<div class="breadcrumb-agile">
	<ol class="breadcrumb mb-0">
		<li class="breadcrumb-item">
			<a href="index.php">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Add Client</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->
    <section class="content-info py-5" ng-app="userAddApp" ng-controller="userAddCtrl">
        <div class="container py-md-5">
            <div class="text-center px-lg-5">
                <h3 class="heading text-center mb-3 mb-sm-5">Add New Client</h3>
                <p>All fields are compulsory</p>
            </div>
            <div class="contact-w3pvt-form mt-5">
                <form class="w3layouts-contact-fm" method="post">
                  <p style="color:red;">{{error}}</p>
                  <div class="row">
                    <div class="col-lg-6">
                      <label for="">Profile Picture:&nbsp;&nbsp;</label>
                      <input id="inp1" type="file" accept="image/*" value="capture/upload image" capture="camera" onchange="loadFiles1(event)"/>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <img id="out1" style="margin:auto;margin-left:40%;height:200px;width:200px;display:none;border-radius:50%;">
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="userid">Client Id</label>
                                <input class="form-control" type="number" min="1" name="Name" id="userid" placeholder="Enter User Id" ng-model="id" disabled>
                            </div>
                          </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" ng-model="name" name="Name" id="name" placeholder="Enter Employee Name" >
                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <p style="color:red;">{{mobError}}</p>
                                    <label for="phone">Mobile Number</label>
                                    <input class="form-control" type="number" min="1" name="Name" id="phone" placeholder="Enter Mobile Number" ng-model="phone" ng-change="mobChange()">
                                </div>
                              </div>
                                <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type">Gender</label>
                                    <select style="" id="type" class="form-control" ng-model="gender">
                                      <option value="Male" style="height:57px;">Male</option>
                                      <option value="Female" style="height:57px;">Female</option>
                                      <option value="Other" style="height:57px;">Other</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input class="form-control" type="text" min="1" name="address" id="address" placeholder="Enter Address" ng-model="address" ng-change="verCheck()">
                                    </div>
                                  </div>
                                </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p style="color:red;">{{emailError}}</p>
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" min="1" name="email" id="email" placeholder="Enter Email" ng-model="email" ng-change="emailCheck()">
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <label for="dob">Date Of Birth</label>
                                    <input class="form-control" type="date" min="1" name="dob" id="dob" placeholder="Enter Date of Birth" ng-model="dob" style="height:57px;">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="emerNum">Emergency Contact Number</label>
                                            <input class="form-control" type="number" min="1" name="emerNum" id="emerNum" placeholder="Enter Emergency Contact Number" ng-model="emerNum">
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="emerName">Emergency Contact Person Name</label>
                                              <input class="form-control" type="text"  name="emerName" id="emerName" placeholder="Enter Emergency Contact Name" ng-model="emerName">
                                          </div>
                                        </div>

                                      </div>

                                        <div class="row">
                                                <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="nationality">Nationality</label>
                                                    <select style="" id="nationality" class="form-control" ng-model="nationality">
                                                      <option value="AF">Afghanistan</option>
                                                        	<option value="AX">Åland Islands</option>
                                                        	<option value="AL">Albania</option>
                                                        	<option value="DZ">Algeria</option>
                                                        	<option value="AS">American Samoa</option>
                                                        	<option value="AD">Andorra</option>
                                                        	<option value="AO">Angola</option>
                                                        	<option value="AI">Anguilla</option>
                                                        	<option value="AQ">Antarctica</option>
                                                        	<option value="AG">Antigua and Barbuda</option>
                                                        	<option value="AR">Argentina</option>
                                                        	<option value="AM">Armenia</option>
                                                        	<option value="AW">Aruba</option>
                                                        	<option value="AU">Australia</option>
                                                        	<option value="AT">Austria</option>
                                                        	<option value="AZ">Azerbaijan</option>
                                                        	<option value="BS">Bahamas</option>
                                                        	<option value="BH">Bahrain</option>
                                                        	<option value="BD">Bangladesh</option>
                                                        	<option value="BB">Barbados</option>
                                                        	<option value="BY">Belarus</option>
                                                        	<option value="BE">Belgium</option>
                                                        	<option value="BZ">Belize</option>
                                                        	<option value="BJ">Benin</option>
                                                        	<option value="BM">Bermuda</option>
                                                        	<option value="BT">Bhutan</option>
                                                        	<option value="BO">Bolivia, Plurinational State of</option>
                                                        	<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                        	<option value="BA">Bosnia and Herzegovina</option>
                                                        	<option value="BW">Botswana</option>
                                                        	<option value="BV">Bouvet Island</option>
                                                        	<option value="BR">Brazil</option>
                                                        	<option value="IO">British Indian Ocean Territory</option>
                                                        	<option value="BN">Brunei Darussalam</option>
                                                        	<option value="BG">Bulgaria</option>
                                                        	<option value="BF">Burkina Faso</option>
                                                        	<option value="BI">Burundi</option>
                                                        	<option value="KH">Cambodia</option>
                                                        	<option value="CM">Cameroon</option>
                                                        	<option value="CA">Canada</option>
                                                        	<option value="CV">Cape Verde</option>
                                                        	<option value="KY">Cayman Islands</option>
                                                        	<option value="CF">Central African Republic</option>
                                                        	<option value="TD">Chad</option>
                                                        	<option value="CL">Chile</option>
                                                        	<option value="CN">China</option>
                                                        	<option value="CX">Christmas Island</option>
                                                        	<option value="CC">Cocos (Keeling) Islands</option>
                                                        	<option value="CO">Colombia</option>
                                                        	<option value="KM">Comoros</option>
                                                        	<option value="CG">Congo</option>
                                                        	<option value="CD">Congo, the Democratic Republic of the</option>
                                                        	<option value="CK">Cook Islands</option>
                                                        	<option value="CR">Costa Rica</option>
                                                        	<option value="CI">Côte d'Ivoire</option>
                                                        	<option value="HR">Croatia</option>
                                                        	<option value="CU">Cuba</option>
                                                        	<option value="CW">Curaçao</option>
                                                        	<option value="CY">Cyprus</option>
                                                        	<option value="CZ">Czech Republic</option>
                                                        	<option value="DK">Denmark</option>
                                                        	<option value="DJ">Djibouti</option>
                                                        	<option value="DM">Dominica</option>
                                                        	<option value="DO">Dominican Republic</option>
                                                        	<option value="EC">Ecuador</option>
                                                        	<option value="EG">Egypt</option>
                                                        	<option value="SV">El Salvador</option>
                                                        	<option value="GQ">Equatorial Guinea</option>
                                                        	<option value="ER">Eritrea</option>
                                                        	<option value="EE">Estonia</option>
                                                        	<option value="ET">Ethiopia</option>
                                                        	<option value="FK">Falkland Islands (Malvinas)</option>
                                                        	<option value="FO">Faroe Islands</option>
                                                        	<option value="FJ">Fiji</option>
                                                        	<option value="FI">Finland</option>
                                                        	<option value="FR">France</option>
                                                        	<option value="GF">French Guiana</option>
                                                        	<option value="PF">French Polynesia</option>
                                                        	<option value="TF">French Southern Territories</option>
                                                        	<option value="GA">Gabon</option>
                                                        	<option value="GM">Gambia</option>
                                                        	<option value="GE">Georgia</option>
                                                        	<option value="DE">Germany</option>
                                                        	<option value="GH">Ghana</option>
                                                        	<option value="GI">Gibraltar</option>
                                                        	<option value="GR">Greece</option>
                                                        	<option value="GL">Greenland</option>
                                                        	<option value="GD">Grenada</option>
                                                        	<option value="GP">Guadeloupe</option>
                                                        	<option value="GU">Guam</option>
                                                        	<option value="GT">Guatemala</option>
                                                        	<option value="GG">Guernsey</option>
                                                        	<option value="GN">Guinea</option>
                                                        	<option value="GW">Guinea-Bissau</option>
                                                        	<option value="GY">Guyana</option>
                                                        	<option value="HT">Haiti</option>
                                                        	<option value="HM">Heard Island and McDonald Islands</option>
                                                        	<option value="VA">Holy See (Vatican City State)</option>
                                                        	<option value="HN">Honduras</option>
                                                        	<option value="HK">Hong Kong</option>
                                                        	<option value="HU">Hungary</option>
                                                        	<option value="IS">Iceland</option>
                                                        	<option value="IN">India</option>
                                                        	<option value="ID">Indonesia</option>
                                                        	<option value="IR">Iran, Islamic Republic of</option>
                                                        	<option value="IQ">Iraq</option>
                                                        	<option value="IE">Ireland</option>
                                                        	<option value="IM">Isle of Man</option>
                                                        	<option value="IL">Israel</option>
                                                        	<option value="IT">Italy</option>
                                                        	<option value="JM">Jamaica</option>
                                                        	<option value="JP">Japan</option>
                                                        	<option value="JE">Jersey</option>
                                                        	<option value="JO">Jordan</option>
                                                        	<option value="KZ">Kazakhstan</option>
                                                        	<option value="KE">Kenya</option>
                                                        	<option value="KI">Kiribati</option>
                                                        	<option value="KP">Korea, Democratic People's Republic of</option>
                                                        	<option value="KR">Korea, Republic of</option>
                                                        	<option value="KW">Kuwait</option>
                                                        	<option value="KG">Kyrgyzstan</option>
                                                        	<option value="LA">Lao People's Democratic Republic</option>
                                                        	<option value="LV">Latvia</option>
                                                        	<option value="LB">Lebanon</option>
                                                        	<option value="LS">Lesotho</option>
                                                        	<option value="LR">Liberia</option>
                                                        	<option value="LY">Libya</option>
                                                        	<option value="LI">Liechtenstein</option>
                                                        	<option value="LT">Lithuania</option>
                                                        	<option value="LU">Luxembourg</option>
                                                        	<option value="MO">Macao</option>
                                                        	<option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                                        	<option value="MG">Madagascar</option>
                                                        	<option value="MW">Malawi</option>
                                                        	<option value="MY">Malaysia</option>
                                                        	<option value="MV">Maldives</option>
                                                        	<option value="ML">Mali</option>
                                                        	<option value="MT">Malta</option>
                                                        	<option value="MH">Marshall Islands</option>
                                                        	<option value="MQ">Martinique</option>
                                                        	<option value="MR">Mauritania</option>
                                                        	<option value="MU">Mauritius</option>
                                                        	<option value="YT">Mayotte</option>
                                                        	<option value="MX">Mexico</option>
                                                        	<option value="FM">Micronesia, Federated States of</option>
                                                        	<option value="MD">Moldova, Republic of</option>
                                                        	<option value="MC">Monaco</option>
                                                        	<option value="MN">Mongolia</option>
                                                        	<option value="ME">Montenegro</option>
                                                        	<option value="MS">Montserrat</option>
                                                        	<option value="MA">Morocco</option>
                                                        	<option value="MZ">Mozambique</option>
                                                        	<option value="MM">Myanmar</option>
                                                        	<option value="NA">Namibia</option>
                                                        	<option value="NR">Nauru</option>
                                                        	<option value="NP">Nepal</option>
                                                        	<option value="NL">Netherlands</option>
                                                        	<option value="NC">New Caledonia</option>
                                                        	<option value="NZ">New Zealand</option>
                                                        	<option value="NI">Nicaragua</option>
                                                        	<option value="NE">Niger</option>
                                                        	<option value="NG">Nigeria</option>
                                                        	<option value="NU">Niue</option>
                                                        	<option value="NF">Norfolk Island</option>
                                                        	<option value="MP">Northern Mariana Islands</option>
                                                        	<option value="NO">Norway</option>
                                                        	<option value="OM">Oman</option>
                                                        	<option value="PK">Pakistan</option>
                                                        	<option value="PW">Palau</option>
                                                        	<option value="PS">Palestinian Territory, Occupied</option>
                                                        	<option value="PA">Panama</option>
                                                        	<option value="PG">Papua New Guinea</option>
                                                        	<option value="PY">Paraguay</option>
                                                        	<option value="PE">Peru</option>
                                                        	<option value="PH">Philippines</option>
                                                        	<option value="PN">Pitcairn</option>
                                                        	<option value="PL">Poland</option>
                                                        	<option value="PT">Portugal</option>
                                                        	<option value="PR">Puerto Rico</option>
                                                        	<option value="QA">Qatar</option>
                                                        	<option value="RE">Réunion</option>
                                                        	<option value="RO">Romania</option>
                                                        	<option value="RU">Russian Federation</option>
                                                        	<option value="RW">Rwanda</option>
                                                        	<option value="BL">Saint Barthélemy</option>
                                                        	<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                                        	<option value="KN">Saint Kitts and Nevis</option>
                                                        	<option value="LC">Saint Lucia</option>
                                                        	<option value="MF">Saint Martin (French part)</option>
                                                        	<option value="PM">Saint Pierre and Miquelon</option>
                                                        	<option value="VC">Saint Vincent and the Grenadines</option>
                                                        	<option value="WS">Samoa</option>
                                                        	<option value="SM">San Marino</option>
                                                        	<option value="ST">Sao Tome and Principe</option>
                                                        	<option value="SA">Saudi Arabia</option>
                                                        	<option value="SN">Senegal</option>
                                                        	<option value="RS">Serbia</option>
                                                        	<option value="SC">Seychelles</option>
                                                        	<option value="SL">Sierra Leone</option>
                                                        	<option value="SG">Singapore</option>
                                                        	<option value="SX">Sint Maarten (Dutch part)</option>
                                                        	<option value="SK">Slovakia</option>
                                                        	<option value="SI">Slovenia</option>
                                                        	<option value="SB">Solomon Islands</option>
                                                        	<option value="SO">Somalia</option>
                                                        	<option value="ZA">South Africa</option>
                                                        	<option value="GS">South Georgia and the South Sandwich Islands</option>
                                                        	<option value="SS">South Sudan</option>
                                                        	<option value="ES">Spain</option>
                                                        	<option value="LK">Sri Lanka</option>
                                                        	<option value="SD">Sudan</option>
                                                        	<option value="SR">Suriname</option>
                                                        	<option value="SJ">Svalbard and Jan Mayen</option>
                                                        	<option value="SZ">Swaziland</option>
                                                        	<option value="SE">Sweden</option>
                                                        	<option value="CH">Switzerland</option>
                                                        	<option value="SY">Syrian Arab Republic</option>
                                                        	<option value="TW">Taiwan, Province of China</option>
                                                        	<option value="TJ">Tajikistan</option>
                                                        	<option value="TZ">Tanzania, United Republic of</option>
                                                        	<option value="TH">Thailand</option>
                                                        	<option value="TL">Timor-Leste</option>
                                                        	<option value="TG">Togo</option>
                                                        	<option value="TK">Tokelau</option>
                                                        	<option value="TO">Tonga</option>
                                                        	<option value="TT">Trinidad and Tobago</option>
                                                        	<option value="TN">Tunisia</option>
                                                        	<option value="TR">Turkey</option>
                                                        	<option value="TM">Turkmenistan</option>
                                                        	<option value="TC">Turks and Caicos Islands</option>
                                                        	<option value="TV">Tuvalu</option>
                                                        	<option value="UG">Uganda</option>
                                                        	<option value="UA">Ukraine</option>
                                                        	<option value="AE">United Arab Emirates</option>
                                                        	<option value="GB">United Kingdom</option>
                                                        	<option value="US">United States</option>
                                                        	<option value="UM">United States Minor Outlying Islands</option>
                                                        	<option value="UY">Uruguay</option>
                                                        	<option value="UZ">Uzbekistan</option>
                                                        	<option value="VU">Vanuatu</option>
                                                        	<option value="VE">Venezuela, Bolivarian Republic of</option>
                                                        	<option value="VN">Viet Nam</option>
                                                        	<option value="VG">Virgin Islands, British</option>
                                                        	<option value="VI">Virgin Islands, U.S.</option>
                                                        	<option value="WF">Wallis and Futuna</option>
                                                        	<option value="EH">Western Sahara</option>
                                                        	<option value="YE">Yemen</option>
                                                        	<option value="ZM">Zambia</option>
                                                        	<option value="ZW">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <p style="color:red;">{{verError}}</p>
                                                <label for="verificaton">Aadhaar/Passport Number</label>
                                                <input class="form-control" type="text" min="1" name="verificaton" id="verificaton" placeholder="Enter Aadhaar/Passport Number" ng-model="verificaton" ng-change="verCheck()">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="blood">Blood Group</label>
                                              <select style="" id="blood" class="form-control" ng-model="blood">
                                                <option value="A+" style="height:57px;">A+</option>
                                                <option value="A-" style="height:57px;">A-</option>
                                                <option value="B+" style="height:57px;">B+</option>
                                                <option value="B-" style="height:57px;">B-</option>
                                                <option value="AB+" style="height:57px;">AB+</option>
                                                <option value="AB-" style="height:57px;">AB-</option>
                                                <option value="O+" style="height:57px;">O+</option>
                                                <option value="O-" style="height:57px;">O-</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                      <div class="form-group">
                                          <label for="height">Height</label>
                                          <select style="" id="height" class="form-control" ng-options="i for i in heightList" ng-model="height">
                                          </select>
                                      </div>
                                  </div>

                                  </div>


                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="weight">Weight(Kgs)</label>
                                              <input class="form-control" type="number" min="1" name="weight" id="weight" placeholder="Enter Weight" ng-model="weight">
                                          </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="other">Any other health issues</label>
                                                <input class="form-control" type="text"  name="other" id="other" placeholder="Any other health issues" ng-model="other">
                                            </div>
                                          </div>

                                        </div>



                                        <p style="color:red;">{{passError}}</p>
                                        <div class="row">
                                          <hr>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password" ng-model="password" ng-change="passChange()">
                                                </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="form-group">
                                                      <label for="Cpassword">Confirm Password</label>
                                                      <input class="form-control" type="password" name="Cpassword" id="Cpassword" placeholder="Enter Confirm Password" ng-model="Cpassword" ng-change="passChange()">
                                                  </div>
                                                </div>
                                              </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                              <div class="text-center px-lg-5">
                                                  <h4 class="heading text-center mb-3 mb-sm-5">Plan Details</h4>
                                              </div>
                                            </div>
                                        </div>
                                        <p style="color:red;">{{planError}}</p>
                                        <div class="row">
                                          <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="planC">Plan Category</label>
                                              <select style="" id="planC" class="form-control" ng-options="pc.category for pc in planCList" ng-model="planC" ng-change="pcChange()">
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                      <div class="form-group">
                                          <label for="plan">Plan Name</label>
                                          <select style="" id="plan" class="form-control" ng-options="i.name for i in planList" ng-model="plans" ng-change="pChange()">
                                          </select>
                                      </div>
                                  </div>

                                  </div>

                                  <div class="row">
                                      <div class="col-lg-6">
                                        <label for="join">Date Of Joining</label>
                                        <input class="form-control" type="date" min="1" name="join" id="join" placeholder="Enter Date of Birth" ng-model="joind" style="height:57px;" ng-change="pChange()">
                                      </div>
                                        <div class="col-lg-6">
                                          <label for="exp">Date Of Expiry</label>
                                            <input class="form-control" type="date" min="1" name="exp" id="exp" placeholder="Enter Date of Birth" ng-model="exp" style="height:57px;" disabled>
                                          </div>
                                      </div>


                                      <div class="row">
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="trainer">Trainer</label>
                                            <select style="" id="trainer" class="form-control" ng-options="tr.name for tr in trainerList" ng-model="trainer" style="height:57px;" ng-change="trainerChange()">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="time">Session StartTime</label>
                                        <select style="" id="plan" class="form-control" ng-options="ti for ti in timeList" ng-model="ftimin" style="height:57px;">
                                        </select>
                                    </div>
                                </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-12">
                                  <div class="form-group">
                                      <label for="price">Final Price</label>
                                      <input class="form-control" type="number"  name="price" id="price" placeholder="Final Price" ng-model="price" style="height:57px;" disabled>
                                  </div>
                              </div>

                          </div>



                          <div class="row">
                              <div class="col-lg-12">
                                <div class="text-center px-lg-5">
                                    <h4 class="heading text-center mb-3 mb-sm-5">Payment</h4>
                                </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="discp">Discount Percent%</label>
                                    <p style="color:red;">{{discpError}}</p>
                                    <input class="form-control" type="number"  name="discp" id="discp" placeholder="Discount Percentage" ng-model="discp" style="height:57px;" ng-change="discpFun()">
                                </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="discc">Cost to the Client</label>
                                    <input class="form-control" type="number"  name="discc" id="discc" placeholder="Cost to the Client" ng-model="discc" style="height:57px;" ng-change="disccFun()">
                                </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <label>Payment: </label><br>
                                      <label for="no">
                                      <input type="radio" id="no" name="sch" ng-model="method" value="0" style="height:20px;">Cash</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                      <label for="one">
                                      <input type="radio" id="one" name="sch" ng-model="method" value="1" style="height:20px;">Credit/Debit Card</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                      <label for="two">
                                      <input type="radio" id="two" name="sch" ng-model="method" value="2" style="height:20px;">Cheque/UPI/Other</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                  </div>
                                </div>
                                </div>


                                        <div class="form-group mx-auto mt-3">
                                            <button ng-click="userAddClick()" class="btn submit" style="background-color:red;">Add Client</button>
                                        </div>








                </form>
            </div>
        </div>
    </section>
    <!-- //banner-botttom -->
<script type="text/javascript">
// var profile = "";
// var loadFiles = function(event) {
//   var reader = new FileReader();
//   reader.onload = function(){
//     var output = document.getElementById('out1');
//     if(reader.result == null){
//       output.style.display = "none";
//     }else {
//       output.style.display = "block";
//       output.src = reader.result;
//       profile = reader.result;
//     }
//   };
//   reader.readAsDataURL(event.target.files[0]);
// };
</script>
<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->

</body>
</html>
