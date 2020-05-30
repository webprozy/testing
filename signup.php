<?php 
session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<title>signup</title>
    <script  src="script.js"></script>
</head>

<body>

    
<form action="" method="post" id="form">
    <div id="error"></div>
        <div>
         USER NAME: <input type="text" id="username" name ="fname">
        </div>
        <br>
        <div>
            EMAIL: <input type="text" id="email" name ="email">
        </div>
        <br>
        <div>
            MOBILE: <input type="number" id="mobile" name ="mobile">
        </div>
        <br>
        <div>
            PASSWORD: <input type="text" id="password" name ="password">
        </div>
        <br>
        <div>
           CONFIRM PASSWORD: <input type="password" id="cpassword" name ="cpassword" placeholder="***********"> 
        </div>
        <br>
        <div>
        DATE: <input type="date" name ="date">
        </div>
        <br>
        <div>
            gender : male<input type="radio" name ="gender" value="male"> female <input type="radio"name="gender" value="female" >
        </div>
        <br>

               <button class="form_submit"  type="submit" name="submit">SIGNUP</button>

    
    </form>
</body>
</html>

<?php
        require  'connection.php';
        //error_reporting(0);

   require 'signresigter.php';
   
?>