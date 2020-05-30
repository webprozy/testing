<?php 

require ('connection.php');
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>

	<form action="" method="post">

  <div>
  	username: <input type="text" id="name" name="username" placeholder="username">
  </div><br>

  <div>
    passsword: <input type="password" id="password" name="password" placeholder="*******">
</div><br>

  <label for="login"></label> <input type="submit" value="login" id="ilogin" name="login">
  
  
  <label for="signup"></label> <input type="button" value="signup" id="isignup" name="signup">

  <script src="buttonalert.js"></script>
  
</form>


</body>
</html>


<?php
if (isset($_POST['login'])) {
  
  $user=mysqli_real_escape_string($connection,htmlspecialchars($_POST['username']));
  $pass=mysqli_real_escape_string($connection,htmlspecialchars($_POST['password']));
  
  
  
  $select="SELECT * FROM logs WHERE username='$user' && password='$pass' ";
  $data=mysqli_query($connection,$select) or die('cannot execute query');

  
  $total=mysqli_num_rows($data);
  if ($total==1) {
    echo "<script>location.href='client1.php'</script>";
    
    $_SESSION['username']=$user;
}

else{
	echo "<script>alert('login failed!');</script>";
    }

    }
    ?>