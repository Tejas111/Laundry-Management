<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$link = mysqli_connect('localhost', 'root', 'mysql','lms');
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}
	// mysql_select_db("lms");
	
// echo 'Connected successfully';


	$email=mysqli_real_escape_string($link, $_POST['email']);
	//echo $email;
	$name=mysqli_real_escape_string($link, $_POST['name']);
	//echo $name;
	strtolower($name);
	$address=mysqli_real_escape_string($link, $_POST['address']);
	//echo $address;
	$mobile=mysqli_real_escape_string($link, $_POST['mobile']);
	//echo $mobile;
	$password=md5(mysqli_real_escape_string($link, $_POST['password']));
	//echo $password;
        //echo date('Y-m-d');
        $reg_date=date('Y-m-d');
	$sql="INSERT INTO appusers(username,password,email,mobile_no,address,registration_date) VALUES('$name','$password','$email','$mobile','$address','$reg_date')";
	if(mysqli_query($link,$sql))
	{
		// $_SESSION['error11']='user could not be registered';
		// header("location:../home/index.php");
		echo "user registered succesfully ";
		
	}
	// else{
	// 	header('locatio')
	// }
	;

?>
<!-- <script>
	alert
// </script> -->