<html>
<head>
<title>Delete emp</title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	require("../connect/connect.php");

	$emp_id = $_GET["emp_id"];
	$sql = "DELETE FROM employees
			WHERE emp_id = '".$emp_id."' ";

	$query = mysqli_query($con,$sql);

	if(mysqli_affected_rows($con)) {
		 echo "Record delete successfully";
	}

	mysqli_close($con);
?>
</body>
</html>
<body>
<script type="text/javascript">
         alert("Record delete successfully !");
         window.location.href = 'empList.php';
     </script>
</body>

</html>
</body>
</html>