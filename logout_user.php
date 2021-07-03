<?php
session_start();
include_once 'dbcon.php';
unset($_SESSION['user']);
header('Location:login.php');
?>