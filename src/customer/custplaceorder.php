<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$link = mysql_connect('localhost', 'root', 'mysql');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
	mysql_select_db("lms");
	$id = uniqid();
	// $username = $_SESSION['username'];
	// $useridquery=mysql_query("SELECT id FROM appusers WHERE username='$username'");
	$query1=mysql_query("SELECT eid from employee where jobs in (SELECT min(jobs) from employee) order by eid LIMIT 1");
	if($query1 === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
	$row2 = mysql_fetch_array($query1);
	$user_id = $row2['eid'];
	
	$query2 = mysql_query("UPDATE employee set jobs = jobs+1 where eid = '$row2[0]'");
	// $useridquery=mysql_query(" SELECT user_id from (SELECT user_id ,count(id) from job_order where deliver_status in (0,1)  group by user_id order by count(id) LIMIT 1)");
	// $num=mysql_num_rows($useridquery);
	// if($num==1){
	// 	$userrow = mysql_fetch_array($useridquery);
	// 	$user_id = $userrow[0];
	// }
	
	$clientname=$_SESSION['mobile'];
	$clientidquery=mysql_query("SELECT id FROM clients WHERE contact_no='$clientname'");
	$num2=mysql_num_rows($clientidquery);
	if($num2==1){
		$clientrow = mysql_fetch_array($clientidquery);
		$client_id = $clientrow[0];
	}
    $submission_date=date('Y-m-d');
	$expected_delivery_date=date('Y-m-d', strtotime($submission_date. ' + 2 days'));
	$query=mysql_query("SELECT * FROM clothes");
	$total_quantity = 0; $amount = 0; $tempquant = 0; $tempamount = 0; $dryclean = 0;
	$clothtypes = array(); $quantities = array(); $amounts = array(); $ordertypes = array();
	while ($row = mysql_fetch_array($query)) {
	   if(isset($_POST['quantity' . $row[2]]))	{
		if($_POST['quantity' . $row[2]] != '') {
			$dryclean = $_POST['dryclean' . $row[2]];
			$ordertypes[] = $dryclean;
			$clothtypes[] = $row[2];
			$tempquant = $_POST['quantity' . $row[2]];
			$quantities[] = $tempquant;
			if($dryclean == 0)
			   $tempamount = $row[3] * $tempquant;
			else
			   $tempamount = $row[4] * $tempquant;  
			$amounts[] = $tempamount;
		$total_quantity = $total_quantity + $tempquant;
		$amount = $amount + $tempamount;
		}
	   }
	}
	if(mysql_query("INSERT INTO job_order(id,user_id,client_id,submission_date,expected_delivery_date,total_quantity,amount,delivery_status) VALUES('$id','$user_id','$client_id','$submission_date','$expected_delivery_date','$total_quantity','$amount',0)"))
	{
		// $_SESSION['error'] = "SUCCESSFULL";
		echo "YES";
	}
	else{
		echo "NO";
	}
	$length = count($clothtypes);
	for($i = 0; $i<$length; $i++) {
		mysql_query("INSERT INTO order_details(job_order_id,cloth_name,quantity,amount,order_type) VALUES('$id','$clothtypes[$i]','$quantities[$i]','$amounts[$i]','$ordertypes[$i]')");
	}
	$_SESSION['err']="Your Order was Successful";
	// echo '<script language="javascript">';
	// echo 'alert("Your Previous Order was successful")';
	// echo '</script>';
	header('Location:custindex.php');
	
	//  header('Location: custorder.php');

?>