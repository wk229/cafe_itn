<?php
session_start();
//connect to database
require("../connect/connect.php");
if(isset($_POST['register_btn']))
{
    $emp_id=mysqli_real_escape_string($con,$_POST['emp_id']);
    $First_name=mysqli_real_escape_string($con,$_POST['First_name']);
    $Last_name=mysqli_real_escape_string($con,$_POST['Last_name']);
    $Address=mysqli_real_escape_string($con,$_POST['Address']); 
    $Role=mysqli_real_escape_string($con,$_POST['password2']); 
    $gender=mysqli_real_escape_string($con,$_POST['gender']); 
    $salary=mysqli_real_escape_string($con,$_POST['salary']); 
    $hours	=mysqli_real_escape_string($con,$_POST['hours']); 
    $age	=mysqli_real_escape_string($con,$_POST['age']); 
    $phone=mysqli_real_escape_string($con,$_POST['phone']); 
    $users	=mysqli_real_escape_string($con,$_POST['users']); 
    $passwords=mysqli_real_escape_string($con,$_POST['passwords']);
    $passwords2=mysqli_real_escape_string($con,$_POST['passwords2']); 
    $internetcafe_id=mysqli_real_escape_string($con,$_POST['internetcafe_id']); 

    $query = "SELECT * FROM employees WHERE users = '$users'";
    $result=mysqli_query($con,$query);
      if($result)
      {
     
        if( mysqli_num_rows($result) > 0)
        {
                
                echo '<script language="javascript">';
                echo 'alert("Username already exists")';
                echo '</script>';
        }
        
          else
          {
            
            
            if($passwords==$passwords2)
            {           //Create User
                $password=($password); 
                $sql="INSERT INTO employees VALUES('$emp_id','$First_name','$Last_name','$Address','$Role','$gender','$salary',
                '$hours','$age','$phone','$users','$passwords','$internetcafe_id')"; 
                mysqli_query($con,$sql);  
                $_SESSION['message']="You are now logged in"; 
                $_SESSION['users']=$users;
                header("location:../indexforEmployee.html");  //redirect home page
            }
            else
            {
                $_SESSION['message']="The two password do not match";   
            }
          }
      }
}
?>


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
        <li><a href="register.php">SignUp</a></li>
        
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
<form method="post" action="register.php">
  <table>

     <tr>
            <!-- create key to db employee -->
    <input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">
     </tr>
     <tr>
           <td>First_name : </td>
           <td><input type="text" name="First_name" class="textInput"></td>
     </tr>
      <tr>
           <td>Last_name : </td>
           <td><input type="text" name="Last_name" class="textInput"></td>
     </tr>
      <tr>
           <td>Address: </td>
           <td><input type="text" name="Address" class="textInput"></td>
     </tr>
     <tr>
           <td>Role: </td>
           <td><input type="text" name="Role" class="textInput"></td>
     </tr>
     <tr>
           <td> gender: </td>
           <td><input type="text" name="gender" class="textInput"></td>
     </tr>
     <tr>
           <td>salary: </td>
           <td><input type="number" name="salary" class="textInput"></td>
     </tr>
     <tr>
           <td>hours: </td>
           <td><input type="number" name="hours" class="textInput"></td>
     </tr>
     <tr>
           <td>age: </td>
           <td><input type="number" name="age" class="textInput"></td>
     </tr>
     <tr>
           <td>phone: </td>
           <td><input type="text" name="phone" class="textInput"></td>
     </tr>
     <tr>
           <td> users: </td>
           <td><input type="text" name="users" class="textInput"></td>
     </tr>
     <tr>
           <td>passwords: </td>
           <td><input type="password" name="passwords" class="textInput"></td>
     </tr>
     <tr>
           <td>Confirm passwords: </td>
           <td><input type="password" name="passwords2" class="textInput"></td>
     </tr>
     <tr>
           <td> internetcafe_id :</td>
           <td><input type="number" name="internetcafe_id" class="textInput"></td>
     </tr>
      <tr>
           <td></td>
           <td><input type="submit" name="register_btn" class="Register"></td>
     </tr>
    </table>

</form>
</div>

</main>
</div>

</body>
</html>



