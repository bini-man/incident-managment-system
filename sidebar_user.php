<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* body {
  font-family: "Lato", sans-serif;
} */

.sidenav {
  height: 100%;
  width: 215px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: black;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
}

.sidenav a:hover {
  color: #5bc0de;
  text-decoration: none;
;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
    <br>
   <a href="" ><span>User Dashboard</span></a> 
   <a href="Manage_incident_user.php" class="glyphicon glyphicon-book"> Manage incident</a>
  <a href="Created_incident_user.php" class="glyphicon glyphicon-open-file"> Previusoly Created incident</a>
  <a href="Create_incident_user.php" class="glyphicon glyphicon-plus"> Create incident</a>
  <a href="logout_user.php" class="glyphicon glyphicon-log-out"> Logout</a>
</div>


   
</body>
</html> 
