 
<?php
require("../connect/connect.php");
$Computer_id = $_POST["Computer_id"];
$brand_computer = $_POST["brand_computer"];
$internetcafe_id = $_POST["internetcafe_id"];
$status = $_POST["status"];  
    $sql = "UPDATE computers SET brand_computer = '$brand_computer',internetcafe_id = '$internetcafe_id',status = b'$status'
    WHERE  Computer_id = '$Computer_id'";
    mysqli_query($con, $sql);

?>
   
<html lang="en">
<body>
    <br>
    <!-- <h2>Update Computer Form</h2> -->
    <script type="text/javascript">
         alert("Record update successfully !");
         window.location.href = 'ComList.php';
     </script>
</body>
</html>
