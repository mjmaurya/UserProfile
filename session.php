<?php 
include("config.php");
session_start();
$check_user=$_SESSION['login_user'];
$sel_sql=$conn->query("SELECT * FROM Users WHERE user_id='$check_user'");
$row=$sel_sql->fetch_assoc();
$userid = $row['user_id'];
$email=$row['email'];
$_SESSION['user_email']=$email;
$name=$row['name'];
$gender=$row['gender'];
$dob=$row['dob'];
$mobile=$row['mobile'];
$address=$row['address'];
$about=$row['about'];
$image=$row['image'];
$skills=$row['skills'];
if (!isset($_SESSION['login_user'])) {
	header('location:login.php');
	die();
}
 ?>