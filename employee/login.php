 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rabbani sarkar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <hgroup>
    <h1 class="site-title" style="text-align: center; color: green;">Login, Registration, Logout</h1><br>
  </hgroup>

<br>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav center">
        <li><a href="login.php">LogIN</a></li>
         <!-- <li><a href="register.php">SignUp</a></li> -->
        <li><a href="logout.php">LogOut</a></li>
      </ul>

    </div>
  </div>
</nav>

<main class="main-content">
 <div class="col-md-6 col-md-offset-2">
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<form method="post" action="login.php">
  <table>
     <tr>
           <td>users	 : </td>
           <td><input type="text" name="users" class="textInput"></td>
     </tr>
      <tr>
           <td>Password : </td>
           <td><input type="password" name="passwords" class="textInput"></td>
     </tr>
      <tr>
           <td></td>
           <td><input type="submit" name="login_btn" class="Log In"></td>
     </tr>
 
</table>
</form>
</div>

</main>
</div>

</body>
</html>
<?php
session_start();
if(  isset($_SESSION['users']) )
{
  header("location:../indexforEmployee.html");
  die();
}
//connect to database
require("../connect/connect.php"); 
if($con)
{
  if(isset($_POST['login_btn']))
  {
      $users=mysqli_real_escape_string($con,$_POST['users']);
      $passwords=mysqli_real_escape_string($con,$_POST['passwords']);
      $passwords=($passwords); //
      $sql="SELECT * FROM employees WHERE  users='$users' AND passwords='$passwords'";
      $result=mysqli_query($con,$sql);
      
      if($result)
      {
     
        if( mysqli_num_rows($result)>=1)
        {
            $_SESSION['message']="You are now Loggged In";
            $_SESSION['users']=$users;
            header("location: ../indexforEmployee.html");
        }
       else
       {
              $_SESSION['message']="Username and Password combiation incorrect";
       }
      }
  }
}
?>