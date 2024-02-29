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

$internetcafe_id = $_POST["internetcafe_id"];

// เพิ่มข้อมูลพนักงาน
$sql = "INSERT INTO employees VALUES ('$emp_id','$First_name','$Last_name','$Address','$Role','$age','$gender','$salary','$phone','$hours','$internetcafe_id')";
mysqli_query($con, $sql);



?>
<html>

<body>
    <script>
            alert("ADD SUCCESSFUL!!")
    </script>
    <a href="../index.html"> BACK TO HOME PAHE</a>
</body>

</html>