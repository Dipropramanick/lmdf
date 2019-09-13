<?php
session_start();
if(session_destroy())
{
header("Location: index.php");
}
if ( isset( $_COOKIE[session_name()] ) )
setcookie( session_name(), “”, time()-3600, “/” );
//clear session from globals
$_SESSION = array();
//clear session from disk
session_destroy();

  header("Location:login.php");
 ?>
