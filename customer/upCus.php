<?php
require("../connect/connect.php");

$cus_id = $_POST["cus_id"];
$First_name = $_POST["First_name"];
$Last_name = $_POST["Last_name"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$phone = $_POST["phone"];
$Address = $_POST["Address"];
$internetcafe_id = $_POST["internetcafe_id"];
$users =  $_POST["users"];
$passwords =  $_POST["passwords"];

    $sql = "UPDATE customers SET First_name = '$First_name',Last_name = '$Last_name',
    age = '$age',gender = '$gender',phone = '$phone',Address = '$Address',internetcafe_id = '$internetcafe_id',users  = '$users',
    passwords = '$passwords' 
    WHERE  cus_id = '$cus_id'";
    mysqli_query($con, $sql);
?>
   
<html lang="en">
<body>
    <br>
    <script type="text/javascript">
         alert("Record update successfully !");
         window.location.href = 'cusList.php';
     </script>

</body>
</html>