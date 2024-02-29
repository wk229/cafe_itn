<?php
session_start()
?>
<?php
//for get DATA from Menuorder file
$name_menu = $_GET['name_menu'];
$stock = $_GET['stock'];
$price = $_GET['price'];
$total = $_GET['total'];
$discount=$_SESSION['discount'];
$discount_price=$_GET['discount_price'];
$len = count($_GET['name_menu']);
$cus_id = $_SESSION['cus_id'];
$promotion_id=$_SESSION['promotion_id'];

$all_stock = 0;
for ($i = 0; $i < $len; ++$i) {
    $all_stock += (int)$stock[$i];
}
?>

<?php
require("../connect/connect.php");
?>

<!-- DATE/TIME -->
<?php
$today = date("Y-m-d"); //get date now
date_default_timezone_set('asia/bangkok');
$date = date('H:i:s');
$cus_id = $_SESSION["cus_id"];  // get a user
?>

<!-- check key don't duplicate with data of table and insert data to Bills table -->
<?php include("insert_bill.php") ?>


<?php 
$oo = "DELETE getpromotion FROM getpromotion 
right join customers 
on customers.cus_id = getpromotion.cus_id
where  getpromotion.cus_id='".$cus_id."' and getpromotion.promotion_id='".$promotion_id."'";
mysqli_query($con, $oo);
?>

<!-- send form to showBill -->

<form action="showBill.php" method="GET" id="form1">
    <?php for ($i = 0; $i < $len; ++$i) { ?>
        <input type="hidden" value="<?php echo $name_menu[$i] ?>" name="name_menu[]">
        <input type="hidden" value="<?php echo $stock[$i] ?>" name="stock[]">
        <input type="hidden" value="<?php echo $price[$i] * $stock[$i] ?>" name="price[]">
    <?php } ?>
    <input type="hidden" value="<?php echo $today ?>" name="today">
    <input type="hidden" value="<?php echo $date ?>" name="date">
    <input type="hidden" value="<?php echo $bill_id ?>" name="bill_id">
    <input type="hidden" value="<?php echo $cus_id ?>" name="cus_id">
    <input type="hidden" value="<?php echo $total ?>" name="total">
    <input type="hidden" value="<?php echo $discount ?>" name="discount">
    <input type="hidden" value="<?php echo $discount_price ?>" name="discount_price">
    <input type="hidden" value="<?php echo $all_stock ?>" name="all_stock">
</form>
<script type="text/javascript">
    function formAutoSubmit() {
        var frm = document.getElementById("form1");
        frm.submit();
    }
    window.onload = formAutoSubmit;
</script>


<?php
mysqli_close($con);
?>