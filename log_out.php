<?php
session_start();
unset($_SESSION['id']);
header("Location:Admin_login.php");
?>