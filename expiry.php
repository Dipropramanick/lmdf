<?php
    include "db.php";
    $sql = "SELECT * FROM user WHERE NOT expired=1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {    
        while($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $expd = $row['expd'];  
            $phone = $row['phone'];
            $expd = strtotime($expd);
            $exp = date('d-m-Y',$expd);
//            $diff = (strtotime(date('d-m-Y')) - $expd)/60/60/24;
            $diff = ceil((strtotime(date('d-m-Y')) - $expd)/60/60/24);
            echo $diff;
            if($expd<strtotime(date('d-m-Y'))){
                $id = $row['id'];
                $sql1 = "UPDATE user set expired=1 WHERE id=$id";
                $result1 = $conn->query($sql1);
                $msg = "Hi $name, your membership plan has expired on $exp. Please renew it at the earliest. Thank you, Leon Maestro De Fitness 9886781967";
                $msg = urlencode($msg);
                $link = "https://alerts.solutionsinfini.com/api/v4/?api_key=A396749973d759c784a0c167eeb5ca2e8&method=sms&message=$msg&to=91$phone&sender=LEONMA";
                $ran = file_get_contents($link);
                
            }else if($diff == -3){
                $msg = "Hi $name your membership plan is getting expired on $exp please renew it at the earliest. Thank you, Leon Maestro De Fitness Contact: 9886781967";
                $msg = urlencode($msg);
                $link = "https://alerts.solutionsinfini.com/api/v4/?api_key=A396749973d759c784a0c167eeb5ca2e8&method=sms&message=$msg&to=91$phone&sender=LEONMA";
                $ran = file_get_contents($link);
            }
        }
    }

    $sql = "SELECT * FROM due";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {    
        while($row = $result->fetch_assoc()) {
            $expd = $row['date'];  
            $expd = strtotime($expd);
            if($expd<strtotime(date('d-m-Y'))){
                $id = $row['user_id'];
                
                $sql1 = "UPDATE due set expired=1 WHERE user_id=$id";
                $result1 = $conn->query($sql1);
                $amt = $row['due_amt'];
                
                $sql1 = "SELECT * FROM user WHERE id=$id";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {    
                    while($row1 = $result1->fetch_assoc()) {
                        $name = $row1['name'];  
                        $phone = $row1['phone'];  
                    }
                }
                
                $msg = "Hi $name your payment of Rs.$amt is due please make the payment at the earliest. Thank you, Leon Maestro De Fitness Contact: 9886781967";
                $msg = urlencode($msg);
                $link = "https://alerts.solutionsinfini.com/api/v4/?api_key=A396749973d759c784a0c167eeb5ca2e8&method=sms&message=$msg&to=91$phone&sender=LEONMA";
                $ran = file_get_contents($link);
                
            }
        }
    }
?>