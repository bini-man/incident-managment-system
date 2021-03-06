<?php
session_start();
if (!isset($_SESSION['user'])) {
?>
  <script>
    alert('YOU ARE NOT ALLOWED TO ACCESS!!Please Login to access the page');
    window.location = 'login.php';
  </script>
<?php
}
include_once("dbcon.php");
$email = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/style_tables.css">
  <script src="js/manage_table.js"></script>
  <title>Manage Incident</title>
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
    <br>
    <div class="row">
      <div class="column">
        <div class="card" id="frame">
          <div class="table-responsive">
            <h2 id="manage_user">Manage Incident</h2>
            <div class="table-responsive">
              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search using serial number.." class="col-md-3" title="Type in a name">
              <table id="editable_table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th onclick="sortTable(0)">Serial Number <span class="glyphicon glyphicon-sort"></span></th>
                    <th onclick="sortTable(1)">Title <span class="glyphicon glyphicon-sort"></span></th>
                    <th onclick="sortTable(2)">Owner <span class="glyphicon glyphicon-sort"></span></th>
                    <th onclick="sortTable(3)">Description <span class="glyphicon glyphicon-sort"></span></th>
                    <th>Assigned User </th>
                    <th onclick="sortTable(5)">Status <span class="glyphicon glyphicon-sort"></span></th>
                    <th onclick="sortTable(6)">Created By <span class="glyphicon glyphicon-sort"></span></th>
                    <th onclick="sortTable(7)">Incident Date <span class="glyphicon glyphicon-sort"></span></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $manage_user = "SELECT * FROM incident where assigned_user='$email' or created_user='$email' ORDER BY serial_number DESC ";
                  $result = mysqli_query($con, $manage_user);
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
  </div>
</body>
<div class="footer">
  <?php
  include_once 'footer.php';
  ?>
</div>

</html>
<script>
  $(document).ready(function() {
    $('#editable_table').Tabledit({
      url: 'action_incident.php',
      deleteButton: false,
      buttons: {
        edit: {
          class: 'btn btn-sm btn-info',
          html: '<span class="glyphicon glyphicon-pencil"></span> &nbsp EDIT',
          action: 'edit'
        }
      },
      columns: {
        identifier: [0, "serial_number"],
        editable: [
          [1, 'title'],
          [2, 'owner'],
          [3, 'description']
        ]
      },
      restoreButton: true,
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