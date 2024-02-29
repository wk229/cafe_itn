<!DOCTYPE html>
<html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php include("GenarateID.php") ?>

<body>
<div align = "center">
  <h2>Promotion Form</h2>
  <form method="post" action="addpromotions.php">
    <input type="hidden" name="promotion_id" value="<?php echo $promotion_id; ?>">
    promotion_name: <input type="text" name="promotion_name">
    <br><br>
    discount: <input type="float" name="discount">
    <br><br>
    start_date: <input type="date" name="start_date">
    <br><br>
    end_date: <input type="date" name="end_date">
    <br><br>
    detail: <input type="text" name="detail">
    <br><br>
    stock: <input type="int" name="stock">
    <br><br>
    <input type="submit" value="Submit"> <a href="../indexforEmployee.html"><input type="button" value="Back"></a> 
  </form>
</div>
</body>

</html>