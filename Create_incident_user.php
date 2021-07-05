<?php
session_start();
if(!isset($_SESSION['user']))
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
ob_start();
//session_start();
$username=$_SESSION['user'];
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
    }
    #manage_user{
  color: #5bc0de;
  /* text-align: center; */
}
#frame{
      border-radius: 25px;
    }
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
    <title>Create Incident</title>
</head>
<body>
<div class="footer">
<?php


include_once 'header.php';
?>
<?php 

include_once 'sidebar_user.php';
 ?>
 </div>
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
 
 <div>


 </div>
 <div class=footer>
 <div class="row">
  
  <div class="column" >
      <div class="card" id="frame">
 <div class="container" id="postt">
      <div >
        <h1 id="manage_user">Incident Creation FORM</h1>
        <br>
        
            <form method="post" action="#">

            Incident Title:

         
              <input type="text" name="title" required="" class="form-control">
              <br>
              Incident Owener:

         
<input type="text" name="owner" required="" class="form-control">
<br>
              
              Incident description:
              <textarea rows="6" cols="15" name="description" class="form-control">
              
              </textarea>
              <br>
              
              Incident Status:
              <select class="form-control" name="status">
              <option> Purchased</option>
              <option> Operational</option>
              <option> In Store</option>
              <option>Not Operational</option>
              <option>Retired</option>
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
                  $insert="INSERT INTO incident (owner,description,status,title,created_user) values ('$Incident_Owener','$Incident_description','$Incident_Status',' $Incident_Title','$username')";
                  $exe=mysqli_query($con,$insert);
                  if ($exe) {
                    header("location:Create_incident_user.php?Empty=Incident Created Successfuly");
                  }else{
                    header("location:Create_incident_user.php?Invalid=Incident Not Created ");
                     
                  }
                }
              

               ?>

</div>
</div>
      </div><div><div></div></div>




  

</div>
 </div>
 </div>
</body>
<div class="footer">
<?php 

include_once 'footer.php';
 ?> 
</div>
</html>