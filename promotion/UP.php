<!DOCTYPE html>
<html>
<body>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php	
require("../connect/connect.php");
$promotion_id = isset($_GET['promotion_id']) ? $_GET['promotion_id']:'';

if($promotion_id!=''){
	$sql= "SELECT * FROM promotions WHERE promotion_id = '".$promotion_id."'";
	$result = $con->query($sql);
	$row=$result->fetch_assoc();
}
?>
<div align = "center">
  <h2>Update Promotion Form</h2>
  <form method="post" action="uppro.php">
<?php if($promotion_id != ''){?>
	<input type="hidden" name="promotion_id" value="<?php echo $row['promotion_id'];?>">
<?php } ?>

    <!-- promotion_id: <input type="text" name="promotion_id" value="<?php echo $row['promotion_id'];  ?>">
    <br><br> -->
    promotion_name: <input type="text" name="promotion_name" value="<?php echo $row['promotion_name'];  ?>">
    <br><br>
    discount: <input type="float" name="discount" value="<?php echo $row['discount'];  ?>">
    <br><br>
    start_date: <input type="date" name="start_date" value="<?php echo $row['start_date'];  ?>">
    <br><br>
    end_date: <input type="date" name="end_date" value="<?php echo $row['End_date'];  ?>">
    <br><br>
    detail: <input type="text" name="detail" value="<?php echo $row['detail'];  ?>">
    <br><br>
    stock: <input type="int" name="stock" value="<?php echo $row['stock'];  ?>">
    <br><br>
    <input type="submit"  value="UPDATE">

  </form>
</div>
</body>

</html>