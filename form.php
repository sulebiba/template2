<?php

date_default_timezone_set('Africa/Lagos');
include("database/connection.php");
if(isset($_POST['submit'])){
$name=mysqli_real_escape_string($db,$_POST['name']);
$email=mysqli_real_escape_string($db,$_POST['email']);
$message=mysqli_real_escape_string($db,$_POST['message']);
$date = $_POST['date'];   

if(empty($name)){
    echo"<script>alert('please enter your name')</script>";
}
else if(!preg_match("/^[a-zA-z ]*$/",$name)){
   echo"<script>alert('please enter only alphabets and no space')</script>"; 
}
else if(empty($email)){
   echo"<script>alert('please enter your email Address')</script>"; 
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo"<script>alert('please enter a valid email Address')</script>";
}
else if(empty($message)){
    echo"<script>alert('please enter a message')</script>";
}

else{
        $insert=mysqli_query($db,"INSERT INTO portfolio (name,email,message,date) VALUES ('$name','$email','$message','$date')")or die (mysqli_error($db));
        header("Location:index.php?success=success");
    }   
}
    
?>



