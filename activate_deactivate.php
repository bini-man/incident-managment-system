<?php
include_once("dbcon.php");
$id=$_GET['id'];

$user_status = "SELECT status from users where id='".$id."'";
$res = mysqli_query($con, $user_status);
$row = $res->fetch_assoc();
$real_status=$row['status'];
if($real_status=="deactive"){
    $set_active = " UPDATE users SET status = 'active' WHERE id= '" . $id . "'";
    $exe_active=mysqli_query($con, $set_active);
    if($exe_active){
        header('location:Manage_user.php');
    }
  
}else{
    $set_deactive = " UPDATE users SET status = 'deactive' WHERE id= '" . $id . "'";
    $exe_deactive=mysqli_query($con, $set_deactive);
    if($exe_deactive)
    header('location:Manage_user.php');
}
?>