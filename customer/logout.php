<?php
session_start();
session_destroy();
unset($_SESSION['users']);
$_SESSION['message']="You are now logged out";
header("location:../index.html");
?>