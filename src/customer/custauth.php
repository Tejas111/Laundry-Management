<?php
	session_start();
	// include('../db.php');
	error_reporting(E_ALL ^ E_DEPRECATED);
$link = mysqli_connect('localhost', 'root', 'mysql','lms');
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}
	$name=mysqli_real_escape_string($link, $_POST['username']);
	$password=md5(mysqli_real_escape_string($link, $_POST['password']));
	$query=mysqli_query($link,"SELECT * FROM clients WHERE email='$name' AND password='$password'");
	$num=mysqli_num_rows($query);
	if($num==1){
		$_SESSION['mobile']= $name;
		echo "login successful";
		 header("location:custindex.php");
		
		}
	else{
		echo "Wrong Username or Password";
		} 
		
?>