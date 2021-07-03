<?php 
include_once 'dbcon.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>      
    <script src="jquery.tabledit.min.js"></script>
	<style >



.topnav {
  overflow: hidden;
  background-color: black;
}

.topnav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #5bc0de;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: center;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: center;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: center;
  }
}
</style>
</head>
<body>
<div class="topnav" id="myTopnav">
  <a href="incident.php" class="glyphicon glyphicon-book"> Incident Libery</a>
  <a href="Create_incident.php" class="glyphicon glyphicon-plus"> Create Incedent</a>
  <a href="Assign_incident.php" class="glyphicon glyphicon-share"> Assign Incedent</a>
  <a href="Manage_user.php" class="glyphicon glyphicon-user"> Manage Users</a>
  <a href="Create_user.php" class="glyphicon glyphicon-plus"> Create Users</a>
  <a href="logout_admin.php" class="glyphicon glyphicon-log-out"> Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</div>
</body>
</html>