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
        <h1>Incident Creation FORM</h1>
        <br>
        
            <form method="post" action="#">

            Incident Title:

         
              <input type="text" name="date" required="" class="form-control">
              <br>
              Incident Owener:

         
<input type="text" name="date" required="" class="form-control">
<br>
              
              Incident description:
              <textarea rows="10" cols="30" class="form-control">
              
              </textarea>
              <br>
              
              Incident Status:
              <select class="form-control">
              <option> Purchased</option>
              <option> Operational</option>
              <option> In Store</option>
              <option>Not Operational</option>
              <option>Retired</option>
              </select>
              <br>
              
             <button  name="postnotce" id="postnotce" class="glyphicon glyphicon-plus   btn btn-info"   > Create Incident</button>
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