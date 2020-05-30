<?php  
 if (isset($_POST['submit'])) {
        $firstname=mysqli_real_escape_string($connection,htmlspecialchars($_POST['fname']));
        $email=mysqli_real_escape_string($connection,htmlspecialchars($_POST['email']));
        $mobile=mysqli_real_escape_string($connection,htmlspecialchars($_POST['mobile']));
        $password=mysqli_real_escape_string($connection,htmlspecialchars($_POST['password']));
        $confirmpassword=mysqli_real_escape_string($connection,htmlspecialchars($_POST['cpassword']));
        $date=$_POST['date'];
        $gender=$_POST['gender'];
        


        

     
    
        if ($firstname==""|| $email==""||$mobile=="" ||$password=="" || $date==""||$gender=="") {
            echo "all values are required";

           
            
        }

         elseif ($password!==$confirmpassword) {
           # if ($password!==$confirmpassword) {
            echo"  your password is not valid";
            }
         
         
        else
        
        {
            
  $select="SELECT * FROM logs WHERE email='$email'  ";
  $data=mysqli_query($connection,$select) or die('cannot execute query');

  
  $total=mysqli_num_rows($data);
  if ($total>0) { 
    echo " this email is already resgitered";
      
  }else{
    $email_valid=true;

        
  }
  
  if ($email_valid) {
      
    

           
   $insert ="INSERT INTO employee (username,password,email,date,gender,phone) VALUES ('$firstname','$password','$email','$date','$gender','$mobile')";
   


           mysqli_query($connection , $insert) or die('cannot execute query');
           echo "record inserted successfull"."<br>";


        
                     mysqli_close($connection);

         echo "name = ".$firstname."<br>";
        //echo "school = ".$school."<br>";
        echo "email = ".$email."<br>";
        echo "password=".$password."<br>";
        echo "successfull registered";

           //BHAI ES LINK KO SET INTERVAL MAI LAGA DE
         echo "<script>location.href='login0.php';</script>";
        }
        
      }
    }
    ?>