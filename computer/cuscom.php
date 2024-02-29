<html>
<body>
<?php
	require("../connect/connect.php");
	ini_set('display_errors', 1);
	error_reporting(~0);
	$Computer_id=$_GET['Computer_id'];
	$uu = "UPDATE computers SET status = 1 where Computer_id='$Computer_id'";
    mysqli_query($con, $uu);
?>
<h1><div align="center"><h1 style="color:red;font-size:40px;">Welcome to the jungle<h1>
<h1><div align="center"><h1 style="color:red;font-size:30px;">We got fun and game!<h1>
<iframe width="320" height="180"
src="https://www.youtube.com/embed/0CNPR2qNzxk?autoplay=1?">
<frameborder="0" allowfullscreen></iframe><div align="center">
<br>
    <a href="../indexforCustomer.html"><h1 style="color:red;font-size:20px;">Home</h1></a></iframe><div align="center">
	<?php mysqli_close($con);?>
</body>
</html>