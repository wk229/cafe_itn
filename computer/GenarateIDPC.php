<?php
require("../connect/connect.php");
$sql = "SELECT Computer_id  FROM computers ORDER BY Computer_id ASC";  //fetch to create a key by order ASC 
$query = mysqli_query($con, $sql);
$pr_id = sprintf("%03d", mysqli_num_rows($query));
$Computer_id =  "PC" . $pr_id;

$keep_last = $Computer_id;
// $num = mysqli_num_rows($query);
$keep = array();

//check B000
/*กรณี ลบ ตัวแรก จะต้องเป็น 0 แล้วจะสร้าง 0 ใหม่*/
while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    array_push($keep, $result['Computer_id']);
}
// print_r($keep);
$not_B_zero = false;
for ($i = 0; $i < count($keep); $i++) {
    if ("PC000" != $keep[$i]) {
        $Computer_id = "PC000"; // warning
        $not_B_zero = true;
        // echo $Computer_id;
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
    $sql = "SELECT Computer_id  FROM computers ORDER BY Computer_id ASC";  //fetch to create a key by order ASC 
    $result = mysqli_query($con, $sql);
    $pr_id = sprintf("%03d", mysqli_num_rows($result));
    $Computer_id =  "PC" . $pr_id;
    if ($Computer_id == "PC001") {  //ไม่รู้จะอธิบายยังไง เอาเป็นว่าถ้าไม่มี มีปัญหาแน่นอน 
         $Computer_id = "PC001";
    } else {
        for ($i = 0; $i < count($keep) - 1; $i++) {
            $num_1 = substr($keep[$i], 2);
            $num_2 = substr($keep[$i + 1], 2);
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
            $Computer_id =  "PC" . $pr_id;
            // echo $Computer_id;
        } else {
            // echo $Computer_id; // ใช้เพื่อหาตำแหน่ง N ตัวล่าสุด
            $Computer_id =  $keep_last;
        }
    }
}
?>