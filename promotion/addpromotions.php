 <?php
    require("../connect/connect.php");
    $promotion_id = $_POST["promotion_id"];
    $discount = $_POST["discount"];
    $end_date = $_POST["end_date"];
    $promotion_name = $_POST["promotion_name"];
    $start_date = $_POST["start_date"];
    $detail = $_POST["detail"];
    $stock = $_POST["stock"];



    // increase amount
    $sql = "INSERT INTO promotions VALUES ('$promotion_id','$promotion_name','$discount','$detail','$start_date','$end_date','$stock')";
    mysqli_query($con, $sql);
    ?>

 <html lang="en">

 <body>
     <script type="text/javascript">
         alert("Record add successfully !");
         window.location.href = 'promoform.php';
     </script>
 </body>

 </html>