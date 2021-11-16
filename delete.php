<?php
include("session/session.php");
include("database/connection.php");
if(isset($_GET['id'])){
$id=$_GET['id'];
}
if(isset($_GET['page'])){
$page=$_GET['page'];
}
$delete=mysqli_query($db,"delete from portfolio where id='$id'") or die(mysqli_error($db));


$user_id=$_SESSION['id'];
header("location:Admin.php?page=$page");
//header("location:index.php?delete_post='successful'");
//session_destroy();
?>


