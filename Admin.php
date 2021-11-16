<?php
include("database/connection.php");
include("session/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="css/table.css">
</head>
<body>
    <p align='right'><a href='log_out.php' class='btn btn-primary'>Log out</a></p>
    <h2 align='center' class='cup'>Users Details</h2>
    <h2 align='left'><a href='edit.php' class='btn btn-success'>Change Username and Password</a></h2><h3 align='center'><?php 
    
    $select=mysqli_query($db,"SELECT * FROM portfolio ORDER BY 1 DESC");
    $no=mysqli_num_rows($select);
    echo "No of info:$no";
    
    ?></h3>
        
            <table border="2"class="content-table" align='center'>
                <thead>
               <tr>
                   <th>Name</th><th>Email</th><th>Message</th><th>Date</th>
            </tr> 
            </thead>
            
           <?php
            if(isset($_GET['page'])){   
                $page=$_GET['page'];
                }
                else{
                    $page=1;
                }
                $num_per_page=20;
                $start_from = ($page-1)*20;
            $select=mysqli_query($db,"SELECT * FROM portfolio ORDER BY 1 DESC LIMIT $start_from,$num_per_page");
            
            while($row=mysqli_fetch_array($select)){
                $id=$row['id'];
                $name=$row['name'];
                $email=$row['email'];
                $message=$row['message'];
                $date=$row['date'];
                
                 
            
                    echo"<tbody><tr>
                <th>$name</th><th>$email</th><th>$message</th><th>$date</th><th><a href='delete.php?id=$id&page=$page'class='btn btn-danger'>Delete</a></th>
         </tr> </tbody>";
                    
                
                
            
            }
            
            ?>

                
            
            
</table>
        
    <div class="row mx-0">
        <div class="col-12 text-center pb-4 pt-4">
  <?php
        $q=mysqli_query($db,"SELECT * FROM portfolio");
        $total_q=mysqli_num_rows($q);
        $total_page=ceil($total_q/$num_per_page);
        
        if($page>1){
            
          echo"<a href='Admin.php?page=".($page-1)."' class='btn btn-primary'>previous</a>";   
        }
        
        for($i=1;$i<$total_page;$i++){
          //echo"<a href='videos.php?page=".$i."' class='btn btn-primary'>$i</a>";   
        }
        
        
        if($i>$page){
            
          echo"<a href='Admin.php?page=".($page+1)."' class='btn btn-danger'>next</a>";   
        }
        ?>
        
    </div>   
     </div>    
        
        
                
            
        
    
</body>
</html>
<?php
if(!isset($_SESSION['id'])){
        header("Location:Admin_login.php");
        ob_end_flush(); 
}
?>