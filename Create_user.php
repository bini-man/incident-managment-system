<?php
session_start();
if(!isset($_SESSION['admin']))
{
?>
 <script>
  alert('YOU ARE NOT ALLOWED TO ACCESS!!Please Login to access the page');
  window.location='login.php';
 </script>
<?php
}
 include_once("dbcon.php");
?>
<?php

include_once ("dbcon.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style >
    #postt{
      border:3px solid black;
      border-radius: 20px;
      margin-top: 20px;
    }
    </style>
    <title>Create Incident</title>
</head>
<body>

<?php 
ob_start();
include_once 'dbcon.php';

 ?>
<?php 

include_once 'header.php';
include_once 'header2.php';
 ?>

<?php 
if (@$_GET['Empty']==true) {
  ?>
<div class="alert alert-success  "><strong>Success!</strong><?php echo $_GET['Empty'] ?></div>
  <?php 
}
?>
<?php 
if (@$_GET['Invalid']==true) {
  ?>
  <div class="alert alert-danger "><strong>ERROR!</strong><?php echo $_GET['Invalid'] ?></div>
  <?php 
 
}

 ?>

  <div class="container" id="postt">
      <div >
        <h1>User Creation FORM</h1>
        <br>
        
            <form method="post" action="#">

            First Name:

         
              <input type="text" name="first_name" required="" class="form-control">
              <br>
              
             Last Name:
             <input type="text" name="last_name" required="" class="form-control">
              <br>
              Email:
             <input type="email" name="email" required="" class="form-control">
              <br>


               Password:
             <input type="password" name="password" required="" class="form-control">
              <br>
        Coniform Password:
             <input type="password" name="cpassword" required="" class="form-control">
              <br>
             <button  name="postnotce" id="postnotce" class="glyphicon glyphicon-plus   btn btn-info"   > Create User</button>
<br>
<br>
            </form>
 <?php 
                if (isset($_POST['postnotce'])) {
                  $first_name=$_POST['first_name'];
                  $last_name=$_POST['last_name'];
                  $email=$_POST['email'];
                  $password=$_POST['password'];
                  $cpassword=$_POST['cpassword'];
                  $role="user";
                //   $date=$_POST['date'];
                //   $notice=$_POST['notice'];
                //   $notice_am=$_POST['notice_am'];
                if($password != $cpassword){
                  header("location:Create_user.php?Invalid=The password you enter is not match");
                }else{
                  $insert="INSERT INTO users (email,first_name,last_name,password,role) values ('$email','$first_name','$last_name','$password','$role')";
                  $exe=mysqli_query($con,$insert);
                  if ($exe) {
                    header("location:Create_user.php?Empty=User Created Successfuly");
                       
                  }else{
                    header("location:Create_user.php?Invalid=User Not Created ");
                     
                  }
                }
              }

               ?>
</div>
</div>

<?php 

include_once 'footer.php';
 ?>     
</body>

</html>