<?php
    include "db.php";
    $c = $_REQUEST['c'];
    $t = $_REQUEST['t'];
    session_start();
    $id = $_SESSION['userid'];
    $sql = "UPDATE pt SET fb=0,rating=$c,fb_text='$t' WHERE userid=$id ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    echo "done";
?>