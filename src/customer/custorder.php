<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['mobile'])){
    header("location:../home/index.php");
}
include('../employee/db.php');
$gentquery=mysql_query("SELECT * FROM clothes  WHERE category_id=1");
$ladyquery=mysql_query("SELECT * FROM clothes  WHERE category_id=2");
$householdquery=mysql_query("SELECT * FROM clothes  WHERE category_id=3");

?>
<html lang="en">
    <head>
        <title>Laundry Management System</title>
        <meta charset="UTF-8" />
         <link rel="stylesheet" type="text/css" href="../employee/css/index.css" />
        <!-- <link rel="stylesheet" type="text/css" href="../employee/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="../employee/css/bootstrap.css">
       
        <script type="text/javascript" src="../employee/js/jquery.min.js"></script>
        <script type="text/javascript" src="../employee/js/main.js"></script>
        <script src="../employee/js/modernizr.custom.js"></script> --> -->
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
  <link href="new/css/main.css" rel="stylesheet" media="all">

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
        <style>
            #block
            {
                
                float:right !important;
                width:70%;
                background-color:white !important;
                border-radius:0px;
                -webkit-box-shadow: 0 1px 4px rgba(0,0,0,.33),0 0 0 1px rgba(46,45,47,.05),inset 0 1px 0 #fff,inset 0 0 0 1px rgba(255,255,255,.5);
                box-shadow: 0 1px 4px rgba(0,0,0,.33), 0 0 0 1px rgba(46,45,47,.05),inset 0 1px 0 #fff,inset 0 0 0 1px rgba(255,255,255,.5);
                margin-left:100%;
                margin-right:20%;
                margin-top:-70px;
            }
            #insideblock{
            overflow:scroll;
            min-height:340px;
            margin: 20px;
            }
            /* ul {
                    list-style-type: none;
                    margin-top: 10px;
                    padding-left:25px ;
                    float:none;
                }
            li{
                padding-left:10px;
                float:left;
                color:green;
            }  */
            

        </style>
    </head>

    <body>
    <div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
			<h1 id="colorlib-logo"><a href="index.html"><span>Laundry</span><span>Point</span></a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
				<li><a href="custindex.php">Home</a></li>
					<li> <a href="work.html">Edit Profile</a></li>
					<li class="colorlib-active"> <a href="custorder.php">Place Order</a></li>
					<li><a href="../employee/logout.php">Logout</a></li>
				</ul>
			</nav>

            </aside>
            <div id="colorlib-main">

			<div class="colorlib-work">
				<div class="container-fluid">
                <form style="float:left; width:18%;margin-top:20px;" action="./ratechart.php" method="get"> <button type="submit" class="btn btn-primary">View Rate Chart</button> </form>
                    <form style="float:left;margin-top:-10px;margin-right:30px" action="./custplaceorder.php" method="post">
                            <!-- <label for="name"  style="float:left; width:10%;margin-top:25px;">Client Name</label> -->
                            
                            <!-- <input type="text" class="form-control" id="name" placeholder="Name" name="name" style="float:left; width:20%;margin-top:20px;"> -->
                            <div id="result" style=""></div>
                            <button type="submit" class="btn btn-primary" style="float:right; width:10%; margin-top:20px; margin-right:20px;">Submit</button>
                            <br/><br/><br/>
                            
                            <div>
                            <table class="table table-striped table-bordered table-hover" width="30%">  
                                <colgroup span="3"></colgroup>
                                <colgroup span="3"></colgroup>
                                <colgroup span="3"></colgroup>
                                
                                <thead>  
                                    <tr><th colspan="3">Gent's Items</th><th colspan="3">Lady's Items</th><th colspan="3">Household Items</th></tr> 
                                    <tr><th>Quantity</th><th>Item Name</th><th>Dryclean?</th><th>Quantity</th><th>Item Name</th><th>Dryclean?</th><th>Quantity</th><th>Item Name</th><th>Dryclean?</th></tr>  
                                </thead>  
                                <tbody>  
                                
                                <?php
                                while ($row = mysql_fetch_array($gentquery)) {
                                    echo "<tr>";
                                    echo '<td><input type="text" maxlength="2" size="2" name="quantity'.$row[2].'" /></td>';
                                    echo "<td>$row[2]</td>";
                                    echo '<td><select name="dryclean'.$row[2].'"><option value="1">Yes</option><option value="0" selected="selected">No</option></select></td>';
                                    $row2 = mysql_fetch_array($ladyquery);
                                    if($row2 != false) {
                                        echo '<td><input type="text" maxlength="2" size="2" name="quantity'.$row2[2].'" /></td>';
                                        echo "<td>$row2[2]</td>";
                                        echo '<td><select name="dryclean'.$row2[2].'"><option value="1">Yes</option><option value="0" selected="selected">No</option></select></td>';
                                    }
                                    $row3 = mysql_fetch_array($householdquery);
                                    if($row3 != false) {
                                        echo '<td><input type="text" maxlength="2" size="2" name="quantity'.$row3[2].'" /></td>';
                                        echo "<td>$row3[2]</td>";
                                        echo '<td><select name="dryclean'.$row3[2].'"><option value="1">Yes</option><option value="0" selected="selected">No</option></select></td>';
                                    }
                                    echo "</tr>";
                                }
                                ?>
                                
                                </tbody>  
                            </table> 
                          </div>
                
                        </form>
				
					
				</div>
			</div>
        
           
        </div>
        <!-- Here comes the form -->
        
    
        
        <script src="js/ytmenu.js"></script> -->
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
