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
//session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" href="bootstrap.min.css">

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->

  <style type="text/css">
    body {
      background-color: #ffffff;
    }

    #login {
      margin: auto;
      width: 50%;
      border: 3px solid black;
      border-radius: 20px;
      padding: 8px;
      margin: 10%;
      margin-left: 26%;
      margin-top: 30px;
      margin-bottom: 50px;
    }

    #lo {
      text-align: center;
      color: black;
      border: 3px solid black;
      border-radius: 20px;
      font-size: 40px;
    }


    #pass {
      float: center;
    }

    #ll {
      margin-left: 130px;
      background-color: rgba(0, 0, 0, 0);
      color: white;
    }

    #user {
      background-color: rgba(0, 0, 0, 0);
      color: black;
      border: none;
      outline: none;
      height: 30px;
      transition: height 1s;
      -webkit-transition: height 1s;
    }

    #pass {
      background-color: rgba(0, 0, 0, 0);
      color: black;
      border: none;
      outline: none;
      height: 30px;
      transition: height 1s;
      -webkit-transition: height 1s;
    }
    ::placeholder {
      /* Chrome, Firefox, Opera, Safari 10.1+ */
      color: black;
      opacity: 1;
      /* Firefox */
    }
    :-ms-input-placeholder {
      /* Internet Explorer 10-11 */
      color: black;
    }
    ::-ms-input-placeholder {
      /* Microsoft Edge */
      color: black;
    }

    #loo {

      margin-left: 170px;
    }

    #rr {
      background-color: white;
      margin-left: 150px;
    }
  </style>



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
  <div id="login">
    <p id="lo">Incident Managment System</p>
    <br>
    <br>
    <div id="ll">
      <form method="post" action="#">
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
  <?php
  if (isset($_POST['login'])) {
    $email = $_POST['Email'];
    $password = $_POST['password'];
    $UserType = "SELECT role from users where email='$email' and password='$password'";
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