<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:../home/index.php");
} else {
   header("location:home.php");	
}
?>