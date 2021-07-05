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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Create Incident</title>
</head>

<body>
  <div class="footer">
    <?php
    include_once 'header.php';
    ?>
  </div>
  <?php
  include_once 'sidebar.php';
  ob_start();
  ?>
  <div class="footer">
    <?php
    if (@$_GET['Empty'] == true) {
    ?>
      <div class="alert alert-success  "><strong>Success!</strong><?php echo $_GET['Empty'] ?></div>
    <?php
    }
    ?>
    <?php
    if (@$_GET['Invalid'] == true) {
    ?>
      <div class="alert alert-danger "><strong>ERROR!</strong><?php echo $_GET['Invalid'] ?></div>
    <?php
    }
    ?>
  </div>
  <div class="footer">
    <div class="row">
      <div class="column">
        <div class="card" id="frame">
          <div class="container" id="postt">
            <div>
              <h1 id="incident_detail">Incident Detail</h1>
              <br>
              <form method="post" action="create_incident_action.php">
                Incident Title:
                <input type="text" name="title" required="" class="form-control">
                <br>
                Incident Owener:
                <input type="text" name="owner" required="" class="form-control">
                <br>
                Incident description:
                <textarea rows="10" name="description" cols="25" class="form-control">
              </textarea>
                <br>
                Incident Status:
                <select class="form-control" name="status">
                  <option value="Purchased"> Purchased</option>
                  <option value="Operational"> Operational</option>
                  <option value="In Store"> In Store</option>
                  <option value="Not Operational">Not Operational</option>
                  <option value="Retired">Retired</option>
                </select>
                <br>
                <button name="postnotce" id="postnotce" class="glyphicon glyphicon-plus   btn btn-info"> Create Incident</button>
                <br>
                <br>
              </form>
            </div>
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