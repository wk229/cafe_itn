
<?php

require("../connect/connect.php");

$emp_id = $_POST["emp_id"];
$First_name = $_POST["First_name"];
$Last_name = $_POST["Last_name"];
$Address = $_POST["Address"];
$Role = $_POST["Role"];
$gender = $_POST["gender"];
$salary = $_POST["salary"];
$hours = $_POST["hours"];
$age = $_POST["age"];
$phone = $_POST["phone"];
$internetcafe_id = $_POST["internetcafe_id"];
$users = $_POST["users"];
$passwords = $_POST["passwords"];


    $sql = "UPDATE employees SET First_name = '$First_name',Last_name = '$Last_name',
    Address = '$Address',Role = '$Role',gender = '$gender',
    salary = '$salary',hours = '$hours',age = '$age',
    phone = '$phone',
    users = '$users',
    passwords = '$passwords',
    internetcafe_id = '$internetcafe_id' 

    WHERE  emp_id = '$emp_id' ";
    mysqli_query($con, $sql);
?>
<html>

<body>
<script type="text/javascript">
         alert("Record update successfully !");
         window.location.href = 'empList.php';
     </script>
</body>

</html>