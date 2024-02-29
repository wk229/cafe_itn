<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Basket</title>
    <link rel="stylesheet" href="">
  </head>
  <body>
<?php
session_start();
require("../connect/connect.php");
// ตัวแปรสำหรับการนำไปใช้งาน
$Menu_id = $_POST["Menu_id"];
$stock = $_POST["amount"];
$price = $_POST["price"];
$name_menu = $_POST["name_menu"];
$cus_id = $_SESSION["cus_id"];
?>
<!-- check no select -->
<?php
$select_zero = 0;
for ($i = 0; $i < count($stock); $i++) {
    $select_zero += $stock[$i];
}
if ($select_zero == 0) { ?>
    <script type="text/javascript">
        alert("SELECT BEFORE !!!");
        window.location.href = 'buymenus.php';
    </script>
<?php } ?>
<!-- check no select limit  -->

<?php
$len = count($Menu_id);
for ($i = 0; $i < $len; $i++) {
    $sql = "SELECT stock FROM menus WHERE Menu_id ='$Menu_id[$i]' ";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if ($stock[$i] > $result['stock']) { ?>
        <script type="text/javascript">
            alert("SELECT over limit !!!");
            window.location.href = 'buymenus.php';
        </script>
<?php
    }
}
?>
<?php //หาจำนวนรายการอาหารแต่ละอย่าง
$length = count($_POST["amount"]);
$sum = 0;
$keepindex = array();
for ($i = 0; $i < $length; $i++) {
    if ((int)$stock[$i] != 0) {
        $sum = $i;
        $keepindex[$i] = true; //เก็บ index สำหรับค้นหารายการที่มีการสั่งซื้อ
    } else {
        $keepindex[$i] = false;
    }
}
//ราคาเมนูทั้งหมด
$cost = array();
for ($i = 0; $i < $length; $i++) {

    $cost[$i] = (int)$stock[$i] * (int)$price[$i];
}
/*test any error*/

// echo $sum."จำนวนที่จะวนรอบ";
// print_r($keepindex);

/*end */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>basket</title>
</head>

<body background="https://ww2.kqed.org/app/uploads/sites/2/2016/06/SnowWhite1920.gif">
<br><br><br>
    <h3 align="center"><p class="text-white">YOUR BASKET</p></h3>
    <table style="background-color : white;"  class="table-bordered" border="3" align="center">
        <thead >
            <tr>
                <td >รายการ</td>
                <td>จำนวน</td>
                <td>ราคา</td>
                <td>ราคารวม</td>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0;
            for ($i = 0; $i <= $sum; $i++) { ?>
                <tr>
                    <?php if ($keepindex[$i] == true) { ?>
                        <td align="center"><?php echo $name_menu[$i] ?></td>
                        <td align="center"><?php echo $stock[$i] ?></td>
                        <td align="center"><?php echo $price[$i] ?></td>
                        <td align="center"><?php echo $cost[$i];
                                            $total += $cost[$i]; ?></td>
                    <?php } ?>
                </tr>
        </tbody>
    <?php } ?>
    <tfoot>
        <tr>
            <td colspan="3">ราคารวมทั้งหมด</td>
            <td align="center"><?php echo $total ?></td>
        </tr>
    </tfoot>
    </table>
    <!-- send data to DB Order-->
    <form method="GET" action="../Order/addorder.php">
        <?php for ($i = 0; $i <= $sum; $i++) { ?>
            <?php if ($keepindex[$i] == true) { ?>
                <input type="hidden" value="<?php echo $Menu_id[$i]; ?>" name="Menu_id[]">
                <input type="hidden" value="<?php echo $stock[$i]; ?>" name="stock[]">
                <input type="hidden" value="<?php echo $name_menu[$i]; ?>" name="name_menu[]">
                <input type="hidden" value="<?php echo $price[$i]; ?>" name="price[]">
            <?php } ?>
        <?php } ?>

        <center><p class="text-white">Select Promotion:<br>
            <select name="lmName1">
                <option value=0><-- Please Select Item -->
                </option>
                <?php
                $strSQL = "SELECT getpromotion.promotion_id,promotions.promotion_name,discount FROM getpromotion 
            join promotions
            on getpromotion.promotion_id=promotions.promotion_id
            where getpromotion.cus_id='$cus_id'
            ORDER BY getpromotion.promotion_id ASC";
                $objQuery = mysqli_query($con, $strSQL);
                while ($objResuut = mysqli_fetch_array($objQuery)) {
                ?>
                    <option value="<?php echo $objResuut["discount"]; ?>"><?php echo $objResuut["promotion_id"] . " - " . $objResuut["promotion_name"] . "- Discount " . $objResuut["discount"] . "%"; ?></option>
                <?php
                    $promotion_id = $objResuut["promotion_id"];
                    $_SESSION['promotion_id'] = $promotion_id;
                }

                ?>
            </select>
            <option value="discount"></option>
            <center><input type="hidden" value="<?php echo $discount; ?>" name="discount">
                <center><input type="hidden" value="<?php echo $total; ?>" name="total">
                <button type="Submit" class="btn btn-success">ยืนยัน</button>

    </form>


    <!-- operator for process -->
    <intput type="button" onclick="history.back()" class="btn btn-danger">แก้ไขรายการ</intput>


<?php
//echo $total ;
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