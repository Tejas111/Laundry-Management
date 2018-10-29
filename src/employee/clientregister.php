<?php
$link = mysql_connect('localhost', 'root', 'mysql');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
	mysql_select_db("lms");

	
	$name=$_POST['name'];
	echo $name;
	$mobile_no=$_POST['mobile_no'];
	echo $mobile_no;
	$agerange=$_POST['agerange'];
	echo $agerange;
	$sex=$_POST['sex'];
	echo $sex;
    $reg_date=date('Y-m-d');
	echo $reg_date;
	$email = $_POST['email'];
	$address = $_POST['address'];
	$sql="INSERT INTO clients(fullname,contact_no,reg_date,sex,age_range,email,address) VALUES('$name','$mobile_no','$reg_date','$sex','$agerange','$email','$address')";
	mysql_query($sql);
	header('Location: job_order.php');
?>
