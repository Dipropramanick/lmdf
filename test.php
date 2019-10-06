<?php
  $name = "pranav";
  $id = 18632;
  $phone = '9113521458';
  $msg2 = "Hi $name, Thank you for joining the LMF family. Your user id is $id. Please visit https://lmdffinal.000webhostapp.com/ to access your LMF Account.";         
  $msg2 = urlencode($msg2);
  $link2 = "https://alerts.solutionsinfini.com/api/v4/?api_key=A396749973d759c784a0c167eeb5ca2e8&method=sms&message=$msg2&to=91$phone&sender=LEONMA";
  $ran2 = file_get_contents($link2); 
?>