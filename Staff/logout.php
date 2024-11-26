<?php
if(session_status()===PHP_SESSION_NONE){
	session_start();
}
// unset($_SESSION['username']);
$_SESSION['loggedin']=false;

// unset($_SESSION['username']);
session_unset();
session_destroy();
header('Refresh:1;URL=index.php');
?>