<html>
<head>
<title>DELETE Customer</title>
</head>
<body>
</body>
</html>
<html>
<head>

</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);
	require("../connect/connect.php");
	
	isset( $_GET["cus_id"] ) ? $cus_id = $_GET["cus_id"] : $cus_id = "";
	
	$sql = "DELETE FROM customers
			WHERE cus_id = '".$cus_id."' ";

	$query = mysqli_query($con,$sql);

	if(mysqli_affected_rows($con)) {
		 echo "Record delete successfully";
	}
	mysqli_close($con);
?>
</body>
</html>
<html lang="en">
<body>
    <script type="text/javascript">
         alert("Record delete successfully !");
         window.location.href = 'cusList.php';
     </script>

</body>
</html>