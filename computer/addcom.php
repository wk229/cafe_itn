<html>

<body>
    <?php
    require("../connect/connect.php");

    
    $Computer_id = $_POST["Computer_id"];

    $brand_computer = $_POST["brand_computer"];

    $internetcafe_id = $_POST["internetcafe_id"];

    $status = $_POST["status"];
    // เพิ่มข้อมูลคอมพิวเตอร์
    $sql = "INSERT INTO computers VALUES ('$Computer_id','$brand_computer',b'$status','$internetcafe_id')";
    $boolean = true;
    try {
        mysqli_query($con, $sql);
    } catch (mysqli_sql_exception $e) {
        echo ("Error description: " . mysqli_error($con) . "<br>");
        $boolean = false;
    } ?>
    <a href="../indexforEmployee.html">main page</a><br><br>
    <a href="addEmp.php">back</a>
    <?php if (!$boolean) {
        exit();
    }
    ?>
     <script type="text/javascript">
        alert("Add successful !");
        window.location.href = 'comform.php';
    </script>
</body>

