<?php include("GenarateID.php"); ?>
<?php require("../connect/connect.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>ComList</title>
  </head>
  <body>

<body>
<div align = "center">
  <h2>Customer Form</h2>
  <form method="post" action="addcus.php">
    <!-- create key to db  customers -->
    <input type="hidden" value="<?php echo $cus_id; ?>" name="cus_id">
    First_name: <input type="text" name="First_name">
    <br><br>
    Last_name: <input type="text" name="Last_name">
    <br><br>
    age: <input type="text" name="age">
    <br><br>
    Gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <br><br>
    phone: <input type="text" name="phone">
    <br><br>
    Address: <textarea name="Address" rows="3" cols="45">Your Address</textarea>

    <br><br>
    internetccafe_id: <select name="internetcafe_id">
      <?php
      $strSQL = "SELECT * from internetcafe";
      $objQuery = mysqli_query($con, $strSQL);
      $id = array();
      $address = array();
      while ($objResuut = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
        array_push($id, $objResuut['InternetCafe_id']);
        array_push($address, $objResuut['Address']);
      }
      ?>
      <?php
      for ($i = 0; $i < count($address); $i++) { ?>
        <option value="<?php echo $id[$i]; ?>"><?php echo $address[$i]; ?></option>
      <?php
      }
      ?>
    </select>
    <br><br>
    users: <input type="text" name="users">
    <br><br>
    passwords : <input type="text" name="passwords">
    <br><br>
    <input type="submit" value="Submit"> <a href="../loginpageCustomer.html"><input type="button" value="Back"></a> 
  </form>
</div>
</body>

</html>