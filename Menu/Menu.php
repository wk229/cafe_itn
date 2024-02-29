<?php include("GenarateID.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body>
<div align = "center">
  <h2>Menu Form</h2>
  <form method="post" action="addmenu.php" enctype="multipart/form-data">
    <!-- create key to db menus  -->
    <input type="hidden" name="Menu_id" value="<?php echo $Menu_id ?>">
  Menu_name:<input type="text" name="Menu_name">
    <br><br>
    stock: <input type="text" name="stock">
    <br><br>
    price: <input type="text" name="price">
    <br><br>
    Image : <input type="file" name="file" accept="image/*" require>
    <br><br>
    <input type="submit"  value="Submit"> <a href="../indexforEmployee.html"><input type="button" value="Back"></a> 
</div>
  </form>
  
</body>

</html>

