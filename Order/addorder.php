<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Order</title>
    <link rel="stylesheet" href="">
  </head>

  <body>
      <br><br>
<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);

?>
<?php
require("../connect/connect.php");
//$discount=$_GET['discount'];
//prepare data for database
$detail = implode(",", $_GET['name_menu']);
$cus_id = $_SESSION['cus_id'];
$promotion_id=$_SESSION['promotion_id'];



// function for gen key => orders
function generateRandomString($length = 3)
{
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// echo $cus_id . " row = ";

//fetch data
$sql = "SELECT order_id FROM orders";
$result = mysqli_query($con, $sql);

// echo mysqli_num_rows($result) . "<br>";
?>

<?php
//check if orders empty insert now
$order_id = "";
if (mysqli_num_rows($result) == 0) {
    $order_id = "O" . generateRandomString();
    $sql = "INSERT INTO orders (order_id,detail,cus_id) VALUES ('$order_id','$detail','$cus_id');";
    mysqli_query($con, $sql);
    $_SESSION['order_id'] = $order_id;
} else {
    // Loop find key not duplicate
    $str = "";
    $order_id = "";
    $stop = false;
    while (true) {

        if ($stop == true && $order_id != $str) {
            break;
        }
        $order_id = "O" . generateRandomString();
        $_SESSION['order_id'] = $order_id;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($order_id == $row["order_id"]) {
                $str = $row["order_id"];
                $stop = false;
                break;
            } else {
                $stop = true;
            }
        }
    }
    $sql = "INSERT INTO orders (order_id,detail,cus_id) VALUES ('$order_id','$detail','$cus_id');";
    mysqli_query($con, $sql);
}
?>
<?php

$Menu_id = $_GET["Menu_id"];
$stock = $_GET["stock"];
$price = $_GET["price"];
$total = $_GET["total"];
$discount = $_GET['lmName1'];
$_SESSION['discount'] = $discount;
$percen = $discount / 100.00;
$total_per = $total * $percen;
$discount_price = $total - $total_per;
$name_menu = $_GET["name_menu"];

$sum = count($stock);
$all_stock = 0;
for ($i = 0; $i < $sum; ++$i) {
    $all_stock += (int)$stock[$i];
}
?>

<body background="https://ww2.kqed.org/app/uploads/sites/2/2016/06/SnowWhite1920.gif">

    <h3 align="center"><p class="text-white">ORDER ID <?php echo $order_id ?></p></h3>
    <form name="myForm" id="myForm" action="../Menuorder/menuorder.php" method="GET">
   
        <?php for ($i = 0; $i < $sum; $i++) { ?>
            <input type="hidden" value="<?php echo $Menu_id[$i]; ?>" name="Menu_id[]">
            <input type="hidden" value="<?php echo $stock[$i]; ?>" name="stock[]">
            <input type="hidden" value="<?php echo $price[$i]; ?>" name="price[]">
            <input type="hidden" value="<?php echo $name_menu[$i]; ?>" name="name_menu[]">
        <?php } ?>
        <input type="hidden" value="<?php echo $total; ?>" name="total">
        <input type="hidden" value="<?php echo $discount; ?>" name="discount">
        <input type="hidden" value="<?php echo $discount_price; ?>" name="discount_price">
        <table style="background-color : white;" class=" table-bordered table-sm" align="center" border="2" cellpadding="10">
     
            <thead>
                <tr >
                    <td>MENU LIST</td>
                    <td>AMOUNT</td>
                    <td>CHAGE</td>
                </tr>
            </thead>
            <tbody align="center">
                <tr>
                    <?php for ($i = 0; $i < $sum; $i++) { ?>
                        <td><?php echo $name_menu[$i] ?> </td>
                        <td><?php echo $stock[$i] ?> </td>
                        <td><?php echo $price[$i] ?> </td>
                </tr>
            <?php } ?>
            </tbody>

            <tfoot>
                <tr>
                    <td align="center">after discount</td>
                    <td align="center"><?php if ($discount == 0) {
                                            echo "NONE";
                                        } else {
                                            echo $discount;
                                        } ?></td>
                    <td align="center"><?php echo $discount_price ?></td>
                    <td rowspan="4"><button type="Submit" class="btn btn-success">Submit</button></td>
                </tr>
            </tfoot>

            <tfoot>
                <tr>
                    <td align="center">total</td>
                    <td align="center"><?php echo $all_stock ?></td>
                    <td align="center"><?php echo $total ?></td>

                </tr>
            </tfoot>

                                

    </form>
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