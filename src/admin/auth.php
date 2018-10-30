<?php
	session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$link = mysqli_connect('localhost', 'root', 'mysql','lms');
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}
	// include('db.php');
	$username=mysqli_real_escape_string($link, $_POST['username']);
	$password=md5(mysqli_real_escape_string($link, $_POST['password']));
	$query=mysqli_query($link,"SELECT * FROM appusers WHERE username='$username' AND password='$password'");
	$num=mysqli_num_rows($query);
	if($num==1){
        $_SESSION['username']=$username;
        // header("location:login_success.php");
		}
	else{
		echo "Wrong Username or Password";
		} 
		
?>