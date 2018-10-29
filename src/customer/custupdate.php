<?php
	session_start();
    // include('../db.php');
    error_reporting(E_ALL ^ E_DEPRECATED);
$link = mysqli_connect('localhost', 'root', 'mysql','lms');
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}
    $contact=$_SESSION['mobile'];
	$name=mysqli_real_escape_string($link, $_POST['name']);
    $mobile=mysqli_real_escape_string($link, $_POST['mobile_no']);
    $email =mysqli_real_escape_string($link, $_POST['email']);;
    $address =mysqli_real_escape_string($link, $_POST['address']);;
    $query=mysql_query("UPDATE clients set fullname='$name',contact_no='$mobile',email='$email',address='$address' WHERE contact_no='$contact' ");
    if ($query) {
        echo "Record updated successfully";
        $_SESSION['mobile'] = $mobile;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
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