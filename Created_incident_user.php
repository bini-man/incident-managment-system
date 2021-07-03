<?php
session_start();
if(!isset($_SESSION['user']))
{
?>
 <script>
  alert('YOU ARE NOT ALLOWED TO ACCESS!!Please Login to access the page');
  window.location='login.php';
 </script>
<?php
}
 include_once("dbcon.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage user</title>
</head>
<body>
<?php 

include_once 'header.php';
include_once 'header_user.php';
 ?>










<div>

<?php 

include_once 'footer.php';
 ?>   

</div>
</body>
</html>