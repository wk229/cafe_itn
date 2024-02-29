<html>

<head>
	<title>ThaiCreate.Com PHP & MySQL (mysqli)</title>
</head>

<body>
	<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	require("../connect/connect.php");

	$strCustomerID = $_GET["Computer_id"];
	$sql = "DELETE FROM computers
			WHERE Computer_id = '" . $strCustomerID . "' ";

	$query = mysqli_query($con, $sql);

	if (mysqli_affected_rows($con)) {
		echo "Record delete successfully";
	}

	mysqli_close($con);
	?>
	<script type="text/javascript">
         alert("Record delete successfully !");
         window.location.href = 'ComList.php';
     </script>
</body>

</html>