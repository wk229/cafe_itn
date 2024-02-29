<html>

<head>
</head>

<?php
require("../connect/connect.php");
ini_set('display_errors', 1);
error_reporting(~0);
?>
<?php session_start();
?>
<?php
$cus_id = $_SESSION["cus_id"];
?>

<body>
	<?php
	$promotion_id = $_GET["promotion_id"];

	$sql = "SELECT customers.cus_id , promotion_id FROM getpromotion right join customers 
on customers.cus_id = getpromotion.cus_id
where  getpromotion.cus_id='$cus_id' and promotion_id='$promotion_id';";
	$result = $con->query($sql);

	if ($result) {
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) { ?>
				<script type="text/javascript">
					alert("Already Taken!!");
					window.location.href = 'keepPro.php';
				</script>
	<?php	}
		} else {
			$qq = "INSERT INTO getpromotion VALUES ('$promotion_id','$cus_id')";
			mysqli_query($con, $qq);

			$uu = "UPDATE promotions SET stock = stock-1 where promotion_id='$promotion_id'";
			mysqli_query($con, $uu);?>
			<script type="text/javascript">
					alert("Get sucessful!!");
					window.location.href = 'keepPro.php';
				</script>
	<?php	}
	} else {
		echo "<br> Database error.";
	}

	?>
</body>

</html>
<?php
mysqli_close($con);
?>