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
    <title>Assign  Incident</title>
</head>
<body>

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



<section class="jumbotron text-left">

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
  </select></div>
  <br>
  <BUTTON name="assign" id="assign" value="" class="btn btn-primary my-2">ASSIGN</BUTTON>

  </form>
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

<?php 

include_once 'footer.php';
 ?>   

</div>

</body>
</html>