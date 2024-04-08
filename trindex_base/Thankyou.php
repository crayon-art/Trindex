<?php

   $fname =$_POST["first_name"];
   $lname =$_POST["last_name"];
   $mail =$_POST["email_address"];

//Database Connection
$conn = new mysqli("localhost", "root", " ","contact")
;
if ($con){
   echo "Connection Succesful"
}else{
   die(mysqli_error($con));
}

?>
