<?php
require("../connect/connect.php");
$Menu_id = $_POST["Menu_id"];

$Menu_name = $_POST["Menu_name"];

$stock = $_POST["stock"];

$price =  $_POST["price"];

$immage = $_FILES["file"]["name"];

if (empty($immage)) {
    $sql = "UPDATE  menus SET Menu_name='$Menu_name',stock='$stock',price='$price' WHERE Menu_id='" . $Menu_id . "' ";
    mysqli_query($con, $sql);
} else {
    $sql = "UPDATE  menus SET Menu_name='$Menu_name',stock='$stock',price='$price',image='$immage'WHERE Menu_id='" . $Menu_id . "' ";
    mysqli_query($con, $sql);
    $location = "upload/". $immage;
    move_uploaded_file($_FILES["file"]["tmp_name"],$location);
}
 
?>
<html>
<body>
<script type="text/javascript">
         alert("Record update successfully !");
         window.location.href = 'MenuList.php';
     </script>
</html>