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
    <script src="manage_table.js"></script>
    <style>
        
#myInput {
  background-image: url('images/searchicon.png');
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
        //removeButton:true
        restoreButton:false,
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