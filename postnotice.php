<?php
session_start();
if(!isset($_SESSION['una']))
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
<?php 
ob_start();
include_once 'dbcon.php';

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>POST ANNOUNCEMENT</title>
  <link rel="stylesheet"  href="bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet"  href="bootstrap.min.css">

 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <?php 
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

  echo '<link rel="icon" type="image" href="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
    ?><style >
    #postt{
      border:3px solid black;
      border-radius: 20px;
      margin-bottom: 20px;
    }
    </style>
  </head>
  <body>
    <?php 
          $username=$_SESSION['una'];
     ?>
   <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow navbar-fixed-top">
        <a href="admin.php" class="btn btn-info" class="pull-left justify-content-start">HOME</a>
        
        <div class="container d-flex justify-content-end">
          <?php 
          $sele="SELECT * FROM admin where username='$username'";
          $exee=mysqli_query($con,$sele);
          $row=mysqli_fetch_array($exee);
         if (empty($row['profilepic'])) {
          
          }else{
            echo '<img style="border-radius: 50%;" style="vertical-align:middle" height="80" width="100" src="data:image/jpeg;base64,'.base64_encode( $row['profilepic'] ).'"/>';
          }
       echo "&nbsp&nbsp&nbsp";
      ?>
          <a href="#" class="navbar-brand d-flex align-items-end">
           <strong class="pull-left"><?php echo $username ?></strong>
          </a>
          <div class="pull-right">
             <a href="logoutadmin.php" class="btn btn-danger my-2">LOGOUT</a>
          </div>
        </div>
      </div>
    </header>
     <?php 
if (empty($row['profilepic'])) {

       ?>
     <br>
     <br>
     <br>
     <br>
      <?php 
}else{
   ?>
    <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <?php 
}
 
       ?>
     
<?php 
if (@$_GET['Empty']==true) {
  ?>
<div class="alert alert-success  "><strong>Success!</strong><?php echo $_GET['Empty'] ?></div>
  <?php 
}
?>
<?php 
if (@$_GET['Invalid']==true) {
  ?>
  <div class="alert alert-danger "><strong>ERROR!</strong><?php echo $_GET['Invalid'] ?></div>
  <?php 
 
}

 ?>
    <div class="container" id="postt">
      <div >
        <h1>POST NOTICE FORM</h1>
        <br>
        
            <form method="post" action="#">
              DATE:
           
              <input type="DATE" name="date" required="" class="form-control">
              <br>
              YOUR NOTICE(ANNOUNCEMENT):
              <br>
              <textarea name="notice" placeholder="please enter your announcement(notice)" cols="30" rows="15" required="" class="form-control"></textarea>
              <br>
              YOUR NOTICE(ANNOUNCEMENT) IN AMHARIC:
              <br>
              <textarea name="notice_am" id="notice_am"  placeholder="እባክዎን ማስታወቂያዎን በአማርኛ ያስገቡ ፡፡"  cols="30" rows="15" required="" class="form-control" onkeypress="return (event.charCode > 0 && 
event.charCode < 65 ) || (event.charCode < 65 && 
event.charCode > 91 ) || (event.charCode < 96 && event.charCode > 123 )" ></textarea>
              <br>
             <button  name="postnotce" id="postnotce"  class="btn btn-success" class="glyphicon glyphicon-plus"  >POST NOTICE</button>
<br>
<br>
            </form>
           
              <?php 
                if (isset($_POST['postnotce'])) {
                  $date=$_POST['date'];
                  $notice=$_POST['notice'];
                  $notice_am=$_POST['notice_am'];
                  $insert="INSERT INTO announcement (notice,notice_amm,date) values ('$notice','$notice_am','$date')";
                  $exe=mysqli_query($con,$insert);
                  if ($exe) {
                    header("location:postnotice.php?Empty=YOUR POST HAVE BEEN POSTED");
                       
                  }else{
                    header("location:postnotice.php?Invalid=YOUR POST NOT POSTED");
                     
                  }
                }

               ?>
      </div>

    </div>
</body>
<?php 

include_once 'footer.php';
 ?>
</html>