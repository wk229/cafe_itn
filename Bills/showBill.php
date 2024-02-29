<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);
?>
<?php 
$name_menu = $_GET['name_menu'];
$stock = $_GET['stock'];
$price = $_GET['price'];
$total = $_GET['total'];
$discount=$_SESSION['discount'];
$discount_price=$_GET['discount_price'];
$all_stock = $_GET['all_stock'];
$today = $_GET['today'];
$date = $_GET['date'];
$bill_id=$_GET['bill_id'];
$cus_id = $_SESSION['cus_id'];
$promotion_id=$_SESSION['promotion_id'];

$len = count($name_menu);
?>
<!-- For display about data of bills -->
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
</head>

<body>
    <h4 align="right">ID CUSTOMER <?php echo $cus_id; ?></h4>
    <h1 align="center"> YOUR ORDER </h1>
    <h3 align="center"> BILL <?php echo $bill_id ?> </h3>
    <h4 align="center">DATE: <?php echo $today ?>  TIME:<?php echo $date ?> </h4>
    <table align="center" border="3">
        <thead>
            <tr>
                <td>MENU LIST</td>
                <td>AMOUNT</td>
                <td>CHAGE</td>
            </tr>
        </thead>
        <tbody align="center" >
            <tr>
                <?php for ($i = 0; $i < $len; $i++) { ?>
                    <td><?php echo $name_menu[$i] ?> </td>
                    <td><?php echo $stock[$i] ?> </td>
                    <td><?php echo $price[$i] ?> </td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td align="center">discount </td>
                <td align="center"><?php if($discount==0){
                     echo "NONE" ;
                 }
                 else {
                     echo $discount ;
                 }?></td>               
                <td align="center" colspan="3"><?php echo $discount_price ?></td>
            </tr>
        </tfoot>
        <tfoot>
            <tr>
                <td align="center">total</td>
                <td align="center"><?php echo $all_stock ?></td>
                <td align="center" colspan="3"><?php echo $total ?></td>
            </tr>
        </tfoot>
       <?php $_SESSION['discount']=0;
                       
       ?>
    
    </table><br><br>
    <center><a href="../Menu/buymenus.php"><button type="button" class="btn btn-primary">GO TO BUY MORE </button></a><br><br>
    <center><a href="../indexforCustomer.html"><button type="button" class="btn btn-success">MAIN PAGE</button></a>
    
</body>
</html>



