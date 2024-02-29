 
<?php
require("../connect/connect.php");

$promotion_id = $_POST["promotion_id"];
$discount = $_POST["discount"];
$end_date = $_POST["end_date"];
$promotion_name = $_POST["promotion_name"];
$start_date = $_POST["start_date"];
$detail = $_POST["detail"];
$stock = $_POST["stock"];
if($promotion_id!=''){
	$sql= "SELECT * FROM promotions WHERE promotion_id = '".$promotion_id."'";
	$result = $con->query($sql);
	$row=$result->fetch_assoc();
}

    $sql = "UPDATE promotions SET promotion_name = '$promotion_name',discount = '$discount',
    detail = '$detail',start_date = '$start_date',end_date = '$end_date',stock = '$stock'
    WHERE  promotion_id = '$promotion_id'";
    mysqli_query($con, $sql);
?>
   
<html lang="en">
<body>
    <br>
    <script type="text/javascript">
         alert("Record update successfully !");
         window.location.href = 'promotionList.php';
     </script>
</body>
</html>
