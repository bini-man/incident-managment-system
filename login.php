<?php
session_start();
if (isset($_SESSION['admin'])) {
  header('location:incident.php');
} elseif (isset($_SESSION['user'])) {
  header('location:Manage_incident_user.php');
} else {
}
?>
<?php
ob_start();
include_once 'dbcon.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" href="js/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
  include_once 'header.php';
  ?>
  <?php
  if (@$_GET['Empty'] == true) {
  ?>
    <div class="alert alert-danger  "><strong>Invalid!</strong><?php echo $_GET['Empty'] ?></div>
  <?php
  }
  ?>
  <?php
  if (@$_GET['Invalid'] == true) {
  ?>
    <div class="alert alert-danger "><strong>Invalid!</strong><?php echo $_GET['Invalid'] ?></div>
  <?php
  }
  ?>
  <div class="footer" style="width: 70%;">
  <div class="row">
      <div class="column">
        <div class="card" id="frame" style="width: 75%;">
        <p id="lo"  >Incident Managment System</p>
  <div id="login" >
   
    <br>
    <br>
    <div id="ll">
      <form method="post" action="#" style="padding-left: 0px;">
        <span class="glyphicon glyphicon-user" style="color:black"></span><input type="text" id="user" name="Email" placeholder=" Enter Email" required="">
        <br>
        <br>
        <span class="glyphicon glyphicon-lock" style="color:black"></span><input type="password" id="pass" name="password" placeholder=" ********" required="">
        <br>
        <br>
    </div>
    <br>
    <br>
    <button id="loo" name="login" class="btn btn-info"><span class="glyphicon glyphicon-log-in"> </span> Login </button>
    <br>
    <br>
    </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  <?php
  if (isset($_POST['login'])) {
    $email = $_POST['Email'];
    $password = $_POST['password'];
    $UserType = "SELECT role from users where email='$email' and password='$password' and status='active'";
    $res = mysqli_query($con, $UserType);
    $row = $res->fetch_assoc();
    if (mysqli_num_rows($res) > 0) {
      if ($row['role'] === "user") {
        $_SESSION['user'] = $email;
        header('location:Manage_incident_user.php');
        exit();
        ob_end_flush();
      } else {
        $_SESSION['admin'] = $email;
        header('location:incident.php');
        exit();
        ob_end_flush();
      }
    } else {
      header("location:login.php?Invalid=Invalid username or password");
    }
  }
  ?>
  <?php
  include_once 'footer.php';
  ?>
</body>
</html>