<?php 
                 include_once ("dbcon.php");
                 ob_start();
                 session_start();
                 $username=$_SESSION['user'];
                  $Incident_Title=$_POST['title'];
                  $Incident_Owener=$_POST['owner'];
                  $Incident_description=$_POST['description'];
                  $Incident_Status=$_POST['status'];
                  $insert="INSERT INTO incident (owner,description,status,title,created_user) values ('$Incident_Owener','$Incident_description','$Incident_Status',' $Incident_Title','admin')";
                  $exe=mysqli_query($con,$insert);
                  if ($exe) {
                    header("location:Create_incident.php?Empty=Incident Created Successfuly");
                  }else{
                    header("location:Create_incident.php?Invalid=Incident Not Created ");
                  }
?>