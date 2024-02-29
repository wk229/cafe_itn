<!DOCTYPE html>
<html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
require("../connect/connect.php");
include("GenarateIDPC.php");
?>
<body>
<div align = "center">
  <h2>Computer Form</h2>
  <form method="post" action="addcom.php">
    <!-- create key to db computer  -->
  <input type="hidden" name="Computer_id" value="<?php echo $Computer_id; ?>">
    brand_computer: <input type="text" name="brand_computer">
    <br><br>
    internetcafe_id: <input type="text" name="internetcafe_id">
    <br><br>
    Status:
    <input type="radio" name="status" value="0">available
    <input type="radio" name="status" value="1">unavailable
    <br><br>
    <input type="submit"  value="Submit"> <a href="../indexforEmployee.html"><input type="button" value="Back"></a> 
</div>
  </form>
</body>

