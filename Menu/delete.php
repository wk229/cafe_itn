<html>
<head>
<title>ThaiCreate.Com PHP & MySQL (mysqli)</title>
</head>
<body>
<?php
	require("../connect/connect.php");

	$strCustomerID = $_GET["Menu_id"];
	$sql = "DELETE FROM menus
			WHERE Menu_id = '".$strCustomerID."' ";

	$query = mysqli_query($con,$sql);

	if(mysqli_affected_rows($con)) {
		 echo "Record delete successfully";
	}

	mysqli_close($con);
	
?>
<script type="text/javascript">
         alert("Record delete successfully !");
         window.location.href = 'MenuList.php';
     </script>
</body>
</html>