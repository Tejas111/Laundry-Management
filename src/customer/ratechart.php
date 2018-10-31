<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['mobile'])){
    header("location:../home/index.php");
}
include('../employee/db.php');
$query=mysql_query("SELECT * FROM clothes");
?>
<html lang="en">
    <head>
        <title>Laundry Management System</title>
        <meta charset="UTF-8" />
        <!-- <link rel="stylesheet" type="text/css" href="../employee/css/index.css" /> -->
        <link rel="stylesheet" type="text/css" href="../employee/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="../employee/css/bootstrap.css">
        <script type="text/javascript" src="../employee/js/jquery.min.js"></script>
        <script type="text/javascript" src="../employee/js/main.js"></script>
        <script src="../employee/js/modernizr.custom.js"></script>
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
	margin-top:1px;
}
#insideblock{
   overflow:scroll;
   min-height:340px;
   margin: 20px;
}
	</style>
    </head>
    <body>
    	<!-- <div id="header">
        </div>
        <div class="container">
            <div class="content">
               <nav class="dr-menu">
						<div class="dr-trigger"><span id="dr-icon" class="fa fa-bars"></span><a class="dr-label">Menu</a></div>
						<ul>
							<li><a id="dr-icon" class="fa fa-compass"  href="home.php">Dashboard</a></li>
							<li><a id="dr-icon" class="fa fa-check-square-o" href="job_order.php">Job Order</a></li>
							<li><a id="dr-icon" class="fa fa-bar-chart-o" href="reporting.php">Reporting</a></li>
							<li><a id="dr-icon" class="fa fa-pencil" href="invoice.php">Invoices</a></li>
                            <li><a id="dr-icon" class="fa fa-phone" href="contact.php">Contact Us</a></li>
							<li><a id="dr-icon" class="fa fa-power-off" href="logout.php">Logout</a></li>
						</ul>
					</nav>
            </div>content -->
			<button type="button" class="btn btn-default btn-lg" style="float:right; margin-top:20px; margin-right:20px;" onClick="window.location.href='./custorder.php'">OK</button>
        <div id="block">
               <!-- <h4>Rate Chart</h4> -->
               <div id="insideblock">
			   
			<table class="table table-striped table-bordered table-hover">  
                <col width="50">
                <col width="30">
                <col width="30">
                <col width="30">
				<thead>  
					<tr>  
						<th>Cloth Type</th>  
						<th>Category</th>  
						<th>Laundry Rate</th>  
						<th>Dry Clean Rate</th>  
					</tr>  
				</thead>  
				<tbody>  
                <?php
                      while ($row = mysql_fetch_array($query)) {
						  echo "<tr>";
						  echo "<td>$row[2]</td>";
						  if($row[1]=="1")
						      echo "<td>Gents</td>";
						  elseif($row[1]=="2")	
						      echo "<td>Ladies</td>"; 
						  else
						      echo "<td>Household</td>"; 	   
						  echo "<td>$row[3]</td>";
						  echo "<td>$row[4]</td>";
						  echo "</tr>";	 
                      }
                ?>  
				</tbody>  
			</table> 
		</div>
		
        </div>
        </div>
        <!-- <div id="footer"> <p id="leftContent">Laundry Management System</p> -->
        </div>
        <!-- <script src="js/ytmenu.js"></script> -->
    </body>
</html>