<?php
     session_start();
     $_SESSION= array();
     if (isset($_COOKIE[session_name()])) {
     	setcookie(session_name(),'',time()-42000,'/');
     	# code...
     }
     session_destroy();
     header("location:login.php");
?>