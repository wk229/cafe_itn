<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>MenuList</title>
  </head>
  <body>
  <?php
  ini_set('display_errors', 1);
  error_reporting(~0);

  require("../connect/connect.php");

  $sql = "SELECT * FROM Menus";

  $query = mysqli_query($con, $sql);

  ?>
  <table class="table table-hover table-striped  table-bordered table-sm"> 
  <thead class = "table-primary">
    <tr align="center">
      <th width="50">
        <div>Picture</div>
      </th>
      <th width="91">
        <div>Menu_id </div>
      </th>
      <th width="98">
        <div>Menu_name </div>
      </th>
      <th width="198">
        <div>stock </div>
      </th>
      <th width="97">
        <div>price </div>
      </th>
      <th width="50">
        <div>EDIT</div>
      </th>
    </tr>
  </thead>
    <?php while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
      <tr align="center">
        <td>
          <img src="upload/<?php if (isset($result["image"])) { echo $result["image"];} ?>" width="50px" height="50px">
        </td>
        <td>
          <div><?php echo $result["Menu_id"]; ?></div>
        </td>
        <td><?php echo $result["Menu_name"]; ?></td>
        <td><?php echo $result["stock"]; ?></td>
        <td>
          <div><?php echo $result["price"]; ?></div>
        </td>
        <td><a href="JavaScript:if(confirm('Confirm Update?')==true){window.location='updatemenu.php?Menu_id=<?php echo $result["Menu_id"]; ?>';}"> 
        <button type="button" class="btn btn-success">Update</button></a>
        <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='delete.php?Menu_id=<?php echo $result["Menu_id"]; ?>';}">
        <button type="button" class="btn btn-danger">Delete</button></a></td>
      </tr>
    <?php
    }
    ?>
  </table>
  <?php
  mysqli_close($con);
  ?>
    <div align="center">
   <a href="../indexforEmployee.html"><button type="button" class="btn btn-secondary">Back</button></a></div>
</body>

</html>