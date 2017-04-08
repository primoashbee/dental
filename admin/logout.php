<?php 
require "../controllers/config.php";
require '../controllers/myFunctions.php';
session_start();

logOut();
header('Location:../index.php');
?>