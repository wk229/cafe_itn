<html>
<head>
<title>ThaiCreate.Com PHP & MySQL (mysqli)</title>
</head>
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
    	ini_set('display_errors', 1);
        error_reporting(~0);   

       $strCustomerID = $_GET["Menu_id"];
       $query = "SELECT * From menus where Menu_id='".$strCustomerID."' ";
       
        $result = mysqli_query($con, $query) or die("Eror ");
        $row = mysqli_fetch_array($result);
       // print_r($row);

?>  
<div align = "center">
  <h1>Update Menu</h1>
  <form action="updatemenu2.php" method = "post" enctype="multipart/form-data">
  Menu_id: <input type="text" name="Menu_id" value = "<?php echo $row['Menu_id'];?>" readonly> 
    <br><br>
 
    Menu_name: <input type="text" name="Menu_name" value = "<?php echo $row['Menu_name'];?>">
    <br><br>
    stock: <input type="text" name="stock" value = "<?php echo $row['stock'];?>">
    <br><br>
    price: <input type="text" name="price" value = "<?php echo $row['price'];?>">
    <br><br>
    Immage : <input type="file" name="file" accept="image/*" require>
    <br><br>
    <input type="submit"  value="Edit" >
    
</form>
</div>
</body>

</html>