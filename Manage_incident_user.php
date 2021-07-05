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
<style>
  #myInput {
  background-image: url('searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
#manage_user{
  color: #5bc0de;
  text-align: center;
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
<script src="manage_table.js"></script>
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

include_once 'sidebar_user.php';
 ?>
 
<?php

 ?>
 <br>
 <div class="row">
  
  <div class="column" >
      <div class="card" id="frame">
<div class="table-responsive">
  <h2 id="manage_user">Manage Incident</h2>
<div class="table-responsive">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search using serial number.." class="col-md-3"  title="Type in a name">

    <table id="editable_table" class="table table-bordered table-striped">
        <thead>
           <tr>
            <th  onclick="sortTable(0)">Serial Number  <span  class="glyphicon glyphicon-sort"></span></th>
            <th  onclick="sortTable(1)">Title  <span  class="glyphicon glyphicon-sort"></span></th>
            <th  onclick="sortTable(2)">Owner  <span  class="glyphicon glyphicon-sort"></span></th>
            <th onclick="sortTable(3)">Description  <span  class="glyphicon glyphicon-sort"></span></th>
            <th >Assigned User  </th>
            <th onclick="sortTable(5)">Status  <span  class="glyphicon glyphicon-sort"></span></th>
            <th onclick="sortTable(6)">Created By  <span  class="glyphicon glyphicon-sort"></span></th>
            <th onclick="sortTable(7)">Incident Date  <span  class="glyphicon glyphicon-sort"></span></th>
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

</div></div></div></div>
 </div></div>




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
        url:'action_incident.php',
        deleteButton: false,
    
    buttons: {
        edit: {
            class: 'btn btn-sm btn-info',
            html: '<span class="glyphicon glyphicon-pencil"></span> &nbsp EDIT',
            action: 'edit'
        }
    },
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
function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("editable_table");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
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