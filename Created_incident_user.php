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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style_created_incident_user.css">
  <title>Manage Incident</title>
</head>

<body>
  <div class="footer">
    <?php
    include_once 'header.php';
    ?>
    <?php
    include_once 'sidebar_user.php';
    ?>
    <br>
    <h2 id="incident">Previously Created and Assigned Incident</h2>
    <h2 class="previous">Assigned Incident</h2>
    <?php
    $manage_user = "SELECT * FROM incident where assigned_user='$email' ORDER BY serial_number DESC ";
    $result = mysqli_query($con, $manage_user);
    echo '<div class="row">         
            ';
    while ($row = mysqli_fetch_array($result)) {
      echo '                 
                    <div class="column">
                    <div class="card" id="card">
                          <p>Serial Number: ' . $row["serial_number"] . '</p>
                          <p>Title: ' . $row["title"] . '</p>
                          <p>Owner: ' . $row["owner"] . '</p>
                          <p>Description: ' . $row["description"] . '</p>
                          <p>Status: ' . $row["status"] . '</p>
                          <p>Created By: ' . $row["created_user"] . '</p>
                          <p>Incident Date: ' . $row["date"] . '</p>
     
                    </div>
                    </div>
  ';
    }
    ?>
  </div>
    <h2 class="previous">Previously Created Incident</h2>
    <?php
    $manage_user = "SELECT * FROM incident where created_user='$email' ORDER BY serial_number DESC ";
    $result = mysqli_query($con, $manage_user);
    echo '<div class="row">         
            ';
    while ($row = mysqli_fetch_array($result)) {
      echo '                 
                    <div class="column">
                    <div class="card" id="card">
                          <p>Serial Number: ' . $row["serial_number"] . '</p>
                          <p>Title: ' . $row["title"] . '</p>
                          <p>Owner: ' . $row["owner"] . '</p>
                          <p>Description: ' . $row["description"] . '</p>
                          <p>Status: ' . $row["status"] . '</p>
                          <p>Created By: ' . $row["created_user"] . '</p>
                          <p>Incident Date: ' . $row["date"] . '</p>
     
                    </div>
                    </div>
  ';
    }
    ?>
  </div>
  <div>
  </div>
  </div>
</body>
<div class="footer">
  <?php
  include_once 'footer.php';
  ?>
</div>

</html>