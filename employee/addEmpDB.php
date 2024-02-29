<?php
require("../connect/connect.php");
$emp_id = $_POST["emp_id"];

$First_name = $_POST["First_name"];

$Last_name = $_POST["Last_name"];

$Address =  $_POST["Address"];

$Role = $_POST["Role"];

$gender = $_POST["gender"];

$salary = $_POST["salary"];

$hours = $_POST["hours"];

$age = $_POST["age"];

$phone = $_POST["phone"];


$users = $_POST["users"];
$passwords = $_POST["passwords"];
$internetcafe_id = $_POST["internetcafe_id"];

// เพิ่มข้อมูลพนักงาน
$sql = "INSERT INTO employees VALUES ('$emp_id','$First_name','$Last_name','$Address','$Role','$gender','$salary' ,'$hours','$age','$phone','$users','$passwords','$internetcafe_id')";
mysqli_query($con, $sql);



?>
<html>

<body>
<script type="text/javascript">
         alert("ADD successful !");
         window.location.href = 'empform.php';
     </script>
</body>

</html>