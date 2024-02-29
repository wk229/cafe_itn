<?php
require("../connect/connect.php");
$sql = "SELECT bill_id FROM bills ORDER BY bill_id ASC";  //fetch to create a key by order ASC 
$query = mysqli_query($con, $sql);
$pr_id = sprintf("%03d", mysqli_num_rows($query));
$bill_id =  "B" . $pr_id;
$keep_last = $bill_id;
$num = mysqli_num_rows($query);
$keep = array();

//check B000
/*กรณี ลบ ตัวแรก จะต้องเป็น 0 แล้วจะสร้าง 0 ใหม่*/
while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    array_push($keep, $result['bill_id']);
}
print_r($keep);
$not_B_zero = false;
for ($i = 0; $i < count($keep); $i++) {
    if ("B000" != $keep[$i]) {
        $bill_id = "B000"; // warning
        // $sql = "INSERT INTO bills VALUES ('B000','$cus_id','$today','$all_stock','$discount_price')";
        // mysqli_query($con, $sql);
        echo $bill_id;
        $not_B_zero = true;
        break;
    } else {
        $not_B_zero = false;
        break;
    }
}

// create key new not duplicate
if ($not_B_zero == false) { // 

    $fill_num = 0;
    $boo_keep_last = false;
    $sql = "SELECT bill_id FROM bills";
    $result = mysqli_query($con, $sql);
    $pr_id = sprintf("%03d", mysqli_num_rows($result));
    $bill_id =  "B" . $pr_id;
    if ($bill_id == "B001") {  //ไม่รู้จะอธิบายยังไง เอาเป็นว่าถ้าไม่มี มีปัญหาแน่นอน 
      echo $bill_id;
        // $sql = "INSERT INTO bills VALUES ('B001','$cus_id','$today','$all_stock','$discount_price')";
        // mysqli_query($con, $sql);
    } else {
        for ($i = 0; $i < count($keep) - 1; $i++) {
            $num_1 = substr($keep[$i], 1);
            $num_2 = substr($keep[$i + 1], 1);
            $num_1 += 1;
            if ($num_1 == $num_2) { // ถ้า ตำแหน่ง1 ตรงแหน่ง2 ข้าม
                $boo_keep_last = true;
            } else {  // ถ้า ตำแหน่ง1 ไม่ตรงตรงแหน่ง2 หมายถึง มีตัวแรก ไม่เรียงกันระหว่าง 4....6 = 5หายไป เป็นต้น 
                $fill_num = $num_2 - 1;
                $boo_keep_last = false;
                break;
            }
        }
        if ($boo_keep_last == false) {  //ใช้เพื่อเพิ่มตำแหน่งระหว่าง 1 to (N-1) ตัวที่หายไป
            $pr_id = sprintf("%03d", $fill_num);
            $bill_id =  "B" . $pr_id;
            echo $bill_id;
            // $sql = "INSERT INTO bills VALUES ('$bill_id','$cus_id','$today','$all_stock','$discount_price')";
            // mysqli_query($con, $sql);
        } else {
            // echo $bill_id; // ใช้เพื่อหาตำแหน่ง N ตัวล่าสุด
            // $sql = "INSERT INTO bills VALUES ('$bill_id','$cus_id','$today','$all_stock','$discount_price')";
            // mysqli_query($con, $sql);
            echo $bill_id;
        }
    }
}
// echo $bill_id;
?>
