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
    <title>Manage Incident</title>
  
</head>
<?php 

include_once 'header.php';
include_once 'header2.php';
ob_start();
 ?>
<?php
$manage_user="SELECT * FROM incident ORDER BY serial_number ASC";
$result=mysqli_query($con,$manage_user);
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
        restoreButton:false,
        onSuccess:function(data,textStatus,jqXHR){
            if(data.action == 'delete'){
                $('#' +data.id).remove();

            }
        }
    });
});

</script>