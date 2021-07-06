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
   
    <script src="js/manage_table.js"></script>
    <link rel="stylesheet" href="css/style_tables.css">
    <title>Manage user</title>
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
<?php 

include_once 'sidebar.php';
 ?>
 </div>
 <?php
$manage_user="SELECT * FROM users where role='user' ORDER BY id ASC";
$result=mysqli_query($con,$manage_user);
 ?>
 <br>
<div class="footer">
 <div class="row">
  
  <div class="column" >
      <div class="card" id="frame">
<div class="table-responsive">
  <h2 id="manage_user">Manage User</h2>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." class="col-md-3"  title="Type in a name">
    <table id="editable_table" class="table table-bordered table-striped">
        <thead>
           <tr>
            <th onclick="sortTable(0)" > ID <span  class="glyphicon glyphicon-sort"></span></th>
            <th onclick="sortTable(1)" >First Name <span  class="glyphicon glyphicon-sort"></span></th>
            <th onclick="sortTable(2)">Last Name <span  class="glyphicon glyphicon-sort"></span></th>
            <th onclick="sortTable(3)">Email <span  class="glyphicon glyphicon-sort"></span></th>
            <th onclick="sortTable(4)">Activate/Deactivate  <span  class="glyphicon glyphicon-sort"></span><span  class="glyphicon glyphicon-cog"></span></th>
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
                            ';
                            if($row["status"]=="active"){
                              
                              echo '<td><a href="activate_deactivate.php?id='.$row['id'].' " class="btn btn-info">Deactivate</a></td>
                              ';
                            }else{
                                echo '
                            <td><a href="activate_deactivate.php?id='.$row['id'].' " class="btn btn-info">Activate</a></td> ';
                            }
                            echo '
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>

</div>
      </div>
  </div></div>

  
</div>
</div>

</body>
<div class="footer">

<?php 

include_once 'footer.php';
 ?> 
</div>
</html>
<script>
$(document).ready(function(){
    $('#editable_table').Tabledit({
        url:'action.php',
        columns:{
            identifier:[0,"id"],
            editable:[[1,'first_name'],[2,'last_name']]
        },
        restoreButton:false,
        onSuccess:function(data,textStatus,jqXHR){
            if(data.action == 'delete'){
                $('#' +data.id).remove();
            }
        }
    });
});
function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("editable_table");
    tr = table.getElementsByTagName("tr");
  
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>