<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style >
    #postt{
      border:3px solid black;
      border-radius: 20px;
      margin-top: 20px;
    }
    </style>
    <title>Create Incident</title>
</head>
<body>
<?php 

include_once 'header.php';
include_once 'header2.php';
 ?>
  <div class="container" id="postt">
      <div >
        <h1>User Creation FORM</h1>
        <br>
        
            <form method="post" action="#">

            First Name:

         
              <input type="text" name="first_name" required="" class="form-control">
              <br>
              
             Last Name:
             <input type="text" name="last_name" required="" class="form-control">
              <br>
              Email:
             <input type="text" name="email" required="" class="form-control">
              <br>


               Password:
             <input type="text" name="password" required="" class="form-control">
              <br>
        Coniform Password:
             <input type="text" name="cpassword" required="" class="form-control">
              <br>
             <button  name="postnotce" id="postnotce" class="glyphicon glyphicon-plus   btn btn-info"   > Create User</button>
<br>
<br>
            </form>

</div>
</div>

<?php 

include_once 'footer.php';
 ?>     
</body>

</html>