<html>
<head>
<title>ThaiCreate.Com PHP & MySQL (mysqli)</title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	require("../connect/connect.php");

	$promotion_id = $_GET["promotion_id"];
	$sql = "DELETE FROM promotions
			WHERE promotion_id = '".$promotion_id."' ";

	$query = mysqli_query($con,$sql);

	if(mysqli_affected_rows($con)) {
		 echo "Record delete successfully";
	}

	mysqli_close($con);
?>
<script type="text/javascript">
         alert("Record delete successfully !");
         window.location.href = 'promotionList.php';
     </script>
</body>
</html>