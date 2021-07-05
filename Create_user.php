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
      /* border:3px solid black; */
      border-radius: 20px;
      margin-top: 20px;
      margin-left: 18px;
    }
    #frame{
      border-radius: 25px;
    }
    .footer{
      margin-left: 220px;
    }
    .column {
      float: left;
      width: 80%;
      padding: 0 10px;
      margin-left: 230px;
      
    }

    /* Remove extra left and right margins, due to padding */
    .row {
      margin: 0 -5px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive columns */
    @media screen and (max-width: 600px) {
      .column {
        width: 80%;
        display: block;
        margin-bottom: 20px;
      }
    }
    #user_detail{
      color: #5bc0de;
  /* text-align: center; */
    }
    /* Style the counter cards */
    .card {
      box-shadow: 10px 10px 10px 10px rgba(0, 0, 0, 0.1);
      padding: 16px;
      margin-bottom: 20px;
      text-align: left;
      
      background-color: #f1f1f1;
    }
    </style>
    <title>Create Incident</title>
</head>
<body>

<?php 
ob_start();
include_once 'dbcon.php';

 ?>
 <div class="footer">
<?php
include_once 'header.php';

?>

 </div>
<?php 


include_once 'sidebar.php';
 ?>
<div class="footer">
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
</div>
<div class="row">
  
<div class="column" >
    <div class="card" id="frame">
  <div class="container" id="postt">
      <div >
        <h1 id="user_detail">User Details</h1>
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
              Confirm  Password:
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
</div>
</div>
 </div>
<div class="footer">

<?php 

include_once 'footer.php';
 ?>   
</div>  
</body>

</html>