
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

if(!isset($_SESSION['mobile'] )){
header("location:../home/index.php");
}
if(isset($_SESSION['err'])){
	echo '<p>'.$_SESSION['err'].'<p>';
}
// session_start();
$mobile =$_SESSION['mobile'];
include('../employee/db.php');
$query = mysql_query("SELECT * from job_order where client_id in (SELECT id from clients where email = '$mobile')ORDER BY delivery_status asc, submission_date asc");
// $result2 = mysql_query($query) or die($query."<br/><br/>".mysql_error());
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laundry</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
		#block
{
	
	float:right !important;
	width:70%;
	background-color:white !important;
	border-radius:0px;
	-webkit-box-shadow: 0 1px 4px rgba(0,0,0,.33),0 0 0 1px rgba(46,45,47,.05),inset 0 1px 0 #fff,inset 0 0 0 1px rgba(255,255,255,.5);
	box-shadow: 0 1px 4px rgba(0,0,0,.33), 0 0 0 1px rgba(46,45,47,.05),inset 0 1px 0 #fff,inset 0 0 0 1px rgba(255,255,255,.5);
	margin-left:20%;
	margin-right:20%;
	margin-top:-70px;
}
#insideblock{
   overflow:scroll;
   min-height:340px;
   margin: 20px;
}
	</style>
	</head>
	<body>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
			<h1 id="colorlib-logo"><a href="index.html"><span>Laundry</span><span>Point</span></a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
				<li class="colorlib-active"><a href="custindex.php">Home</a></li>
					<li> <a href="work.html">Edit Profile</a></li>
					<li> <a href="./custorder.php">Place Order</a></li>
					<li><a href="../employee/logout.php">Logout</a></li>
				</ul>
			</nav>

			<!-- <div class="colorlib-footer">
				<ul>
					<li><a href="#"><i class="icon-facebook2"></i></a></li>
					<li><a href="#"><i class="icon-twitter2"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
					<li><a href="#"><i class="icon-linkedin2"></i></a></li>
				</ul>
			</div> -->

		</aside>
		<div id="colorlib-main">

			<div class="colorlib-work">
				<div class="container-fluid">
					
				
					
				</div>
			</div>
        
				
					

			<div id="block">
               <h4 style="font-weight:bold;text-align:center;text-decoration:underline">Invoice History</h4>
               <div id="insideblock">
			<table class="table table-striped table-bordered table-hover">  
				<thead>  
					<tr>  
						<th>Job Id</th>  
						<th>Customer Name</th>
						<th>Employee Name</th> 
						<th>Submission Date</th>  
						<th>Delivery Date</th>  
                        <th>Total Quantity</th>  
						<th>Amount</th>  
						<th>Delivery Status</th>  
					</tr>  
				</thead>  
				<tbody>  
                <?php
                      while ($row = mysql_fetch_array($query)) {
						echo "<tr>";
						echo '<td><a href="./custinvoice.php?invoiceid='.$row[0].'">'.$row[0].'</a></td>';
						  $clientnamerow = mysql_fetch_array(mysql_query("SELECT fullname FROM clients WHERE id='$row[2]'"));
						  $employeenamero = mysql_fetch_array(mysql_query("SELECT username from appusers WHERE id =(SELECT user_id FROM job_order WHERE id ='$row[0]')"));
						  echo "<td>$clientnamerow[0]</td>";
						  echo "<td>$employeenamero[0]</td>";
						  echo "<td>$row[3]</td>";
						  echo "<td>$row[4]</td>";
						  echo "<td>$row[5]</td>";
						  echo "<td>$row[6]</td>";
						  if($row[7] == 0)
						     echo "<td style='color:red'>Processing</td>";
						  elseif($row[7] == 1)
						     echo "<td style='color:orange'>Ready</td>";	 
						  else
						     echo "<td style='color:green'>Delivered</td>"; 
						  echo "</tr>";	 
                      }
                ?>  
				</tbody>  
			</table> 
        </div>
	</div>
	</div>
		</div>
		<?php
    if(isset($_SESSION['err'])){
        echo "
            <script type=\"text/javascript\">
            alert('previous order successfull');
            </script>
		";
		// session_destroy();
		unset($_SESSION["err"]);
     }
  ?>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Sticky Kit -->
	<script src="js/sticky-kit.min.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>

