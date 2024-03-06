<?php
   $localhost = 'localhost';
   $user = 'root';
   $pass ='mysql';
   $db = "ex2";
   
//    connnect 
$con = mysqli_connect($localhost, $user, $pass, $db);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else{
	// echo "<h2>Connected!</h2>";
}


?>