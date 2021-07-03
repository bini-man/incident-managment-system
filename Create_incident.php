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

include_once 'header.php';
include_once 'header2.php';
ob_start();
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
        <h1>Incident Creation FORM</h1>
        <br>
        
            <form method="post" action="#">

            Incident Title:

         
              <input type="text" name="title" required="" class="form-control">
              <br>
              Incident Owener:

         
<input type="text" name="owner" required="" class="form-control">
<br>
              
              Incident description:
              <textarea rows="10" name="description" cols="30" class="form-control">
              
              </textarea>
              <br>
              
              Incident Status:
              <select class="form-control" name="status">
              <option value="Purchased"> Purchased</option>
              <option value="Operational"> Operational</option>
              <option value="In Store"> In Store</option>
              <option value="Not Operational">Not Operational</option>
              <option value="Retired">Retired</option>
              </select>
              <br>
             <button  name="postnotce" id="postnotce" class="glyphicon glyphicon-plus   btn btn-info"   > Create Incident</button>
<br>
<br>
            </form>

            <?php 
                if (isset($_POST['postnotce'])) {
                  $Incident_Title=$_POST['title'];
                  $Incident_Owener=$_POST['owner'];
                  $Incident_description=$_POST['description'];
                  $Incident_Status=$_POST['status'];
                  $insert="INSERT INTO incident (owner,description,status,title,created_user) values ('$Incident_Owener','$Incident_description','$Incident_Status',' $Incident_Title','admin')";
                  $exe=mysqli_query($con,$insert);
                  if ($exe) {
                    header("location:Create_incident.php?Empty=Incident Created Successfuly");
                  }else{
                    header("location:Create_incident.php?Invalid=Incident Not Created ");
                     
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