<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CusList</title>
  </head>
  <body>
  <?php
  ini_set('display_errors', 1);
  error_reporting(~0);

  require("../connect/connect.php");

  $sql = "SELECT * FROM customers";

  $query = mysqli_query($con, $sql);

  ?>
  <table class="table table-hover table-striped  table-bordered table-sm" border="1"> 
    <tfoot>
  <thead class = "table-primary">
      <th width="91">
        <div align="center">cus_id</div>
      </th>
      <th width="98">
        <div align="center">First_name</div>
      </th>
      <th width="98">
        <div align="center">Last_name </div>
      </th>
      <th width="98">
        <div align="center">age</div>
      </th>
      <th width="98">
        <div align="center">gender</div>
      </th>
      <th width="98">
        <div align="center">phone</div>
      </th>
      <th width="98">
        <div align="center">Address</div>
      </th>
      <th width="98">
        <div align="center">internetcafe_id</div>
      </th>
      <th width="91">
        <div align="center">users</div>
      </th>
      <th width="91">
        <div align="center">passwords</div>
      </th>
      <th width="50">
        <div align="center">Edit </div>
      </th>
</tfoot>
  </thead>
    <?php
    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    ?>
      <tr>
        <td>
          <div align="center"><?php echo $result["cus_id"]; ?></div>
        </td>
        <td><?php echo $result["First_name"]; ?></td>
        <td><?php echo $result["Last_name"]; ?></td>
        <td><?php echo $result["age"]; ?></td>
        <td><?php echo $result["gender"]; ?></td>
        <td><?php echo $result["phone"]; ?></td>
        <td><?php echo $result["Address"]; ?></td>
        <td><?php echo $result["internetcafe_id"]; ?></td>
        <td><?php echo $result["users"]; ?></td>
        <td><?php echo $result["passwords"]; ?></td>
        <td align="center"><a href="JavaScript:if(confirm('Confirm Update?')==true){window.location='updateCus.php?cus_id=<?php echo $result["cus_id"]; ?>';}">
          <button type="button" class="btn btn-success">Update</button></a>
          <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='deleteCus.php?cus_id=<?php echo $result["cus_id"]; ?>';}">
        <button type="button" class="btn btn-danger">Delete</button></a>
          
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
  <div align="center">
   <a href="../indexforEmployee.html"><button type="button" class="btn btn-secondary">Back</button></a> </div>
  <?php
  mysqli_close($con);
  ?>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>