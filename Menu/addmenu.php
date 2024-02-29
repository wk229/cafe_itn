<?php
require("../connect/connect.php");

$Menu_id = $_POST["Menu_id"];

$Menu_name = $_POST["Menu_name"];

$stock = $_POST["stock"];

$price = $_POST["price"];

$immage = $_FILES["file"]["name"];

// เพิ่มเมนูอาหาร
$sql = "INSERT INTO menus VALUES ('$Menu_id','$Menu_name','$stock','$price','$immage')";
$boo = mysqli_query($con, $sql);

?>

<?php
$location = "upload/" . $immage;
move_uploaded_file($_FILES["file"]["tmp_name"], $location);
?>


<!DOCTYPE html>
<html>

<body>
    <script type="text/javascript">
        alert("Add successful !");
        window.location.href = 'Menu.php';
    </script>

</body>

</html>