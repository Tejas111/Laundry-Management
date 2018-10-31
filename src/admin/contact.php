<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:../home/index.php");
}
?>
<html lang="en">
    <head>
        <title>Laundry Management System</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <style>
        ul{
            color:green;
        }
        </style>
    </head>
    <body>
    	<div id="header">
        </div>
        <div class="container">
            <div class="content">
                <nav class="dr-menu">
						<div class="dr-trigger"><span id="dr-icon" class="fa fa-bars"></span><a class="dr-label">Menu</a></div>
						<ul>
							<li><a id="dr-icon" class="fa fa-compass"  href="home.php">Dashboard</a></li>
							<!-- <li><a id="dr-icon" class="fa fa-check-square-o" href="job_order.php">Job Order</a></li> -->
							<li><a id="dr-icon" class="fa fa-bar-chart-o" href="reporting.php">Reporting</a></li>
							<li><a id="dr-icon" class="fa fa-pencil" href="invoice.php">Invoices</a></li>
                            <li><a id="dr-icon" class="fa fa-phone" href="contact.php">Contact Us</a></li>
							<li><a id="dr-icon" class="fa fa-power-off" href="logout.php">Logout</a></li>
						</ul>
					</nav>
            </div><!-- content -->
        </div>
        <div id="block">
           <h4 >Contact Us</h4>
           <div id="formblock">
                 <div class="form-group">
                 <label for="name">Subject of mail</label>
                 <input type="text" class="form-control" id="subject" placeholder="subject" name="name">
                 
                 </div>
                 <div class="form-group">
                 <label for="email">Email to send</label>
                 <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                 <div id="result1"></div>
                 </div>
                 <div class="form-group">
                 <label for="message">Message</label>
                 <textarea class="form-control" id="message" placeholder="Enter your message here..." name="message" cols="60" rows="7"></textarea>
                 </div>
   				 <button type="submit" id="submit" class="btn btn-primary">Send Email</button>
                <div id="result">

                </div>
         </div>
        </div>
        
        <div id="footer"> <p id="leftContent">Laundry Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
         <script src="../home/js1/jquery-2.js"></script>
	<script>
$(document).ready(function(){
$('#email').keyup(function(){
     var query = $(this).val();
     if(1)
     {
          $.ajax({
               url:"./email_search.php",
               method:"POST",
               data:{query:query},
               success:function(data)
               {
                    $('#result1').fadeIn();
                    $('#result1').html(data);
               }
          });
     }
    
});

$(document).on('click', 'li', function(){
     $('#email').val($(this).text());
     $('#result1').fadeOut();
});
$('body').on('click',function(){
    $('#result1').fadeOut();
})
});
$("#submit").click(function(){
    var t_sub=$("#subject").val();

var t_email=$("#email").val();

var t_mess=$("#message").val();


            $.ajax({

        url:'./send_mail.php',
        
        data:{mail_sub:t_sub,mail_to:t_email,mail_msg:t_mess},
        type:'POST',

        success:function(data){
            console.log('heelo hello');
            console.log(data);
            $("#result").html('<p style="color:red;text-align:center;font-weight:bold;text-size:40px">'+data+'</p>');
        }


})
            })

        
</script>
    </body>
</html>