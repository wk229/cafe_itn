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
    require("../connect/connect.php");
    ?>
    <?php
    $Menu_id = $_GET["Menu_id"];
    $stock = $_GET["stock"];
    $order_id = $_SESSION['order_id'];
    $price = $_GET["price"];
    $discount_price = $_GET["discount_price"];
    $discount = $_SESSION['discount'];
    $total = $_GET["total"];
    $name_menu = $_GET["name_menu"];
    $cus_id = $_SESSION['cus_id'];
    $promotion_id = $_SESSION['promotion_id'];


    $len = count($_GET["Menu_id"]);
    // // insert to menu_orders
    for ($i = 0; $i < $len; $i++) {
        $sql = "INSERT INTO menu_orders VALUES ('$Menu_id[$i]','$order_id','$stock[$i]')";
        mysqli_query($con, $sql);
    }
    // unset($_SESSION['order_id']);



    // update stock in menu table
    /*fetch data of stock to Subtract */
    $subtract = array();
    for ($i = 0; $i < $len; $i++) {
        $sql = "SELECT stock FROM menus WHERE Menu_id ='$Menu_id[$i]' ";
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        $subtract[$i] = $result['stock'] - $stock[$i];
    }
    for ($i = 0; $i < $len; $i++) {
        $sql = "UPDATE menus SET stock ='$subtract[$i]' WHERE Menu_id = '$Menu_id[$i]' ";
        mysqli_query($con, $sql);
    }
    /*END */

    ?>

    <!-- form for send to Bills -->
    <html>

    <body>
        <h1 size="10000" face="arial" color="red" align="center"  class="container my-4"> Loding go to bill</h1>
        <form name="myForm" id="myForm" action="../Bills/bill.php" method="GET">
            <?php for ($i = 0; $i < $len; $i++) { ?>
                <input type="hidden" value="<?php echo $stock[$i]; ?>" name="stock[]">
                <input type="hidden" value="<?php echo $price[$i]; ?>" name="price[]">
                <input type="hidden" value="<?php echo $name_menu[$i]; ?>" name="name_menu[]">
            <?php } ?>
            <input type="hidden" value="<?php echo $total; ?>" name="total">
            <input type="hidden" value="<?php echo $discount; ?>" name="discount">
            <input type="hidden" value="<?php echo $discount_price; ?>" name="discount_price">

        </form>

        <script>
            var auto_refresh = setInterval(
                function() {
                    submitform();
                }, 2000);

            function submitform() {
                alert('YOUR ORDER IS SENDED');
                document.myForm.submit();
            }
        </script>
        <div class="text-center">
  <div class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>

    </body>

</html>