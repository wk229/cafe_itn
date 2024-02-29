<?php 
session_start();
//require("../connect/connect.php");
        if(isset($_POST['users'])){
            require("../connect/connect.php");
                  //$cus_id = $_POST['cus_id'];
                  $users = $_POST['users'];
                  $passwords = $_POST['passwords'];

                  $sql="SELECT * FROM customers 
                  WHERE  users='".$users."' and passwords='".$passwords."'";
                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);
                      $_SESSION["cus_id"] = $row["cus_id"];
                      $_SESSION["First_name"] = $row["First_name"];
                      $_SESSION["Last_name"] = $row["Last_name"];
                      echo ("ยินดีต้อนรับคุณ "); 
                      echo ($_SESSION["cus_id"]); echo (" "); 
                      echo ($_SESSION["First_name"]); echo (" "); 
                      echo ($_SESSION["Last_name"]);
               
                      header("location: ../indexforCustomer.html");
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
                        echo "window.history.back()";
                    echo "</script>";
                    
 
                  }
        }else{

             Header("Location: login1.php"); //user & password incorrect back to login again
 
        }
?>
<body>
    <br><br>
<form action="login1.php">
	<input type="submit" value="ออกจากระบบ">
	</form>
<form action="../Menu/buymenus.php">
	<input type="submit" value="สั่งอาหาร">
	</form>
</body>
</html>