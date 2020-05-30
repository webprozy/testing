<?php 
$connection=mysqli_connect("localhost","root","","chatbox");
if (!$connection) {
	echo "connection error".mysqli_connect_error();
}

 ?>