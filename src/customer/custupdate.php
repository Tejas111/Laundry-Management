<?php
	session_start();
    // include('../db.php');
    error_reporting(E_ALL ^ E_DEPRECATED);
$link = mysqli_connect('localhost', 'root', 'mysql','lms');
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}
    $email1=$_SESSION['mobile'];
    echo $email1;
	$name=mysqli_real_escape_string($link, $_POST['name']);
    $mobile=mysqli_real_escape_string($link, $_POST['mobile_no']);
    $password= md5(mysqli_real_escape_string($link, $_POST['password']));
    echo $password;
    $email =mysqli_real_escape_string($link, $_POST['email']);
    echo $email;
    $address =mysqli_real_escape_string($link, $_POST['address']);
    $query=mysqli_query($link,"UPDATE clients set fullname='$name',contact_no='$mobile',email='$email',address='$address',password='$password' WHERE email='$email1' ");
    if ($query) {
        echo "Record updated successfully";
        $_SESSION['mobile'] = $email;
    } else {
        echo "Error updating record";
    }
	// $num=mysql_num_rows($query);
	// if($num==1){
	// 	$_SESSION['mobile']= $mobile;
	// 	echo "login successful";
	// 	 header("location:custindex.php");
		
	// 	}
	// else{
	// 	echo "Wrong Username or Password";
	// 	} 
		
?>