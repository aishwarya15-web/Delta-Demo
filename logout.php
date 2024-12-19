<?php
session_start();
session_destroy();  
//unset($_SESSION['username']);
echo "<script>alert('You have been signed out successfully!')</script>";  
echo "<script>window.open('login.php','_self')</script>";

?>  