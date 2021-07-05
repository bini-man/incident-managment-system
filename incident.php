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
    <script src="manage_table.js"></script>
    <title>Manage Incident</title>
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

  </style>
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
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search using serial number.." class="col-md-3"  title="Type in a name">

    <table id="editable_table" class="table table-bordered table-striped">
        <thead>
           <tr>
            <th  onclick="sortTable(0)">Serial Number <span  class="glyphicon glyphicon-sort"></span></th>
            <th  onclick="sortTable(1)">Title <span  class="glyphicon glyphicon-sort"></span></th>
            <th  onclick="sortTable(2)">Owner <span  class="glyphicon glyphicon-sort"></span></th>
            <th  onclick="sortTable(3)">Description <span  class="glyphicon glyphicon-sort"></span></th>
            <th  onclick="sortTable(4)">Assigned User <span  class="glyphicon glyphicon-sort"></span></th>
            <th  onclick="sortTable(5)">Status <span  class="glyphicon glyphicon-sort"></span></th>
            <th  onclick="sortTable(6)">Created By <span  class="glyphicon glyphicon-sort"></span></th>
            <th  onclick="sortTable(7)">Incident Date <span  class="glyphicon glyphicon-sort"></span></th>
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