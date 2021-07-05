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
?>
<?php
include_once("dbcon.php");
ob_start();
$username = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Create Incident</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="footer">
    <?php
    include_once 'header.php';
    ?>
    <?php
    include_once 'sidebar_user.php';
    ?>
  </div>
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
  <div>
  </div>
  <div class=footer>
    <div class="row">
      <div class="column">
        <div class="card" id="frame">
          <div class="container" id="postt">
            <div>
              <h1 id="manage_user">Incident Creation FORM</h1>
              <br>
              <form method="POST" action="create_incident_user_action.php">
              <div id="inputs">
                Incident Title:
                <input type="text" name="title" required="" class="form-control">
                <br>
                Incident Owener:
                <input type="text" name="owner" required="" class="form-control">
                <br>
                Incident Description:
                <textarea rows="6" cols="15" name="description" class="form-control">
                </textarea>
                <br>
                Incident Status:
                <select class="form-control" name="status">
                  <option> Purchased</option>
                  <option> Operational</option>
                  <option> In Store</option>
                  <option>Not Operational</option>
                  <option>Retired</option>
                </select>
                <br>
                <button name="postnotce" id="postnotce" class="glyphicon glyphicon-plus   btn btn-info"> Create Incident</button>
                <br>
                <br>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div>
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