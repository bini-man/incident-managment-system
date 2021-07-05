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
  <?php
  ob_start();
  include_once 'dbcon.php';
  ?>
  <div class="footer">
    <?php
    include_once 'header.php';
    ?>
  </div>
  <?php
  include_once 'sidebar.php';
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
              <h1 id="user_detail">User Details</h1>
              <br>
              <form method="post" action="create_user_action.php">
              <div id="inputs">
                First Name:
                <input type="text" name="first_name" required="" class="form-control">
                <br>
                Last Name:
                <input type="text" name="last_name" required="" class="form-control">
                <br>
                Email:
                <input type="email" name="email" required="" class="form-control">
                <br>
                Password:
                <input type="password" name="password" required="" class="form-control">
                <br>
                Confirm Password:
                <input type="password" name="cpassword" required="" class="form-control">
                <br>
                <button name="postnotce" id="postnotce" class="glyphicon glyphicon-plus   btn btn-info"> Create User</button>
                <br>
                <br>
                </div>
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