<?php
$con = mysqli_connect("localhost", "root", "", "internetcafe");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} 
?>
