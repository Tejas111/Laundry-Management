<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
// $link = mysql_connect('localhost', 'root', 'mysql');
$link = mysqli_connect('localhost', 'root', 'mysql','lms');
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}
	// mysql_select_db("lms");

	
	$name=$_POST['name'];
	strtolower($name);
	echo $name;
	$mobile_no=$_POST['mobile_no'];
	$password = md5($_POST['password']);
	echo $mobile_no;
	$agerange=$_POST['agerange'];
	echo $agerange;
	$sex=$_POST['sex'];
	echo $sex;
    $reg_date=date('Y-m-d');
	echo $reg_date;
	$email = $_POST['email'];
	echo $email;
	$address = $_POST['address'];
	echo $address;
	$sql="INSERT INTO clients(fullname,contact_no,reg_date,sex,age_range,email,address,password) VALUES('$name','$mobile_no','$reg_date','$sex','$agerange','$email','$address','$password')";
	if(mysqli_query($link,$sql))
	header('Location: job_order.php');
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
?>
