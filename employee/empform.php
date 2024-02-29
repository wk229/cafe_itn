<!DOCTYPE html>
<html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php include("GenarateID.php"); ?>
<body>
<div align = "center">
  <h2>Employees Form</h2>
  <form method="post" action="addEmpDB.php">
    <!-- create key to db employee -->
    <input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">
    First_name: <input type="text" name="First_name">
    <br><br>
    Last_name: <input type="text" name="Last_name">
    <br><br>
    Address: <textarea name="Address" rows="3" cols="45">Your Address</textarea>
    <br><br>
    Role: <input type="text" name="Role">
    <br><br>
    Gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <br><br>
    salary: <input type="text" name="salary">
    <br><br>
    hours: <input type="text" name="hours">
    <br><br>
    age: <input type="text" name="age">
    <br><br>
    phone: <input type="text" name="phone">
    <br><br>
    User: <input type="text" name="users">
    <br><br>
    Password: <input type="text" name="passwords">
    <br><br>
    internetccafe_id: <input type="text" name="internetcafe_id">
    <br><br>
    <input type="submit" value="Add Employee">
  </form>
  <br>
  <form method="post" action="../indexforEmployee.html">
    <input type="submit" value="Back">
  </form>
</div>
</body>

</html>