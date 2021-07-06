<?php
include_once("dbcon.php");
ob_start();
session_start();
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$role = "user";
if ($password != $cpassword) {
  header("location:Create_user.php?Invalid=The password you enter is not match");
} else {
  $insert = "INSERT INTO users (email,first_name,last_name,password,role,status) values ('$email','$first_name','$last_name','$password','$role','active')";
  $exe = mysqli_query($con, $insert);
  if ($exe) {
    header("location:Create_user.php?Empty=User Created Successfuly");
  } else {
    header("location:Create_user.php?Invalid=User Not Created ");
  }
}
?>
