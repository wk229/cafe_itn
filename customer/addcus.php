
<?php
require("../connect/connect.php");
$cus_id = $_POST["cus_id"];

$First_name = $_POST["First_name"];

$Last_name = $_POST["Last_name"];

$age = $_POST["age"];

$gender = $_POST["gender"];

$phone = $_POST["phone"];

$Address =  $_POST["Address"];

$internetcafe_id = $_POST["internetcafe_id"];

$users =  $_POST["users"];

$passwords =  $_POST["passwords"];

// เพิ่มข้อมูลลูกค้า
$sql = "INSERT INTO customers VALUES ('$cus_id','$First_name','$Last_name','$age','$gender','$phone','$Address','$users','$passwords','$internetcafe_id')";
mysqli_query($con,$sql);

?>
<html>

<body>
<script type="text/javascript">
         alert("Record update successfully !");
         window.location.href = '../loginpageCustomer.html';
     </script>
</body>

</html>