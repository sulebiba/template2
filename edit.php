<?php
ob_start();
include("database/connection.php");
include("session/session.php");
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Change Username and Password</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Admin</strong> Edit Details</h1>
                            <div class="description">
                            	
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Change Username and Password</h3>
                            		
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
          <?php
          if(isset($_SESSION['id'])){
          $id=$_SESSION['id'];
          $select=mysqli_query($db,"SELECT * FROM admin WHERE id='$id'") or die(mysqli_error($db)); 
          while($result=mysqli_fetch_array($select)){
          $id=$result['id'];
          $username=$result['username'];
          $password=$result['password'];
         
          if(isset($_POST['submit'])){
          $username1=mysqli_real_escape_string($db,$_POST['username']);
          $password1=mysqli_real_escape_string($db,(md5($_POST['password'])));
          $update=mysqli_query($db,"UPDATE admin SET username='$username1', password='$password1' WHERE id='$id'") or die(mysqli_error($db));
          $_SESSION['id']=$id;
          unset($_SESSION['id']);
          header("Location:Admin_login.php?update=update_successful");
          ob_end_flush();
          }
          }
          }
              ?>
			                    <form role="form" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username" value="<?php echo $username; ?>">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" class="btn" name="submit">Update!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
<?php

if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($db,$_POST['username']);
   $password=mysqli_real_escape_string($db,(md5($_POST['password'])));
    
    $select=mysqli_query($db,"SELECT * FROM admin WHERE username='$username'AND password='$password'") or die (mysqli_error($db));
    if(mysqli_num_rows($select)>0){
       
        
        header("Location:Admin.php?success=log_in_Successful");
        ob_end_flush(); 
        
    while($row=mysqli_fetch_array($select)){
    $id=$row['id'];
    $_SESSION['id']=$id;
   
    }
    
    }
    else{
        echo"<script>alert('Incorrect email or Password')</script>";
        //header("Location:Admin_login.php");
    }
}
?>

<?php
if(!isset($_SESSION['id'])){
        header("Location:Admin_login.php");
        ob_end_flush(); 
}
?>