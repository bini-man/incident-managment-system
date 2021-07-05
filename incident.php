<?php
session_start();
if (!isset($_SESSION['admin'])) {
?>
  <script>
    alert('YOU ARE NOT ALLOWED TO ACCESS!!Please Login to access the page');
    window.location = 'login.php';
  </script>
<?php
}
include_once("dbcon.php");
?>
<?php
include_once("dbcon.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script src="js/manage_table.js"></script>
  <title>Manage Incident</title>
  <link rel="stylesheet" href="css/style_tables.css">
</head>
<div class="footer">
  <?php
  include_once 'header.php';
  ?>
</div>
<?php
include_once 'sidebar.php';
ob_start();
?>
<?php
$manage_user = "SELECT * FROM incident ORDER BY serial_number ASC";
$result = mysqli_query($con, $manage_user);
?>
<br>
<div class="footer">
  <div class="row">
    <div class="column">
      <div class="card" id="frame">
        <h2 id="manage_user">Manage Incidents</h2>
        <div class="table-responsive">
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search using serial number.." class="col-md-3" title="Type in a name">
          <table id="editable_table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th onclick="sortTable(0)">Serial Number <span class="glyphicon glyphicon-sort"></span></th>
                <th onclick="sortTable(1)">Title <span class="glyphicon glyphicon-sort"></span></th>
                <th onclick="sortTable(2)">Owner <span class="glyphicon glyphicon-sort"></span></th>
                <th onclick="sortTable(3)">Description <span class="glyphicon glyphicon-sort"></span></th>
                <th onclick="sortTable(4)">Assigned User <span class="glyphicon glyphicon-sort"></span></th>
                <th onclick="sortTable(5)">Status <span class="glyphicon glyphicon-sort"></span></th>
                <th onclick="sortTable(6)">Created By <span class="glyphicon glyphicon-sort"></span></th>
                <th onclick="sortTable(7)">Incident Date <span class="glyphicon glyphicon-sort"></span></th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_array($result)) {
                echo '
                        <tr>
                            <td>' . $row["serial_number"] . '</td>
                            <td>' . $row["title"] . '</td>
                            <td>' . $row["owner"] . '</td>
                            <td>' . $row["description"] . '</td>
                            <td>' . $row["assigned_user"] . '</td>
                            <td>' . $row["status"] . '</td>
                            <td>' . $row["created_user"] . '</td>
                            <td>' . $row["date"] . '</td>
                        </tr>
                    ';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="footer">
  <?php
  include_once 'footer.php';
  ?>
</div>
</body>

</html>
<script>
  $(document).ready(function() {
    $('#editable_table').Tabledit({
      url: 'action_incident.php',
      columns: {
        identifier: [0, "serial_number"],
        editable: [
          [1, 'title'],
          [2, 'owner'],
          [3, 'description']
        ]
      },
      restoreButton: false,
      onSuccess: function(data, textStatus, jqXHR) {
        if (data.action == 'delete') {
          $('#' + data.id).remove();
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