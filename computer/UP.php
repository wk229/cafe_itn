<!DOCTYPE html>
<html>
<body>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php	
require("../connect/connect.php");
$Computer_id = isset($_GET['Computer_id']) ? $_GET['Computer_id']:'';

if($Computer_id!=''){
	$sql= "SELECT * FROM computers WHERE Computer_id = '".$Computer_id."'";
	$result = $con->query($sql);
	$row=$result->fetch_assoc();
}
?>
<div align = "center">
  <h2>Update Computer</h2>
  <form method="post" action="upcom.php">
<?php if($Computer_id != ''){?>
	<input type="hidden" name="Computer_id" value="<?php echo $row['Computer_id'];?>">
<?php } ?>

    <!-- Computer_id: <input type="text" name="Computer_id" value="<?php echo $row['Computer_id'];  ?>">
    <br><br> -->
    brand_computer: <input type="text" name="brand_computer" value="<?php echo $row['brand_computer'];  ?>">
    <br><br>
    internetcafe_id: <input type="text" name="internetcafe_id" value="<?php echo $row['internetcafe_id'];  ?>">
    <br><br>
    Status:
    <input type="radio" name="status" value="0">available
    <input type="radio" name="status" value="1">unavailable
    <?php $status=$row['status'];?>
    <br><br>
    <input type="submit"  value="UPDATE">
</div>
  </form>

</body>

</html>