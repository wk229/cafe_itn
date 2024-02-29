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
$cus_id = isset($_GET['cus_id']) ? $_GET['cus_id']:'';

if($cus_id!=''){
	$sql= "SELECT * FROM customers WHERE cus_id = '".$cus_id."'";
	$result = $con->query($sql);
	$row=$result->fetch_assoc();
}
?>
<div align = "center">
  <h2>Update Customers Form</h2>
  <form method="post" action="upCus.php">
<?php if($cus_id != ''){?>
	<input type="hidden" name="cus_id" value="<?php echo $row['cus_id'];?>">
<?php } ?>
    First_name: <input type="text" name="First_name" value="<?php echo $row['First_name'];  ?>">
    <br><br>
    Last_name: <input type="text" name="Last_name" value="<?php echo $row['Last_name'];  ?>">
    <br><br>
    
    age: <input type="Address" name="age" value="<?php echo $row['age'];  ?>">
    <br><br>
    Gender: <input type="radio" name="gender" value="female">Female
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="other">Other
                    <br><br>
    phone: <input type="text" name="phone" value="<?php echo $row['phone'];  ?>">
    <br><br>
    Address: <input type="text" name="Address" value="<?php echo $row['Address'];  ?>">
    <br><br>
    internetcafe_id: <input type="text" name="internetcafe_id" value="<?php echo $row['internetcafe_id'];  ?>">
    <br><br>
    users: <input type="text" name="users" value="<?php echo $row['users'];  ?>">
    <br><br>
    passwords: <input type="text" name="passwords" value="<?php echo $row['passwords'];  ?>">
    <br><br>
    <input type="submit"  value="UPDATE"> 

  </form>
</div>
</body>

</html>