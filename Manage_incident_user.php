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
    <title>Manage user</title>
</head>
<body>
<?php 
include_once 'header.php';
include_once 'header_user.php';
 ?>
<?php

 ?>
 <br>
<div class="table-responsive">
    <table id="editable_table" class="table table-bordered table-striped">
        <thead>
           <tr>
            <th>Serial Number</th>
            <th>Title</th>
            <th>Owner</th>
            <th>Description</th>
            <th>Assigned User</th>
            <th>Status</th>
            <th>Created By</th>
            <th>Incident Date</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $manage_user="SELECT * FROM incident where assigned_user='$email' or created_user='$email' ORDER BY serial_number DESC ";
            $result=mysqli_query($con,$manage_user);
                while($row=mysqli_fetch_array($result))
                {
                    echo '
                        <tr>
                            <td>'.$row["serial_number"].'</td>
                            <td>'.$row["title"].'</td>
                            <td>'.$row["owner"].'</td>
                            <td>'.$row["description"].'</td>
                            <td>'.$row["assigned_user"].'</td>
                            <td>'.$row["status"].'</td>
                            <td>'.$row["created_user"].'</td>
                            <td>'.$row["date"].'</td>
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
        url:'action_incident.php',
        columns:{
            identifier:[0,"serial_number"],
            editable:[[1,'title'],[2,'owner'],[3,'description']]

        },
        restoreButton:true,
        onSuccess:function(data,textStatus,jqXHR){
            if(data.action == 'delete'){
                $('#' +data.id).remove();

            }
        }
    });
});

</script>