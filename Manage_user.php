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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>      
    <script src="jquery.tabledit.min.js"></script>
    <title>Manage user</title>
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
$manage_user="SELECT * FROM users ORDER BY id ASC";
$result=mysqli_query($con,$manage_user);
 ?>
 <br>
<div class="table-responsive">
    <table id="editable_table" class="table table-bordered table-striped">
        <thead>
           <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
            <?php
                while($row=mysqli_fetch_array($result))
                {
                    echo '
                        <tr>
                            <td>'.$row["id"].'</td>
                            <td>'.$row["first_name"].'</td>
                            <td>'.$row["last_name"].'</td>
                            <td>'.$row["email"].'</td>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>

</div>


<div>

<?php 

include_once 'footer.php';
 ?>   

</div>
</body>
</html>
<script>
$(document).ready(function(){
    $('#editable_table').Tabledit({
        url:'action.php',
        columns:{
            identifier:[0,"id"],
            editable:[[1,'first_name'],[2,'last_name']]

        },
        removeButton:true
        restoreButton:false,
        onSuccess:function(data,textStatus,jqXHR){
            if(data.action == 'delete'){
                $('#' +data.id).remove();

            }
        }
    });
});

</script>