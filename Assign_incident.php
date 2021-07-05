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
ob_start();
include_once ("dbcon.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      #frame{
      border-radius: 25px;
    }
    /* #assign{
      padding-top: -140px;
    } */
    .footer{
      margin-left: 220px;
    }
    .column {
      float: left;
      width: 100%;
      padding: 0 10px;
      margin-left: 10px;
      
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
    th{
      color:#5bc0de;
    }
    /* Responsive columns */
    @media screen and (max-width: 600px) {
      .column {
        width: 80%;
        display: block;
        margin-bottom: 20px;
      }
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
    <title>Assign  Incident</title>
</head>
<body>
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
<div class="footer">
  <div class="column" >
      <div class="card" id="frame">

<section >

<div class="container">
<?php 
$sqll="SELECT * FROM incident where assigned_user='' LIMIT 1 ";
                  $exes=mysqli_query($con,$sqll);
        if (mysqli_num_rows($exes) > 0) {
         $row = mysqli_fetch_assoc($exes);
       
          $serial_number=$row['serial_number'];
          $owner=$row['owner'];
          $description=$row['description'];
          $status=$row['status'];
          $title=$row['title'];
          $created_user=$row['created_user'];
          $date=$row['date'];
          echo "<div class='container'>";
          echo "<div class='row'>";
          echo "<div class='col-md-6'>";
          echo "<h3>Serial Number:$serial_number</h3>";
          echo "<h3>Incident Title:$title</h3>";
          echo "<h3>Incident Owner:$owner</h3>";
          echo "<h3>Incident Description:$description</h3>";
          echo "<h3>Incident Status:$status</h3>";
          echo "<h3>Incident Created By:$created_user</h3>";
          echo "<h3>Incident Date:$date</h3>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        // }else{
        //     echo "NO REQUEST FOUND";
        //     } 
       

   ?>
   <form method="post" action="#">
    <div class="col-md-3">
  <select name="expert" id="expert" required="" class="form-control">
    <option value="">Select User</option>
    <?php  
     $expetdisplay="SELECT email FROM users WHERE role='user'";
     $exee=mysqli_query($con,$expetdisplay);
while ($row=mysqli_fetch_assoc($exee)) {
echo '<option value="'.$row["email"].'">'.$row["email"].'</option>';
}
?>
  </select>
  <br>
  <BUTTON name="assign" id="assign" value="" class="btn btn-info col-md-6 ">ASSIGN</BUTTON>

  </form></div>
  <?php 
if (isset($_POST['assign'])) {
$requestid=$serial_number;
$expert=$_POST['expert'];
$assign="UPDATE incident SET assigned_user='$expert' WHERE serial_number='$requestid'";
$exe_assign=mysqli_query($con,$assign);
if ($exe_assign) {

header("location:Assign_incident.php?Empty=USER SUCCESSFULY ASSIGNED");
}else{

header("location:Assign_incident.php?Invalid=USER NOT ASSIGNED");
}

}
// 

   ?>
  <br>
  
 

</p>
<?php  
        }else{
            echo "No Incident Found";
        }

        ?>

</div>

</section>






<div>

 

</div></div>
</div></div></div>
<div class="footer">
<?php 

include_once 'footer.php';
 ?> 
</div> 
</body>
</html>