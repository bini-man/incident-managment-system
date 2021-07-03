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
 $email=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  margin-bottom:20px;
  text-align: left;
  background-color: #f1f1f1;
}</style>
    <title>Manage user</title>
</head>
<body>
<?php 

include_once 'header.php';
include_once 'header_user.php';
 ?>
<br>

<?php
            $manage_user="SELECT * FROM incident where assigned_user='$email' or created_user='$email' ORDER BY serial_number DESC ";
            $result=mysqli_query($con,$manage_user);
            echo '<div class="row">
           
            ';
                while($row=mysqli_fetch_array($result))
                {
                    echo '
                   
                    <div class="column">
    <div class="card">
    						
    <p>Serial Number: '.$row["serial_number"].'</p>
    <p>Title: '.$row["title"].'</p>
    <p>Owner: '.$row["owner"].'</p>
    <p>Description: '.$row["description"].'</p>
      <p>Status: '.$row["status"].'</p>
      <p>Created By: '.$row["created_user"].'</p>
      <p>Incident Date: '.$row["date"].'</p>
     
    </div>
   </div>
  ';
                }
                
                ?>


  </div>




<div>

<?php 

include_once 'footer.php';
 ?>   

</div>
</body>
</html>