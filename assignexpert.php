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
	<title>ASSIGN EXPERT</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
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
    #aboutuser{
      width: 100%;
      height: 85px;
      border: 4px solid black;
      background-color: #3B5998;
    }
#main{
  float: right;
  margin: 0px;
  padding: 0px;

}
#username{
color: red;
padding: 30px;
}
#img{
  margin: 0;
  right: 0px;
  bottom: 0px;
  top: 0px;
  position: absolute;

}
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
   padding-top: 200px;
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
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
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow navbar-fixed-top">
      	 <a href="admin.php" class="btn btn-info" class="pull-left justify-content-start">HOME</a>
        <div class="container d-flex justify-content-end">
          <?php 
          $sele="SELECT * FROM admin where username='$username' ";
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
     
    </header>
 <?php 
if (@$_GET['Empty']==true) {
  ?>
<div class="alert alert-danger  "><strong>ERROR!</strong><?php echo $_GET['Empty'] ?></div>
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
 <?php 
if (@$_GET['Emp']==true) {
  ?>
<div class="alert alert-success   "><strong>SUCCESS!</strong><?php echo $_GET['Emp'] ?></div>
  <?php 
}
?>
<?php 
if (@$_GET['Inv']==true) {
  ?>
  <div class="alert alert-success  "><strong>SUCESS!</strong><?php echo $_GET['Inv'] ?></div>
  <?php 
 
}

 ?>
    <main role="main">
      <?php 
$sqlbl="SELECT * FROM requests where expert='' ";
                  $exesb=mysqli_query($con,$sqlbl);
$noofcolumn=mysqli_num_rows($exesb);
      echo "TOTAL UNASSIGNED REQUESTS:";
      echo $noofcolumn;
       ?>
      
      
      <section class="jumbotron text-left">

        <div class="container">
          <?php 
$sqll="SELECT * FROM requests where expert='' LIMIT 1 ";
                  $exes=mysqli_query($con,$sqll);
        if (mysqli_num_rows($exes) > 0) {
         $row = mysqli_fetch_assoc($exes);
         $rows = mysqli_fetch_assoc($exes);
          $fname=$row['fname'];
          $lname=$row['lname'];
          $officeid=$row['officeid'];
          $blockid=$row['blockid'];
          $problem=$row['problem'];
          $dateofhapp=$row['Date'];
          $requid=$row['request_id'];
          echo "<div class='container'>";
          echo "<div class='row'>";
          echo "<div class='col-md-6'>";
          echo "<h3>REQUESTR NAME:$fname $lname</h3>";
           echo "<h3>BLOCK ID:$officeid</h3>";
            echo "<h3>OFFICE ID:$blockid</h3>";
             echo "<h3>DATE OF HAPPENED:$dateofhapp</h3>";
              echo "<h3>PROBLEM:$problem</h3>";
              echo "</div>";
              echo "<div class='col-md-6'>";
              if (empty($row['relatedfile'])) {
              
              }else{
                echo '<img id="myImg" style="vertical-align:middle" height="315" width="410" src="data:image/jpeg;base64,'.base64_encode( $row['relatedfile'] ).'"/>';
                 ?>
               <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

               <?php 
              }
               
            
             // echo "<img  style='vertical-align:middle' height='315' width='410' src='data:image/jpeg;base64,".base64_encode( $rows[""] )."'/>"; 
 // echo '<img  style="vertical-align:middle" height="115" width="110" src="data:image/jpeg;base64,'.base64_encode( $row['relatedfile'] ).'"/>';
              echo "</div>";
              echo "</div>";
              echo "</div>";
      //  echo ' <h1 class="">'.$fname.' '.$lname.'</h1> ';
       //   echo '<p class="">'.$problem.'</p>';
       // echo '<p>';
       //    echo '<small><p>'..'</p></small>';
             
                  $expetdisplay="SELECT username FROM expert WHERE username IS NOT NULL ";
                  $exee=mysqli_query($con,$expetdisplay);

             ?>
             <form method="post" action="#">
              <div class="col-md-3">
            <select name="expert" id="expert" required="" class="form-control">
              <option value="">SELECT EXPERT</option>
              <?php  
while ($row=mysqli_fetch_assoc($exee)) {
  echo '<option value="'.$row["username"].'">'.$row["username"].'</option>';
}
?>
            </select></div>
            <br>
            <BUTTON name="assign" id="assign" value="" class="btn btn-primary my-2">ASSIGN</BUTTON>
        
            </form>
            <?php 
  if (isset($_POST['assign'])) {
  $requestid=$requid;
  $expert=$_POST['expert'];
  $assign="UPDATE requests SET expert='$expert' WHERE request_id='$requestid'";
  $exe_assign=mysqli_query($con,$assign);
  if (!$exe_assign) {
     
    header("location:assignexpert.php?Invalid=NOT ASSIGNED");
  }else{
     
    header("location:assignexpert.php?Inv=SUCCESSFULY ASSIGNED");
  }
  
  }
  // 

             ?>
            <br>
            
           
       
          </p>
       <?php  
   }else{
  echo "NO REQUEST FOUND";
} 

?> 

        </div>
      </section>
    </main>

   
  </body>
</html>
