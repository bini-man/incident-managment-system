<?php
session_start();
include_once 'dbcon.php';
unset($_SESSION['admin']);
header('Location:login.php');
?>