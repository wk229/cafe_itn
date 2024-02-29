<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Menu</title>
    <link rel="stylesheet" href="">
  </head>
  <body>
<?php
require("../connect/connect.php");
session_start();
?>
<?php
$sql = "SELECT * FROM MENUS ";
$result = mysqli_query($con, $sql);
$cus_id=$_SESSION["cus_id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food pan line grab</title>

</head>

<body background="https://ww2.kqed.org/app/uploads/sites/2/2016/06/SnowWhite1920.gif">
    <br><br><br>
<div align="center">
    <form action="BAG.php" method="POST"  >
        <table style="background-color : white;" class ="table-bordered" cellpadding="10" border="5"">
            <thead class=>
                <tr class=>
                <th>ภาพสินค้า</th>
                <th>ชื่อ</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th colspan="2">ดำเนินการ</th>
                </tr>
            </thead>
        <tbody class=>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><img src="upload/<?php if (isset($row['image'])) {echo $row['image'];} ?>" width="50px" height="50px"></td>
                    <td><?php if (isset($row['Menu_name'])) {echo $row['Menu_name'];} ?></td>
                    <td><?php if (isset($row['price'])) {echo $row['price'];} ?></td>
                    <td><?php if (isset($row['stock'])) {echo $row['stock'];} ?></td>
                    <!-- check table menu have stock -->
                    <?php ?>
                    <td>เพิ่มลงตะกร้า<input type="number" name="amount[]" min="0" max="10" value="0"  >
                    <input type="hidden" value='<?php echo $row['Menu_id'];?>' name="Menu_id[]" >
                    <input type="hidden" value='<?php echo $row['price'];?>' name="price[]" >
                    <input type="hidden" value='<?php echo $row['Menu_name'];?>' name="name_menu[]" >
                    <input type="hidden" value='<?php echo $row['stock'];?>' name="stock[]" ></td>
                    <?php } ?>
                </tr>
            </tbody>
            <tfoot  class="table-primary">
                <tr>
                    <td colspan="1"><button type="Submit" class="btn btn-success">ยืนยัน</button>
                    <span><button type="reset" class="btn btn-danger">RESET</button><span>
                    </td>
                    
                </tr>
        </tfoot>
        </table>
    </form><br>
    <a href="../indexforCustomer.html"><button type="button" class="btn btn-warning">Home Page</button></a></div>
        
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