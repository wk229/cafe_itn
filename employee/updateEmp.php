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
isset($_GET['emp_id']) ?$emp_id = $_GET['emp_id']:$emp_id ='';
if($emp_id!=''){
	$sql= "SELECT * FROM employees WHERE emp_id = '".$emp_id."'";
	$result = $con->query($sql);
	$row=$result->fetch_assoc();
}
?>
<div align ="center">
  <h2>Update Employee Form</h2>
  <form method="POST" action="updateEmpDB.php">

	 <input type="hidden" name="emp_id" value="<?php echo $row['emp_id'];  ?>">

    First_name: <input type="text" name="First_name" value="<?php echo $row['First_name'];  ?>">
    <br><br>
    Last_name: <input type="text" name="Last_name" value="<?php echo $row['Last_name'];  ?>">
    <br><br>
    Address: <input type="text" name="Address" value="<?php echo $row['Address'];  ?>">
    <br><br>
    Role: <input type="text" name="Role" value="<?php echo $row['Role'];  ?>">
    <br><br>
    gender: <input type="text" name="gender" value="<?php echo $row['gender'];  ?>">
    <br><br>
    salary: <input type="text" name="salary" value="<?php echo $row['salary'];  ?>">
    <br><br>
    hours: <input type="text" name="hours" value="<?php echo $row['hours'];  ?>">
    <br><br>
    age: <input type="text" name="age" value="<?php echo $row['age'];  ?>">
    <br><br>
    phone: <input type="text" name="phone" value="<?php echo $row['phone'];  ?>">
    <br><br>
    users: <input type="text" name="users" value="<?php echo $row['users'];  ?>">
    <br><br>
    passwords: <input type="password" name="passwords" value="<?php echo $row['passwords'];  ?>">
    <br><br>
    internetcafe_id: <input type="number" name="internetcafe_id" value="<?php echo $row['internetcafe_id'];  ?>">
    <br><br>
    <input type="submit"  value="UPDATE">

  </form><br>
  <form method="post" action="../indexforEmployee.html">
  <input type="submit" value="Back">
  </form>
</div>
</body>
</html>

