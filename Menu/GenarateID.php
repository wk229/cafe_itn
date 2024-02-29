<?php
require("../connect/connect.php");
$sql = "SELECT Menu_id FROM menus  ORDER BY Menu_id ASC";  //fetch to create a key by order ASC 
$query = mysqli_query($con, $sql);
$pr_id = sprintf("%04d", mysqli_num_rows($query));
$Menu_id =  "M" . $pr_id;

$keep_last = $Menu_id;
// $num = mysqli_num_rows($query);
$keep = array();

//check C000000
/*กรณี ลบ ตัวแรก จะต้องเป็น 0 แล้วจะสร้าง 0 ใหม่*/
while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    array_push($keep, $result['Menu_id']);
}
// print_r($keep);
$not_B_zero = false;
for ($i = 0; $i < count($keep); $i++) {
    if ("M0000" != $keep[$i]) {
        $Menu_id = "M0000"; // warning
        $not_B_zero = true;
        // echo $Menu_id;
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
    $sql = "SELECT Menu_id  FROM menus ORDER BY Menu_id ASC";  //fetch to create a key by order ASC 
    $result = mysqli_query($con, $sql);
    $pr_id = sprintf("%04d", mysqli_num_rows($result));
    $Menu_id =  "M" . $pr_id;
    if ($Menu_id == "M0001") {  //ไม่รู้จะอธิบายยังไง เอาเป็นว่าถ้าไม่มี มีปัญหาแน่นอน 
         $Menu_id = "M0001";
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
            $pr_id = sprintf("%04d", $fill_num);
            $Menu_id =  "M" . $pr_id;
            // echo $Menu_id;
        } else {
            // echo $Menu_id; // ใช้เพื่อหาตำแหน่ง N ตัวล่าสุด
            $Menu_id =  $keep_last;
        }
    }
}
?>
